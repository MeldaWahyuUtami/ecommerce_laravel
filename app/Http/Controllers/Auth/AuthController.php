<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

class AuthController extends Controller
{
    // ================= REGISTER =================
    public function register()
    {
        return view('auth.register');
    }

    public function post_register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'point' => 10000,
        ]);

        Auth::guard('web')->login($user);

        return redirect()->route('user.dashboard');
    }

    // ================= LOGIN USER / ADMIN =================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Coba login sebagai ADMIN
        if (Auth::guard('admin')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        // Kalau bukan admin, coba login sebagai USER
        if (Auth::guard('web')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'user' => 'Email atau password salah!'
        ])->withInput();
    }

    // ================= LOGOUT ADMIN =================
    public function admin_logout()
    {
        Auth::guard('admin')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    // ================= LOGOUT USER =================
    public function user_logout()
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}