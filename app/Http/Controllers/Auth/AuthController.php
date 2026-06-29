<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function post_register(Request $request)
    {
        // =========================
        // VALIDASI INPUT
        // =========================
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // =========================
        // CEK MANUAL (ANTI ERROR SILENT)
        // =========================
        try {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'point' => 10000,
                'role' => 'user'
            ]);

        } catch (\Exception $e) {

            return back()->withErrors([
                'error' => 'Gagal membuat akun: ' . $e->getMessage()
            ]);
        }

        // =========================
        // REDIRECT KE LOGIN
        // =========================
        return redirect()->route('login')
            ->with('success', 'Register berhasil, silakan login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // ADMIN LOGIN
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            session(['role' => 'admin']);

            return redirect('/admin/dashboard');
        }

        // USER LOGIN
        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            session(['role' => 'user']);

            return redirect('/user/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!'
        ]);
    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function user_logout()
    {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}