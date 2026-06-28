@extends('layouts.user.main')

@section('content')

<!-- DETAIL -->
<section class="section_gap">

<div class="product_image_area">
<div class="container">

<div class="row s_product_inner">

<!-- IMAGE -->
<div class="col-lg-6">
    <img class="img-fluid"
         src="{{ asset('images/' . $product->image) }}"
         alt="{{ $product->name }}">
</div>

<!-- DETAIL -->
<div class="col-lg-5 offset-lg-1">

<h3>{{ $product->name }}</h3>

<!-- PRICE -->
@if($product->discount_price)

    <h4 style="color: gray;">
        <del>{{ number_format($product->price) }} Points</del>
    </h4>

    <h2 style="color: red;">
        {{ number_format($product->discount_price) }} Points
    </h2>

@else

    <h2>{{ number_format($product->price) }} Points</h2>

@endif

<!-- DESCRIPTION -->
<p>{{ $product->description }}</p>

<!-- BUY BUTTON (FIX PENTING) -->
<a href="javascript:void(0);"
   class="primary-btn"
   onclick="buy({{ $product->id }})">

   Beli

</a>

</div>

</div>

</div>
</div>

</section>

<!-- SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function buy(productId)
{
    Swal.fire({
        title: 'Konfirmasi Pembelian',
        text: "Apakah kamu yakin ingin membeli produk ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Beli!',
        cancelButtonText: 'Batal'
    }).then((result) => {

        if (result.isConfirmed) {

            // 🔥 FIX FINAL (SESUAI ROUTE BARU)
            window.location.href =
                "{{ url('user/product/purchase') }}/" + productId;

        }

    });
}
</script>

@endsection