<?php

namespace App\Http\Middleware;

use Closure;

class sessionCheck 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->has('username')){
            return redirect()->route('Login.index');
        }
        else{
            return $next($request);
        }
    }
}
