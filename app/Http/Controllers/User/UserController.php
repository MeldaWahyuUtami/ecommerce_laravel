<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('pages.user.index', compact('products'));
    }

    public function product()
    {
        $products = Product::latest()->get();
        return view('pages.user.index', compact('products'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.user.detail', compact('product'));
    }

    // =========================
    // PURCHASE FINAL (NO POINT / NO COIN)
    // =========================
    public function purchase($productId)
    {
        $product = Product::findOrFail($productId);

        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Silakan login terlebih dahulu');
        }

        $finalPrice = $product->discount_price ?? $product->price;

        // 🔥 TIDAK ADA POINT / SALDO
        // hanya simpan transaksi

        History::create([
            'id_user' => $user->id,
            'id_product' => $productId,
            'total_harga' => $finalPrice
        ]);

        return redirect()->route('user.history', $user->id)
            ->with('success', 'Pembelian berhasil');
    }

    // =========================
    // HISTORY LIST
    // =========================
    public function history($id)
    {
        $data = DB::table('histories')
            ->join('products', 'products.id', '=', 'histories.id_product')
            ->where('histories.id_user', $id)
            ->select(
                'histories.id as history_id',
                'histories.*',
                'products.name',
                'products.price',
                'products.discount_price',
                'products.image'
            )
            ->latest()
            ->get();

        return view('pages.user.history', compact('data'));
    }

    // =========================
    // DETAIL HISTORY
    // =========================
    public function detail_history($id)
    {
        $data = DB::table('histories')
            ->join('products', 'products.id', '=', 'histories.id_product')
            ->where('histories.id', $id)
            ->select(
                'histories.*',
                'products.name',
                'products.price',
                'products.discount_price',
                'products.image',
                'products.category',
                'products.description'
            )
            ->first();

        return view('pages.user.detail-history', compact('data'));
    }
}