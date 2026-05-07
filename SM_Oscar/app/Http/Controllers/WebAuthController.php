<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationSuccess;
use App\Models\PersonalAccessToken;
use App\Models\Permiso;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class WebAuthController extends Controller
{
    private function redirectAfterAuth(User $user)
    {
        if (in_array((int) ($user->permiso_id ?? 0), [1, 2], true)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('web.dashboard');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'Credenciales inválidas.',
            ]);
        }

        $user = User::where('email', $credentials['email'])->firstOrFail();

        // Verificar si el email ha sido verificado
        if (is_null($user->email_verified_at)) {
            Auth::logout();

            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'Para poder tener acceso primero verifica tu cuenta. Revisa tu correo electrónico.',
            ]);
        }

        if (!$user->active) {
            Auth::logout();

            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'Cuenta inactiva.',
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        $request->session()->put('access_token', $token);

        return $this->redirectAfterAuth($user);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $registrationKey = env('REGISTRATION_ACCESS_KEY');

        if (!$registrationKey) {
            return back()->withErrors([
                'general' => 'Error de configuración del servidor: Clave de registro no configurada.',
            ]);
        }

        // Validar que el usuario haya proporcionado la clave de registro
        if ($request->registration_key !== $registrationKey) {
            return back()->withInput($request->except(['password', 'password_confirmation', 'registration_key']))
                ->withErrors([
                    'registration_key' => 'La clave de registro proporcionada no es válida.',
                ]);
        }

        $existingUser = User::where('email', $request->email)
            ->orWhere('name', $request->name)
            ->orWhere(function ($query) use ($request) {
                $query->where('nombre', $request->nombre)
                    ->where('apellido_paterno', $request->apellido_paterno)
                    ->where('apellido_materno', $request->apellido_materno);
            })
            ->first();

        if ($existingUser) {
            return back()->withInput($request->except(['password', 'password_confirmation']))->withErrors([
                'general' => 'Usuario ya existe (Email, Username, o Nombre Completo).',
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols(),
            ],
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
        ]);

        // Generar token de verificación
        $verificationToken = Str::random(64);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'verification_token' => $verificationToken,
            'active' => false, // Usuario inactivo hasta verificar email
        ]);

        // Generar URL de verificación
        $verificationUrl = route('web.verify.email', ['token' => $verificationToken]);

        Mail::to($user)->send(new RegistrationSuccess($user, $verificationUrl));

        // Redirigir al login con mensaje de verificación pendiente
        return redirect()->route('web.login')
            ->with('status', '¡Registro exitoso! Hemos enviado un correo de verificación a tu email. Por favor verifica tu cuenta antes de iniciar sesión.');
    }

    /**
     * Verificar email del usuario y asignar permisos de administrador
     */
    public function verifyEmail(Request $request, $token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return view('auth.verification_error', [
                'message' => 'El enlace de verificación no es válido o ha expirado.'
            ]);
        }

        if (!is_null($user->email_verified_at)) {
            return view('auth.verification_success', [
                'message' => 'Tu cuenta ya ha sido verificada anteriormente.'
            ]);
        }

        // Asignar permisos de administrador (permiso_id = 1 para admin, rol_id = 1 para admin)
        $user->update([
            'email_verified_at' => now(),
            'verification_token' => null,
            'active' => true,
            'permiso_id' => 1, // Administrador
            'rol_id' => 1,     // Rol Admin
        ]);

        return view('auth.verification_success', [
            'message' => 'Verificación de nuevo Administrador exitosa'
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->session()->get('access_token');

        if (is_string($token) && str_contains($token, '|')) {
            [$id] = explode('|', $token, 2);
            if (is_numeric($id)) {
                PersonalAccessToken::query()->whereKey((int) $id)->delete();
            }
        }

        Auth::logout();
        $request->session()->forget('access_token');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('web.login');
    }
}
