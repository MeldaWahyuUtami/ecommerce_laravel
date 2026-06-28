@extends('layouts.user.main')

@section('content')

<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">

            <div class="col-lg-12">

                <div class="row">

                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">

                            <h1>Latest Collection</h1>

                            <p>
                                Produk terbaru dengan harga terbaik tersedia sekarang.
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="banner-img">
                            <img class="img-fluid"
                                 src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}"
                                 alt="banner">
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<section class="section_gap">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">

                <div class="section-title">
                    <h1>Latest Products</h1>
                </div>

            </div>
        </div>

        <div class="row">

            @forelse ($products as $item)

            <div class="col-lg-3 col-md-6">

                <div class="single-product">

                    {{-- IMAGE SAFE --}}
                    <img class="img-fluid"
                         src="{{ $item->image ? asset('images/' . $item->image) : asset('images/default.png') }}"
                         alt="{{ $item->name }}">

                    <div class="product-details">

                        <h6>{{ $item->name }}</h6>

                        {{-- PRICE + FLASH SALE FIX --}}
                        <div class="price">

                            @if(!is_null($item->discount_price))

                                <h6 style="text-decoration: line-through; color: gray;">
                                    {{ number_format($item->price) }} Points
                                </h6>

                                <h6 style="color: red; font-weight: bold;">
                                    {{ number_format($item->discount_price) }} Points
                                </h6>

                                <span class="badge badge-danger">FLASH SALE</span>

                            @else

                                <h6>{{ number_format($item->price) }} Points</h6>

                            @endif

                        </div>

                        <div class="prd-bottom">

                            {{-- DETAIL --}}
                            <a class="social-info"
                               href="{{ route('user.detail.product', $item->id) }}">

                                <span class="lnr lnr-move"></span>
                                <p class="hover-text">Detail</p>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12 text-center">
                <h3>Tidak ada produk</h3>
            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection