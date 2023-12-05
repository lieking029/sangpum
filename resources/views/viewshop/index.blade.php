@extends('layouts.app')

@section('content')
    <style>
        .table-responsive {
            overflow-x: hidden;
        }

        .custom-border {
            border: 5px solid #5DE0E6;
        }
    </style>
    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col-2">
                <div class="dropdown">
                    <button class="btn btn-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-bars" style="font-size: 23px"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3"
                                href="{{ route('shipping.myPurchase') }}"
                                style="background: #55AAAD; color:white; width: 85%">My
                                Purchase</a></li>
                    </ul>
                    <a class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500"
                        href="{{ route('post.index') }}">Marketplace</a>
                </div>
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
                <a class="btn" style="background:#4E6A80" href="{{ url('/') }}"><i class="fas fa-home"
                        style="color: white"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <img src="{{ $profilePicture }}" alt="" height="100" width="100"
                            class="rounded-5 me-3">
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold">{{ $shop->shop_name }}</span>
                                <i class="fas fa-check-circle mx-3"></i>
                                <a href="{{ url('chatify', $user->id) }}" class="btn"
                                    style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; color: white">Message
                                    Shop
                                </a>
                            </div>
                            <span>{{ $shopAddress }}</span>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <img src="{{ asset('icons/White Classy and Refined Real Estate Banner (1).png') }}" alt=""
                            height="100" width="600">
                    </div>
                </div>
            </div>


            <div class="mt-4 table-responsive">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-2 text-center container">
                            <a href="{{ route('productDetails', $product->id) }}" style="text-decoration: none">
                                <img class="custom-border rounded-5"
                                    src="{{ asset('storage/' . $product->productImages->first()->image_path) }}"
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
            <div class="card-footer mt-3 ">
                <div class="d-flex justify-content-end">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
