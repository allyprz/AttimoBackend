<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y es administrador
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request); // Permite el acceso si es administrador
        }

        // Redirige a la página de login si no es administrador
        return redirect()->route('admin.login')->with('error', 'Unauthorized access.');
    }
}
