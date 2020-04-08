<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Closure;

class Usuario
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
        if (Auth::guard('professor')->check()) {
                return redirect(RouteServiceProvider::HOMEPROFESSOR);
        }
        if (Auth::guard('admin')->check()) {
                return redirect(RouteServiceProvider::ADMIN);
        }
        return $next($request);
    }
}
