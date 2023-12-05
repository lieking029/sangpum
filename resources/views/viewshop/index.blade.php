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
            <div class="col mt-2">
                <h4>My Shop</h4>
            </div>
            <div class="col text-end mt-1">
                <div class="dropdown">
                    <button class="btn btn-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-bars" style="font-size: 23px"></i>
                    </button>
                </div>
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
                                    style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; color: white">Message Shop
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
