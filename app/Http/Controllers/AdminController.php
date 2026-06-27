<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Tampilkan dashboard admin
     */
    public function dashboard()
    {
        // Hitung jumlah produk dan user
        $productsCount = Product::count();
        $usersCount    = User::count();

        // Kirim data ke view
        return view('pages.admin.index', [
            'products' => $productsCount,
            'users'    => $usersCount,
        ]);
    }
}
