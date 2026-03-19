<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminOrDeveloper
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->session()->get('access_token');

        if (!is_string($token) || !str_contains($token, '|')) {
            return redirect()->route('web.login');
        }

        [$id] = explode('|', $token, 2);
        if (!is_numeric($id)) {
            return redirect()->route('web.login');
        }

        $personalToken = PersonalAccessToken::query()->with('tokenable')->find((int) $id);

        $user = $personalToken?->tokenable;

        if (!$user) {
            return redirect()->route('web.login');
        }

        if (!in_array((int) ($user->permiso_id ?? 0), [1, 2], true)) {
            return response()->json(['message' => 'Acceso denegado. Permisos insuficientes'], 403);
        }

        return $next($request);
    }
}
