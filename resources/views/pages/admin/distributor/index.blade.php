@extends('layouts.admin.main')

@section('title', 'Admin Distributor')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Distributor</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Distributor</div>
            </div>
        </div>

        <div class="row mb-3">

            {{-- BUTTON TAMBAH & EXPORT --}}
            <div class="col-md-4">

                {{-- FIX: tombol sekarang sudah benar --}}
                <a href="{{ route('distributor.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Distributor
                </a>

                <a href="{{ route('distributor.export') }}" class="btn btn-info">
                    <i class="fas fa-print"></i> Export
                </a>

            </div>

            {{-- FORM IMPORT --}}
            <div class="col-md-8">
                <form action="{{ route('distributor.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex align-items-center">

                        <div class="form-group mb-0 mr-2">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="customFile" required>
                                <label class="custom-file-label" for="customFile">
                                    Pilih File Excel
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Import
                        </button>

                    </div>
                </form>
            </div>

        </div>

        {{-- TABLE --}}
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-md">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Distributor</th>
                                <th>Kota</th>
                                <th>Provinsi</th>
                                <th>Kontak</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @php $no = 1; @endphp

                            @forelse ($distributors as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_distributor }}</td>
                                    <td>{{ $item->kota }}</td>
                                    <td>{{ $item->provinsi }}</td>
                                    <td>{{ $item->kontak }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="#" class="badge badge-warning">Edit</a>
                                        <a href="#" class="badge badge-danger">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Distributor Kosong
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