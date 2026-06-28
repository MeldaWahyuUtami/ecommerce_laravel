<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // WAJIB CEK ADMIN GUARD
        if (!Auth::guard('admin')->check()) {
            return redirect('/login');
        }

        return $next($request);
    }
}