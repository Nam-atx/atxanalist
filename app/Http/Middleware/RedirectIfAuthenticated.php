<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->is_admin==1) {
            return redirect('/admin/dashboard');
        } else if (Auth::guard($guard)->check() && Auth::user()->is_admin==2) {
            return redirect('/sales/dashboard');
        } else if (Auth::guard($guard)->check() && Auth::user()->is_admin==0) {
            return redirect('/user/dashboard');
        } 

        return $next($request);
    }
}
