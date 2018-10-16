<?php

namespace App\Http\Middleware;

use Closure;

class ModeratorMiddleware
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
        if (Auth::user()->role == 'MODERATOR') {
            return $next($request);
        }

        return view('auth.unauthorized')->withMessage("Moderador");
    }
}
