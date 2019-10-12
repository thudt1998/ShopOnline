<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param null $guard
     * @return mixed|string
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        if (auth()->guard($guard)->guest()) {
//            return redirect()->route('user.loginPage');
//        }
        return $next($request);
    }
}
