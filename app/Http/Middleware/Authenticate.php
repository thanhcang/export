<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure                  $next
     * @param null                     $guard
     * @return string
     */

    public function handle($request, Closure $next, $guard = null)
    {
        config(['auth.defaults.guard' => $guard]);

        if (Auth::guard($guard)->guest()) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
