<?php

namespace App\Http\Middleware;

use Closure;

class SearchMiddleware
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
        if (str_replace(url('/'), '', url()->previous()) == "/person/resource/search") {
            return $next($request);
        }
        return abort(403, 'No hay contenido');
    }
}
