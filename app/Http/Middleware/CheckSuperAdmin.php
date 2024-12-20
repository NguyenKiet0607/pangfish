<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role == 2) { // SUPER_ADMIN role = 2
            return $next($request);
        }
        return redirect('/admin/login');
    }
}
