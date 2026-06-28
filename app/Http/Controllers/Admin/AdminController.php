<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Dashboard admin
     */
    public function dashboard()
    {
        // hitung data
        $productsCount = Product::count();
        $usersCount = User::count();

        // kirim ke view admin dashboard
        return view('pages.admin.index', [
            'products' => $productsCount,
            'users' => $usersCount
        ]);
    }
}