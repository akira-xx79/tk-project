<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    protected $user_route = 'user.login';
    protected $admin_route = 'admin.login';
    protected $creator_route = 'creator.login';
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //  if (! $request->expectsJson()) {
        //     return route('login');
        // }
        if (!$request->expectsJson()) {
            if (Route::is('user.*')) {
                return route($this->user_route);
            } elseif (Route::is('admin.*')) {
                return route($this->admin_route);
            } elseif (Route::is('creator.*')) {
                return route($this->creator_route);
            }
        }
    }
}
