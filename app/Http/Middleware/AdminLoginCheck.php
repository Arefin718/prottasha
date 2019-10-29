<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginCheck
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
        if($request->session()->has('user')){
        if ($request->session()->get('user')->type=="Admin") {
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }else{
            return redirect()->route('userLogin');
        }
    }
}
