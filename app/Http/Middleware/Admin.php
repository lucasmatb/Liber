<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('web')->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        if (Auth::guard('professor')->check()) {
            return redirect(RouteServiceProvider::HOMEPROFESSOR);
        }
        return $next($request);
    }
}
