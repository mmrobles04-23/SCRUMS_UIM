<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\UserWelcomeMail;
/**
 * Controlador administrativo de usuarios.
 *
 * Responsabilidad:
 * - Realizar operaciones CRUD/administrativas sobre el modelo {@see \App\Models\User}.
 * - Estas operaciones se exponen únicamente por API y regresan JSON.
 *
 * Seguridad / acceso:
 * - Las rutas que apuntan a este controlador están en {@see routes/api.php}.
 * - Todas están protegidas por:
 *   - Middleware `auth:sanctum` (requiere Bearer token válido).
 *   - Middleware {@see \App\Http\Middleware\CheckSuperAdmin} (requiere `permiso_id == 1` y `rol_id == 1`).
 *
 * Endpoints asociados (routes/api.php):
 * - `POST /api/users` -> {@see store()}
 * - `POST /api/users/admin` -> {@see storeAdmin()}
 * - `PUT /api/users/{id}` -> {@see update()}
 * - `PUT /api/users/{id}/password` -> {@see changePassword()}
 * - `PATCH /api/users/{id}/status` -> {@see toggleStatus()}
 * - `DELETE /api/users/{id}` -> {@see destroy()}
 */

use App\Models\Permiso;
use App\Models\Rol;

class UserController extends Controller
{
    /**
     * Lista los usuarios para la vista de administración.
     */
    public function index()
    {
        $users = User::with(['permiso', 'rol'])
            ->orderBy('nombre')
            ->paginate(15);

        return view('admin.usuarios.index', compact('users'));
    }

