<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPrivateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 1) { // PRIVATE_ADMIN role = 1
            return $next($request);
        }
        return redirect('/admin/login');
    }
}
