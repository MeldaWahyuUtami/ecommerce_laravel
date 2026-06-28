@extends('layouts.admin.main')

@section('title', 'Admin Edit Product')

@section('content')
<div class="main-content">
<section class="section">

<div class="section-header">
<h1>Edit Produk</h1>

<div class="section-header-breadcrumb">
<div class="breadcrumb-item">
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</div>
<div class="breadcrumb-item">
<a href="{{ route('admin.product') }}">Produk</a>
</div>
<div class="breadcrumb-item">Edit Produk</div>
</div>
</div>

<a href="{{ route('admin.product') }}" class="btn btn-warning mb-3">
Kembali
</a>

<div class="card">

<form action="{{ route('admin.product.update', $product->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="card-body">

<div class="row">

<!-- NAMA -->
<div class="col-6">
<div class="form-group">
<label>Nama Produk</label>
<input type="text"
name="name"
class="form-control"
value="{{ $product->name }}"
required>
</div>
</div>

<!-- HARGA -->
<div class="col-6">
<div class="form-group">
<label>Harga Produk (Point)</label>
<input type="number"
name="price"
class="form-control"
value="{{ $product->price }}"
required>
</div>
</div>

<!-- 🔥 FLASH SALE -->
<div class="col-6">
<div class="form-group">
<label>Harga Flash Sale (opsional)</label>
<input type="number"
name="discount_price"
class="form-control"
value="{{ $product->discount_price }}">
</div>
</div>

<!-- KATEGORI -->
<div class="col-6">
<div class="form-group">
<label>Kategori Produk</label>
<input type="text"
name="category"
class="form-control"
value="{{ $product->category }}"
required>
</div>
</div>

<!-- DESKRIPSI -->
<div class="col-12">
<div class="form-group">
<label>Deskripsi Produk</label>
<textarea name="description"
class="form-control"
rows="5"
required>{{ $product->description }}</textarea>
</div>
</div>

<!-- IMAGE -->
<div class="col-12">
<div class="form-group">
<label>Gambar Baru (opsional)</label>
<input type="file" name="image" class="form-control">
<small>Gambar lama tetap dipakai jika tidak diubah</small>
</div>
</div>

</div>

<button type="submit" class="btn btn-primary mt-3">
<i class="fas fa-save"></i> Simpan
</button>

</div>

</form>

</div>

</section>
</div>
@endsection