<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use App\Models\Distributor;

class ProductController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index()
    {
        $products = DB::table('products')
            ->join('distributors', 'products.id_distributor', '=', 'distributors.id')
            ->select(
                'products.*',
                'distributors.nama_distributor'
            )
            ->orderBy('products.id', 'desc')
            ->get();

        confirmDelete(
            'Hapus Data!',
            'Apakah anda yakin ingin menghapus data ini?'
        );

        return view('pages.admin.product.index', compact('products'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        $distributors = Distributor::all();

        return view('pages.admin.product.create', compact('distributors'));
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_distributor' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric', // 🔥 FLASH SALE
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak valid');
            return back()->withInput();
        }

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        Product::create([
            'id_distributor' => $request->id_distributor,
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount_price, // 🔥 FIX
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName
        ]);

        Alert::success('Berhasil', 'Produk berhasil ditambahkan');

        return redirect()->route('admin.product');
    }

    // =========================
    // DETAIL
    // =========================
    public function detail($id)
    {
        $product = DB::table('products')
            ->join('distributors', 'products.id_distributor', '=', 'distributors.id')
            ->select(
                'products.*',
                'distributors.nama_distributor'
            )
            ->where('products.id', $id)
            ->first();

        return view('pages.admin.product.detail', compact('product'));
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $distributors = Distributor::all();

        return view('pages.admin.product.edit', compact('product', 'distributors'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_distributor' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric', // 🔥 FLASH SALE
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak valid');
            return back()->withInput();
        }

        $product = Product::findOrFail($id);

        $imageName = $product->image;

        if ($request->hasFile('image')) {

            if ($product->image && File::exists(public_path('images/' . $product->image))) {
                File::delete(public_path('images/' . $product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $product->update([
            'id_distributor' => $request->id_distributor,
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount_price, // 🔥 FIX
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName
        ]);

        Alert::success('Berhasil', 'Produk berhasil diupdate');

        return redirect()->route('admin.product');
    }

    // =========================
    // DELETE
    // =========================
    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && File::exists(public_path('images/' . $product->image))) {
            File::delete(public_path('images/' . $product->image));
        }

        $product->delete();

        Alert::success('Berhasil', 'Produk berhasil dihapus');

        return back();
    }
}