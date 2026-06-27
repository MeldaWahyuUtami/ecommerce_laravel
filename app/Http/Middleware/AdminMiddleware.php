<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah admin sudah login dengan guard 'admin'
        if (!Auth::guard('admin')->check()) {
            // Kalau belum login, redirect ke form login admin
            return redirect()->route('admin.login')
                             ->withErrors(['admin' => 'Silakan login sebagai admin terlebih dahulu.']);
        }

        // Kalau sudah login, lanjutkan request
        return $next($request);
    }
}
