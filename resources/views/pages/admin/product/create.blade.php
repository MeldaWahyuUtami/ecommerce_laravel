@extends('layouts.admin.main')

@section('title', 'Admin Tambah Product')

@section('content')

<div class="main-content">
<section class="section">

<div class="section-header">
<h1>Tambah Produk</h1>

<div class="section-header-breadcrumb">
<div class="breadcrumb-item active">
<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</div>
<div class="breadcrumb-item active">
<a href="{{ route('admin.product') }}">Produk</a>
</div>
<div class="breadcrumb-item">Tambah Produk</div>
</div>
</div>

<a href="{{ route('admin.product') }}" class="btn btn-warning mb-3">
Kembali
</a>

<div class="card mt-4">

<form action="{{ route('admin.product.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="card-body">

<div class="row">

<!-- DISTRIBUTOR -->
<div class="col-6">
<div class="form-group">
<label>Nama Distributor</label>

<select name="id_distributor" class="form-control" required>
<option value="">-- Pilih Distributor --</option>

@foreach ($distributors as $item)
<option value="{{ $item->id }}">
{{ $item->nama_distributor }}
</option>
@endforeach

</select>

</div>
</div>

<!-- NAMA -->
<div class="col-6">
<div class="form-group">
<label>Nama Produk</label>
<input type="text" name="name" class="form-control" required>
</div>
</div>

<!-- HARGA -->
<div class="col-6">
<div class="form-group">
<label>Harga Produk (Point)</label>
<input type="number" name="price" class="form-control" required>
</div>
</div>

<!-- 🔥 FLASH SALE -->
<div class="col-6">
<div class="form-group">
<label>Harga Flash Sale (opsional)</label>
<input type="number" name="discount_price" class="form-control">
</div>
</div>

<!-- KATEGORI -->
<div class="col-6">
<div class="form-group">
<label>Kategori Produk</label>
<input type="text" name="category" class="form-control" required>
</div>
</div>

<!-- DESKRIPSI -->
<div class="col-12">
<div class="form-group">
<label>Deskripsi Produk</label>
<textarea name="description" class="form-control" rows="5" required></textarea>
</div>
</div>

<!-- IMAGE -->
<div class="col-12">
<div class="form-group">
<label>Gambar</label>

<div class="custom-file">
<input type="file" name="image" class="custom-file-input" required>
<label class="custom-file-label">Pilih Gambar</label>
</div>

</div>
</div>

</div>

<button type="submit" class="btn btn-primary">
<i class="fas fa-plus"></i> Tambah
</button>

</div>

</form>

</div>

</section>
</div>

@endsection