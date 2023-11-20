<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // If the user is an admin, redirect to the admin dashboard.
                if (Auth::guard($guard)->user()->hasRole('seller')) {
                    return redirect('/seller-home'); // Specify the admin dashboard route here.
                }
                if (Auth::guard($guard)->user()->hasRole('buyer')) {
                    return redirect('/marketplace'); // Specify the admin dashboard route here.
                }

                // If the user has any other role, you can handle other redirections here.

                // Default redirect if authenticated.
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
