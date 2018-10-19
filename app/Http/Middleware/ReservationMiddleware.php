<?php

namespace App\Http\Middleware;

use Closure;

class ReservationMiddleware
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
        if (strpos(str_replace(url('/'), '', url()->previous()), 'person/resource/view')) {
            return $next($request);
        }
        return abort(403, 'No hay contenido');
    }
}
