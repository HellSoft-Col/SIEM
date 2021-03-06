<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMonitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role === "ADMIN" || Auth::user()->role === "MODERATOR") {
                return $next($request);
            }
        }

        return abort(403, 'Necesita permisos de administrador ó monitor para acceder.');
    }
}
