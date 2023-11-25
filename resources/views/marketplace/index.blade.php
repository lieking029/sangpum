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
                <a class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500" href="/post">Marketplace</a>
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
                <a href="{{ route('top-up.create') }}" class="btn btn-secondary text-white"><strong>Top-up</strong></a>
                <a class="btn" style="background:#4E6A80" href="/"><i class="fas fa-home"
                        style="color: white"></i></a>
            </div>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <img src="{{ asset('icons/White Classy and Refined Real Estate Banner (1).png') }}" alt=""
                            height="350" width="900" class="rounded-5">
                    </div>
                    <div class="col">
                        <div class="row row-cols-2">
                            <div class="col d-flex justify-content-center align-items-center">
                                <img src="{{ asset('icons/314938000_5144313499006456_926033784245206486_n.jpg') }}"
                                    alt="" width="180" height="170" class="rounded-5">
                            </div>
                            <div class="col d-flex justify-content-center align-items-center">
                                <img src="{{ asset('icons/315059954_5146785768759229_1631032876583140623_n.jpg') }}"
                                    alt="" width="180" height="170" class="rounded-5">
                            </div>
                            <div class="col mt-2 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('icons/313033459_5132999743471165_6013417823100087539_n.jpg') }}"
                                    alt="" width="180" height="170" class="rounded-5">
                            </div>
                            <div class="col mt-2 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('icons/314420668_5143355555768917_8662624289564951393_n.jpg') }}"
                                    alt="" width="180" height="170" class="rounded-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 table-responsive">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-2 text-center container">
                            <a href="{{ route('productDetails', $product->id) }}" style="text-decoration: none">
                                <img class="border border-5 rounded-5"
                                src="{{ asset('storage/'. $product->productImages->first()->image_path) }}"
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
        <div class="card-footer d-flex justify-content-end">
            <a href="{{ route('allItems') }}" class="btn btn-primary rounded-5">See all Items</a>
        </div>
    </div>
@endsection
