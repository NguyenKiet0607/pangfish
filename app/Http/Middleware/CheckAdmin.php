<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Check if user logged in is super admin
        if (!in_array(auth('admin')->user()->role, [1, 2])) {
            return redirect()->back()->with('error', __('messages.admins.not_authorize'));
        }
        return $next($request);
    }
}
