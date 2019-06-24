<?php

namespace App\Http\Middleware;

use Closure;

class ApiAccept
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
        if (!$request->expectsJson()) {
            return response()->json('Not Acceptable', 406);
        }
        return $next($request);
    }
}
