@extends('layouts.admin.main')

@section('title', 'Admin Product')

@section('content')

<div class="main-content">
<section class="section">

    <!-- HEADER -->
    <div class="section-header">
        <h1>Produk</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </div>
            <div class="breadcrumb-item active">
                Produk
            </div>
        </div>
    </div>

    <!-- BUTTON TAMBAH -->
    <a href="{{ route('admin.product.create') }}"
       class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>

    <!-- TABLE -->
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Nama Distributor</th>
                            <th style="width: 200px;">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($products as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->name }}</td>

                            <!-- 💥 FLASH SALE LOGIC -->
                            <td>
                                @if($item->discount_price)
                                    <span style="text-decoration: line-through; color: red;">
                                        {{ number_format($item->price) }} Points
                                    </span>
                                    <br>
                                    <span style="color: green; font-weight: bold;">
                                        {{ number_format($item->discount_price) }} Points
                                    </span>
                                    <br>
                                    <span class="badge badge-danger">FLASH SALE</span>
                                @else
                                    {{ number_format($item->price) }} Points
                                @endif
                            </td>

                            <!-- DISTRIBUTOR -->
                            <td>
                                {{ $item->nama_distributor ?? '-' }}
                            </td>

                            <!-- ACTION -->
                            <td>
                                <a href="{{ route('admin.product.detail', $item->id) }}"
                                   class="badge badge-info">
                                    Detail
                                </a>

                                <a href="{{ route('admin.product.edit', $item->id) }}"
                                   class="badge badge-warning">
                                    Edit
                                </a>

                                <a href="{{ route('admin.product.delete', $item->id) }}"
                                   class="badge badge-danger"
                                   onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Data Produk Kosong
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</section>
</div>

@endsection