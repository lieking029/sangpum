@extends('layouts.app')

@section('content')
    <style>
        .table-responsive {
            overflow-x: hidden;
        }
    </style>

    {{-- @dd(auth()->user()->hasRole('seller')) --}}
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
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('seller.home') }}"
                                style="background: #55AAAD; color:white; width: 85%">My Shop</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('products.index') }}"
                            style="background: #55AAAD; color:white; width: 85%">Product</a></li>
                        <li class="text-center" style="margin-left: 20px"><a class="dropdown-item btn rounded-5 mb-3" href="{{ route('seller.shipment') }}"
                            style="background: #55AAAD; color:white; width: 85%">Shipment</a></li>
                        <li class="text-center" style="margin-left: 20px"><span class="dropdown-item btn rounded-5 mb-3" href="#"
                            style="background: #55AAAD; color:white; width: 85%">Finance</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <img src="" alt="" height="100" width="100" class="rounded-5 me-3">
                        <div>
                            <div class="d-flex align-items-center">
                                <span class="fw-bold">{{ auth()->user()->shop->shop_name ?? 'No Shop yet' }}</span>
                                <i class="fas fa-check-circle mx-3"></i>
                                <a href="#" class="btn"
                                    style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; color: white">Edit
                                    Shop</a>
                            </div>
                            <span>{{ auth()->user()->shop->shop_address ?? 'No address yet' }}</span>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <img src="" alt="" height="100" width="600">
                    </div>
                </div>
            </div>


            <div class="mt-4 table-responsive">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-2 text-center">
                            <div>
                                <img class="border border-5 rounded-5"
                                    src="{{ asset('storage/' . $product->productImages->first()->image_path) }}"
                                    alt="img" height="200" width="200">
                                <div class="text-black">
                                    <span>{{ $product->product_name }}</span> <br>
                                    <strong>P {{ $product->productVariations[0]->price }}</strong>
                                </div>
                            </div>
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
