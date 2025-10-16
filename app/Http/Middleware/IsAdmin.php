<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Debe estar logueado, ser admin y estar activo
        if (!Auth::check() || Auth::user()->role !== 'admin' || Auth::user()->estado !== 'activo') {
            abort(403, 'No autorizado.');
        }

        return $next($request);
    }
}
