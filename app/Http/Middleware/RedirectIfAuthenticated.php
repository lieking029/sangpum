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
                // Get the authenticated user
                $user = Auth::guard($guard)->user();

                // Redirect based on role
                if ($user->hasRole('admin')) {
                    return redirect('/admin-home');
                } elseif ($user->hasRole('buyer')) {
                    return redirect('/');
                }  elseif ($user->hasRole('seller')) {
                    return redirect('/seller-home');
                }

                // Default redirect if role is not determined
                // return redirect('/home');
            }
        }

        return $next($request);
    }
}
