<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['user', 'product'])->get();

        return view('pages.admin.purchase.index', compact('purchases'));
    }
}