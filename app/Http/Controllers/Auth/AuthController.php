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
            'role' => 'user'
        ]);

        Auth::login($user);

        return redirect('/user/dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // LOGIN ADMIN (GUARD ADMIN)
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            session(['role' => 'admin']);

            return redirect('/admin/dashboard');
        }

        // LOGIN USER (GUARD WEB)
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