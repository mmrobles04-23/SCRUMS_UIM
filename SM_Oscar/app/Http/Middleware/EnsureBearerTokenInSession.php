<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureBearerTokenInSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('access_token')) {
            return redirect()->route('web.login');
        }

        return $next($request);
    }
}
