<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
 
    public function handle($request, Closure $next)
    {
        if (!isset(auth()->user()->user_type)=='patient') {
            return redirect(route('login'))->with('success','Login to Continue!');
        }

        return $next($request);
    }
}
