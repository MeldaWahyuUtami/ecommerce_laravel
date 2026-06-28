@extends('layouts.user.main')

@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Detail Pembelian</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ route('user.dashboard') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Detail Pembelian</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<section class="section_gap">
    <div class="container">

        <div class="row s_product_inner">

            <div class="col-lg-6">
                <div class="single-prd-item">
                    <img class="img-fluid" src="{{ asset('images/' . $data->image) }}" alt="">
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">

                    <h3>{{ $data->name }}</h3>

                    <h2>
                        {{ $data->discount_price ?? $data->price }} Points
                    </h2>

                    <ul class="list">
                        <li>
                            <span>Kategori</span> : {{ $data->category }}
                        </li>
                    </ul>

                    <p>{{ $data->description }}</p>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection