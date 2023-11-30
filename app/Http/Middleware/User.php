<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        // role 1 = Supervisor
        if(Auth::user()->role == 214){
            return redirect()->route('super');
        }
        
        // role 0 = User
        if(Auth::user()->role == 0){
            return $next($request);
        }
    }
}
