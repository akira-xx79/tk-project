<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/');
        // }
        if (Auth::guard($guard)->check() && $guard === 'user') {
            return redirect(RouteServiceProvider::HOME);
        } elseif (Auth::guard($guard)->check() && $guard === 'admin') {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        } elseif (Auth::guard($guard)->check() && $guard === 'creator') {
            return redirect(RouteServiceProvider::CREATOR_HOME);
        } elseif (Auth::guard($guard)->check() && $guard === 'company') {
            return redirect(RouteServiceProvider::COMPANY_HOME);
        // switch ($guard) {
        //     case 'admin':
        //         if (Auth::guard($guard)->check()) {
        //             return redirect()->route('admin.dashboard');
        //         }
        //         break;
        //     default:
        //         if (Auth::guard($guard)->check()) {
        //             return redirect()->route('home');
        //         }
        //         break;
        // }

        // switch ($guard) {
        //     case 'creator':
        //         if (Auth::guard($guard)->check()) {
        //             return redirect()->route('creator.dashboard');
        //         }
        //         break;
        //     default:
        //         if (Auth::guard($guard)->check()) {
        //             return redirect()->route('home');
        //         }
        //         break;
        // }

    }
     return $next($request);
  }
}
