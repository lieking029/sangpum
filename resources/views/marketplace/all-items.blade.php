@extends('layouts.app')

@section('content')
    <style>
        .table-responsive {
            overflow-x: hidden;
        }
    </style>
    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col-2">
                <i class="fas fa-bars"></i>
                <span class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500">Marketplace</span>
            </div>
            <div class="col-8">
                <!-- Input group -->
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-2 text-end">
                <span class="btn" style="background:#4E6A80"><i class="fas fa-home" style="color: white"></i></span>
            </div>
        </div>

        <div class="card-body">
            <div class="mt-4 table-responsive">
                <div class="row container-fluid">
                    @foreach ($products as $product)
                        <div class="col-md-2 text-center container">
                            <a href="{{ route('productDetails', $product->id) }}" style="text-decoration: none">
                                <img class="border border-5 rounded-5"
                                src="{{ $product->product_image }}"
                                    alt="img" height="200" width="200">
                                <div class="text-black">
                                    <span>{{ $product->product_name }}</span> <br>
                                    <strong>P {{ $product->productVariations[0]->price }}</strong>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer mt-3 ">
                <div class="d-flex justify-content-end">
                    {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
