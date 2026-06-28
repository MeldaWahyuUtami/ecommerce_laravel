<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    // =========================
    // INDEX HISTORY
    // =========================
    public function index()
    {
        $data = DB::table('histories')
            ->join('products', 'products.id', '=', 'histories.id_product')
            ->join('users', 'users.id', '=', 'histories.id_user')
            ->select(
                'histories.*',
                'products.name as nama_produk',
                'users.name as user_name'
            )
            ->get();

        return view('pages.admin.history.index', compact('data'));
    }

    // =========================
    // DETAIL HISTORY
    // =========================
    public function detail($id)
    {
        $data = DB::table('histories')
            ->join('products', 'products.id', '=', 'histories.id_product')
            ->join('users', 'users.id', '=', 'histories.id_user')
            ->select(
                'histories.*',
                'products.name as nama_produk',
                'products.category',
                'users.name as user_name'
            )
            ->where('histories.id', $id)
            ->first();

        return view('pages.admin.history.detail', compact('data'));
    }
}