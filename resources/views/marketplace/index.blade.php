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
                <span class="btn btn-secondary">Marketplace</span>
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
                <span class="btn btn-secondary"><i class="fas fa-home"></i></span>
            </div>
        </div>

        <div class="card-body">
            <div class="container row d-flex justify-content-center">
                <div class="col">
                    <img src="{{ asset('icons/White Classy and Refined Real Estate Banner (1).png') }}" alt=""
                        height="350" width="900" class="rounded-5">
                </div>
                <div class="col">
                    <div class="row row-cols-2">
                        <div class="col">
                            <img src="{{ asset('icons/314938000_5144313499006456_926033784245206486_n.jpg') }}"
                                alt="" width="140" height="170" class="rounded-5">
                        </div>
                        <div class="col">
                            <img src="{{ asset('icons/314938000_5144313499006456_926033784245206486_n.jpg') }}"
                                alt="" width="140" height="170" class="rounded-5">
                        </div>
                        <div class="col mt-2">
                            <img src="{{ asset('icons/314938000_5144313499006456_926033784245206486_n.jpg') }}"
                                alt="" width="140" height="170" class="rounded-5">
                        </div>
                        <div class="col mt-2">
                            <img src="{{ asset('icons/314938000_5144313499006456_926033784245206486_n.jpg') }}"
                                alt="" width="140" height="170" class="rounded-5">
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-4 table-responsive">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col text-center container">
                            <a href="{{ route('productDetails', $product->id) }}" style="text-decoration: none">
                                <img class="border border-5 rounded-5"
                                    src="https://scontent.fmnl9-4.fna.fbcdn.net/v/t39.30808-6/355459684_995658415192585_5242516178701158225_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeG7uCcEq9_G6hvBmwZDugTI5f3TgIY7Z6fl_dOAhjtnp027VQ4J47mjO2sx0b-GgdJbZWvTx-Nu9mBm7e85-cJW&_nc_ohc=cVbvfYYhG1gAX9P7-br&_nc_ht=scontent.fmnl9-4.fna&oh=00_AfB6MbqwxJxXHW_y2ycXBl3mkeAjW_mfXmL3OW3G9ewCXw&oe=655F6368"
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
    </div>
@endsection
