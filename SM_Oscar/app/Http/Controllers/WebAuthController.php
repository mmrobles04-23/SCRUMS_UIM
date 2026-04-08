<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationSuccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;

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

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
        ]);

        Mail::to($user)->send(new RegistrationSuccess($user));

        $token = $user->createToken('auth_token')->plainTextToken;
        $request->session()->put('access_token', $token);

        return $this->redirectAfterAuth($user);
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
