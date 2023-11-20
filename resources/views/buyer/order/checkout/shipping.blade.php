@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col-2"><i class="fas fa-bars"></i> <span class="btn btn-secondary">Marketplace</span></div>
        <div class="col-8 d-flex"><input type="search" class="form-control"><i class="fas fa-search"></i></div>
        <div class="col-2 text-end"><span class="btn btn-secondary"><i class="fas fa-home"></i></span></div>
    </div>
    <div class="text-center p-3">
        <h3 style="color: #4C5571">Shipping</h3>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif

    <form action="{{ route('shipping.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col" style="border-right: 1px solid grey">
                <div class="px-5" >
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 19px"><strong>Shipping Information</strong></label>
                        <p class="w-75">
                            <span style="color: #737373">{{ auth()->user()->first_name }} {{ auth()->user()->middle_name }} {{ auth()->user()->last_name }}</span> <br>
                            <span style="color: #737373">{{ auth()->user()->address }}</span> <br>
                            <span style="color: #737373">{{ auth()->user()->email }}</span>
                        </p>
                        <br>
                        <label for="" style="font-size: 19px"><strong>Shipping Fee</strong></label>
                        <div class="border border-2 mb-3 py-2 px-4" style="margin-left: 2%">
                            <span>Shipping Details</span>
                            <span class="" style="float: right">Weight: {{ $weight }}kg = P {{ $shippingFee }}</span>
                        </div>
                        <span style="margin-left: 3%; font-size: 13px">Delivery may take 5 - 7 working days upon placement of order. Sundays and holidays excluded.</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="px-5">
                    <div class="form-group mt-2">
                        <label for="" style="font-size: 19px"><strong>Order Details</strong></label>
                        <div class="row">
                            <div class="col-3">
                                <img class="border border-5 rounded-5" src="https://scontent.fmnl9-4.fna.fbcdn.net/v/t39.30808-6/355459684_995658415192585_5242516178701158225_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeG7uCcEq9_G6hvBmwZDugTI5f3TgIY7Z6fl_dOAhjtnp027VQ4J47mjO2sx0b-GgdJbZWvTx-Nu9mBm7e85-cJW&_nc_ohc=cVbvfYYhG1gAX9P7-br&_nc_ht=scontent.fmnl9-4.fna&oh=00_AfB6MbqwxJxXHW_y2ycXBl3mkeAjW_mfXmL3OW3G9ewCXw&oe=655F6368" alt="img" height="130" width="140">
                            </div>
                            <div class="col-7">
                                <h5>{{ $shipping->product->product_description }}</h5>
                                <input type="hidden" name="order_id" value="{{ $shipping->id }}">
                                <input type="hidden" name="product_id" value="{{ $shipping->product->id }}">
                                <input type="hidden" name="product_variation_id" value="{{ $shipping->productVariation->id }}">
                                <input type="hidden" name="quantity" value="{{ $shipping->quantity }}">
                                <span style="font-size: 15px">Variation: {{ $shipping->productVariation->variation_name }}</span> <br>
                                <span style="font-size: 15px">Qty: {{ $shipping->quantity }} Item(s)</span> <br>
                                <span style="font-size: 15px">Product subtotal: {{ number_format($shipping->total, 2) }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="" style="font-size: 19px"><strong>Order Total</strong></label>
                            <div class="m-2">
                                <div class="row">
                                    <div class="col">
                                        <span>Merchendise:</span> <br>
                                        <span>Shipping:</span> <br> <br>
                                        <strong>Order Total</strong>
                                    </div>
                                    <div class="col text-end">
                                        <strong>P {{ number_format($shipping->total, 2) }}</strong> <br>
                                        <strong>+ {{ number_format($shippingFee, 2) }}</strong> <br> <br>
                                        <h5 style="color: #1671CC; font-weight: 700">P {{ number_format($shipping->total + $shippingFee, 2) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <label for="" style="font-size: 19px"><strong>Wallet Details</strong></label>
                            <div class="row">
                                <div class="col">
                                    <span>Current Wallet Balance:</span> <br>
                                    <span>Order Total:</span> <br> <br>
                                </div>
                                <div class="col text-end">
                                    <strong>{{ number_format(auth()->user()->wallet, 2) }}</strong> <br>
                                    <strong>P {{ number_format($shipping->total + $shippingFee, 2) }}</strong> <br>
                                    @if($shipping->total + $shippingFee > auth()->user()->wallet)
                                        <div class="alert alert-danger" role="alert">
                                            Insufficient wallet balance for this order.
                                        </div>
                                    @else
                                        <strong id="change">P {{ number_format(auth()->user()->wallet - ($shipping->total + $shippingFee), 2) }}</strong>
                                        <input type="hidden" name="total" value="{{ $shipping->total + $shippingFee }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row my-3">
            <div class="col"></div>
            <button type="submit" class="btn rounded-5 text-white col-5 mx-5 text-center"
            style="background: #55AAAD"
            @if($shipping->total + $shippingFee > auth()->user()->wallet) disabled @endif>
            <strong>Complete to Payment</strong>
        </button>
        </div>
    </div>
    </form>

@endsection