    /**
     * Muestra el formulario de edición.
     */
    public function edit(User $user)
    {
        $permisos = Permiso::all();
        $roles = Rol::all();
        
        return view('admin.usuarios.edit', compact('user', 'permisos', 'roles'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        $permisos = Permiso::all();
        $roles = Rol::all();
        
        return view('admin.usuarios.create', compact('permisos', 'roles'));
    }

    /**
     * Guarda un nuevo usuario desde el panel web y envía un correo de bienvenida.
     */
    public function storeWeb(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'permiso_id' => 'nullable|exists:permisos,id',
            'rol_id' => 'nullable|exists:roles,id',
            'active' => 'sometimes|boolean',
            'password' => ['nullable', Password::min(8)->mixedCase()->numbers()->symbols()],
        ], [
            'name.unique' => 'Este nombre de usuario ya está registrado.',
            'email.unique' => 'Este correo electrónico ya está registrado.'
        ]);

        $plainPassword = $request->password ?: Str::password(12, true, true, true, false);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($plainPassword),
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'permiso_id' => $validated['permiso_id'] ?? null,
            'rol_id' => $validated['rol_id'] ?? null,
            'active' => $validated['active'] ?? true,
        ]);

        $loginUrl = url('/login'); // We can also use route('web.login') but the user specified a specific URL structure. Actually url('/login') works in production. Let's just use url('/login').
        
        try {
            Mail::to($user->email)->send(new UserWelcomeMail($user, $plainPassword, $loginUrl));
        } catch (\Exception $e) {
            // Registrar error de correo pero continuar
            \Illuminate\Support\Facades\Log::error('No se pudo enviar correo de bienvenida: ' . $e->getMessage());
        }

        return redirect()->route('admin.usuarios.index')
            ->with('success', 'Usuario creado con éxito. Se ha enviado un correo con sus credenciales.');
    }

    /**
     * Crea un usuario "normal" desde el panel administrativo.
     *
     * Endpoint:
     * - `POST /api/users`
     *
     * Seguridad / acceso:
     * - Protegido por `auth:sanctum` + {@see \App\Http\Middleware\CheckSuperAdmin}.
     *
     * Modelo involucrado:
     * - {@see \App\Models\User}
     *
     * Qué hace:
     * - Valida campos obligatorios de la tabla `users`.
     * - Crea el usuario con `active=true` por defecto.
     * - NO asigna permisos/roles administrativos (deja `permiso_id` y `rol_id` como `null` a menos que se envíen).
     * - Hashea la contraseña antes de guardar.
     *
     * Uso recomendado:
     * - Crear cuentas de participantes/usuarios finales (talleres, conferencias, etc.).
     */
    public function store(Request $request)
    {
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
            'active' => 'sometimes|boolean',
            'asignado' => 'nullable|array',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'active' => $validated['active'] ?? true,
            'asignado' => $validated['asignado'] ?? null,
            'permiso_id' => null,
            'rol_id' => null,
        ]);

        return response()->json(['message' => 'Usuario creado con éxito', 'user' => $user], 201);
    }

    /**
     * Crea un usuario administrativo (con permiso y rol) desde el panel administrativo.
     *
     * Endpoint:
     * - `POST /api/users/admin`
     *
     * Seguridad / acceso:
     * - Protegido por `auth:sanctum` + {@see \App\Http\Middleware\CheckSuperAdmin}.
     *
     * Modelo involucrado:
     * - {@see \App\Models\User}
     *
     * Qué hace:
     * - Valida campos obligatorios de la tabla `users`.
     * - Requiere `permiso_id` y `rol_id` existentes.
     * - Hashea la contraseña antes de guardar.
     * - Permite definir si el usuario inicia activo/inactivo.
     *
     * Nota:
     * - En este proyecto, la autorización de “super admin” actual se basa en IDs:
     *   `permiso_id == 1` y `rol_id == 1` (ver {@see \App\Http\Middleware\CheckSuperAdmin}).
     */
    public function storeAdmin(Request $request)
    {
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
            'permiso_id' => 'required|exists:permisos,id',
            'rol_id' => 'required|exists:roles,id',
            'active' => 'sometimes|boolean',
            'asignado' => 'nullable|array',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apellido_paterno'],
            'apellido_materno' => $validated['apellido_materno'],
            'permiso_id' => $validated['permiso_id'],
            'rol_id' => $validated['rol_id'],
            'active' => $validated['active'] ?? true,
            'asignado' => $validated['asignado'] ?? null,
        ]);

        return response()->json(['message' => 'Usuario administrativo creado con éxito', 'user' => $user], 201);
    }

    /**
     * Actualiza datos generales del usuario.
     *
     * Endpoint:
     * - `PUT /api/users/{id}`
     *
     * Modelo involucrado:
     * - {@see \App\Models\User}
     *
     * Qué hace:
     * - Busca el usuario por `id` (404 si no existe).
     * - Valida un conjunto de campos opcionales (`sometimes`).
     * - Si se incluye `password`, la hashea antes de guardar.
     * - Actualiza el usuario y regresa el usuario actualizado en JSON.
     *
     * Notas:
     * - `permiso_id` y `rol_id` se validan contra tablas `permisos` y `roles`.
     * - `asignado` se espera como arreglo; el modelo lo castea a JSON/array.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'sometimes|string|min:8|confirmed',
            'nombre' => 'sometimes|string|max:255',
            'apellido_paterno' => 'sometimes|string|max:255',
            'apellido_materno' => 'sometimes|string|max:255',
            'permiso_id' => 'nullable|exists:permisos,id',
            'rol_id' => 'nullable|exists:roles,id',
            'active' => 'sometimes|boolean',
            'asignado' => 'nullable|array',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Usuario actualizado con éxito', 'user' => $user]);
        }

        return redirect()->route('admin.usuarios.index')
            ->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Elimina (borra) un usuario.
     *
     * Endpoint:
     * - `DELETE /api/users/{id}`
     *
     * Modelo involucrado:
     * - {@see \App\Models\User}
     *
     * Qué hace:
     * - Busca el usuario por `id` (404 si no existe).
     * - Ejecuta `$user->delete()`.
     * - Regresa confirmación en JSON.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Usuario eliminado con éxito']);
        }

        return back()->with('success', 'Usuario eliminado con éxito');
    }

    /**
     * Activa o desactiva un usuario mediante el flag `active`.
     *
     * Endpoint:
     * - `PATCH /api/users/{id}/status`
     *
     * Modelo involucrado:
     * - {@see \App\Models\User}
     *
     * Qué hace:
     * - Busca el usuario por `id` (404 si no existe).
     * - Valida que `active` venga en el request y sea boolean.
     * - Actualiza el campo `active`.
     * - Devuelve JSON con el estado final.
     */
    public function toggleStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'active' => 'required|boolean',
        ]);

        $user->forceFill([
            'active' => $request->active
        ])->save();

        $status = $request->active ? 'activado' : 'desactivado';
        
        if ($request->expectsJson()) {
            return response()->json(['message' => "User has been {$status} successfully", 'active' => $user->active]);
        }

        return back()->with('success', "Usuario {$status} con éxito");
    }

    /**
     * Cambia la contraseña de un usuario.
     *
     * Endpoint:
     * - `PUT /api/users/{id}/password`
     *
     * Modelo involucrado:
     * - {@see \App\Models\User}
     *
     * Qué hace:
     * - Busca el usuario por `id` (404 si no existe).
     * - Valida una contraseña con política fuerte (min 8, mayúsculas/minúsculas, números y símbolos) y confirmación.
     * - Hashea y guarda la contraseña.
     * - Responde JSON de éxito.
     */
    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
        ]);

        $user->forceFill([
            'password' => Hash::make($request->password)
        ])->save();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Contraseña actualizada con éxito']);
        }

        return back()->with('success', 'Contraseña actualizada con éxito');
    }
}
