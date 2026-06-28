@extends('layouts.admin.main')

@section('title', 'Riwayat Pembelian')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Riwayat Pembelian</h1>
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $no = 1; @endphp

                        @foreach ($purchases as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>

    </section>
</div>
@endsection