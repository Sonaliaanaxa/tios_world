<?php

namespace App\Http\Middleware;

use Closure;

class SellerMiddleware
{
    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Closure  $next
    //  * @return mixed
    //  */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }

    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
   

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $valid=0;
        if(auth()->user()->user_type == "seller" || auth()->user()->user_type=='admin'){$valid=1;}

        if ($valid==0) {
            return back()->with('error','Invalid Page Request!');
        }


        return $next($request);
    }
} 

