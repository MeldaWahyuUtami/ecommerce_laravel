@extends('layouts.admin.main')

@section('title', 'Tambah Produk')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Tambah Produk</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- DISTRIBUTOR -->
                        <div class="form-group">
                            <label>Nama Distributor</label>

                            <select name="id_distributor" class="form-control" required>
                                <option value="">-- Pilih Distributor --</option>

                                @if(isset($distributors))
                                    @foreach ($distributors as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_distributor }}
                                        </option>
                                    @endforeach
                                @endif

                            </select>
                        </div>

                        <!-- NAMA PRODUK -->
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <!-- HARGA -->
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>

                        <!-- KATEGORI -->
                        <div class="form-group">
                            <label>Kategori Produk</label>
                            <input type="text" name="category" class="form-control" required>
                        </div>

                        <!-- DESKRIPSI -->
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <!-- GAMBAR -->
                        <div class="form-group">
                            <label>Gambar Produk</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <!-- BUTTON -->
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('admin.product') }}" class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>
            </div>

        </div>

    </section>
</div>

@endsection