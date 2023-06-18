<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Closure;
use MongoDB\Driver\Session;

class AuthCheck
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    public function handle(Request $request, Closure $next){
            if(!Session()->has('loginId')){
                return redirect('login')->with('fail','You need to login first');
            }else{
                return $next($request);
            }
    }
}
