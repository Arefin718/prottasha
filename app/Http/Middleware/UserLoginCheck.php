<?php

namespace App\Http\Middleware;

use Closure;

class UserLoginCheck
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
        if ($request->session()->get('user')) {
            return $next($request);
        }else{
            return redirect()->route('userLogin');
        }
    }
}
