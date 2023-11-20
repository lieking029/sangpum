@extends('layouts.app')

@section('content')
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
                        <li><a class="dropdown-item btn rounded-5 mb-3" href="#"
                                style="background: #55AAAD; color:white;">Action</a></li>
                        <li><a class="dropdown-item btn rounded-5 mb-3" href="#"
                                style="background: #55AAAD; color:white;">Action</a></li>
                        <li><a class="dropdown-item btn rounded-5 mb-3" href="#"
                                style="background: #55AAAD; color:white;">Action</a></li>
                        <li><a class="dropdown-item btn rounded-5" href="#"
                                style="background: #55AAAD; color:white;">Action</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container row">
                <div class="col d-flex justify-content-evenly">
                    <img src="" alt="" height="100" width="100" class="rounded-5">
                    <div class="mt-1">
                        <div class="d-flex">
                            <span class="fw-bold">{{ auth()->user()->shop->shop_name ?? 'No Shop yet' }}</span>
                            <div class="">
                                <i class="fas fa-check-circle mx-3"></i>
                                <a href="#" class="btn"
                                    style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; margin-left: 20px; color: white">Edit
                                    Shop</a> <br>
                            </div>
                        </div>
                        <span>{{ auth()->user()->shop->shop_address ?? 'No address yet' }}</span>
                    </div>
                </div>
                <div class="col">
                    <img src="" alt="" height="100" width="600">
                </div>
            </div>

            <div class="mt-4 table-responsive">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-2 text-center">
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
            <div class="row">
                <div class="col-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
