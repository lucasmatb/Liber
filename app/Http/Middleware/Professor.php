<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Closure;

class Professor
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
        if (Auth::guard('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
    }
    if (Auth::guard('admin')->check()) {
            return redirect(RouteServiceProvider::ADMIN);
    }
        return $next($request);
    }
}
