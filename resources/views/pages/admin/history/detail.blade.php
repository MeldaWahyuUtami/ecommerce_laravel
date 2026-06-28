@extends('layouts.admin.main')

@section('title', 'Admin Detail History Pembelian')

@section('content')

<div class="main-content">
<section class="section">

    <div class="section-header">
        <h1>Detail History Pembelian</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('admin.history') }}">History Pembelian</a>
            </div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <a href="{{ route('admin.history') }}" class="btn btn-warning mb-3">
        Kembali
    </a>

    <div class="card">
        <div class="card-body">

            <div class="row">

                <div class="col-6">
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $data->user_name ?? '-' }}"
                               readonly>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $data->product_name ?? '-' }}"
                               readonly>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $data->category ?? '-' }}"
                               readonly>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="text"
                               class="form-control"
                               value="{{ number_format($data->total_harga ?? 0) }}"
                               readonly>
                    </div>
                </div>

            </div>

        </div>
    </div>

</section>
</div>

@endsection