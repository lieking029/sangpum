@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col-2"><i class="fas fa-bars"></i> <span class="btn btn-secondary">Marketplace</span></div>
        <div class="col-8 d-flex"><input type="search" class="form-control"><i class="fas fa-search"></i></div>
        <div class="col-2 text-end"><span class="btn btn-secondary"><i class="fas fa-home"></i></span></div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-2 text-center">
                <a href="{{ route('productDetails', $product->id) }}" style="text-decoration: none">
                    <img class="border border-5 rounded-5" src="https://scontent.fmnl9-4.fna.fbcdn.net/v/t39.30808-6/355459684_995658415192585_5242516178701158225_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeG7uCcEq9_G6hvBmwZDugTI5f3TgIY7Z6fl_dOAhjtnp027VQ4J47mjO2sx0b-GgdJbZWvTx-Nu9mBm7e85-cJW&_nc_ohc=cVbvfYYhG1gAX9P7-br&_nc_ht=scontent.fmnl9-4.fna&oh=00_AfB6MbqwxJxXHW_y2ycXBl3mkeAjW_mfXmL3OW3G9ewCXw&oe=655F6368" alt="img" height="200" width="200">
                    <div class="text-black">
                        <span>{{ $product->product_name }}</span> <br>
                        <strong>P {{ $product->productVariations[0]->price }}</strong>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="col-12">
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection
