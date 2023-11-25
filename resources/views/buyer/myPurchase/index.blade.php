@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2" style="background: rgb(153, 207, 208); min-height: 100vh">
            <div class="text-center">
                <img height="150" width="150" class="rounded-circle mt-4"
                    src="{{ auth()->user()->profile ? asset('/storage' . auth()->user()->profile) : asset('icons/default-profile-photo.jpg') }}"
                    alt="">
                <br>
                <h5 style="font-weight: 700">{{ auth()->user()->first_name }}</h5>
                <div class="mt-5">
                    <button class="btn rounded-5 text-white"
                        style="background: #55AAAD; padding-right: 90px; padding-left: 90px"><strong>My
                            Account</strong></button>
                    <button class="btn rounded-5 text-white mt-3"
                        style="background: #4C5370; padding-right: 90px; padding-left: 90px"><strong>My
                            Purchase</strong></button>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="container-fluid card">
                <div class="card-header row">
                    <div class="col-2">
                        <h2 class="">My Purchase</h2>
                    </div>
                    <div class="col-8 d-flex"></div>
                    <div class="col-2 text-end"><span class="btn rounded-5 text-white"
                            style="background: #4E6A80"><strong>Marketplace</strong></span> <a href=""
                            class="btn rounded-5 text-white" style="background: #4E6A80"><i class="fas fa-home"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h3 style="margin-left: 4%">Orders</h3>
                    @php
                        $grandTotal = 0;
                    @endphp
                    @foreach ($shipments as $shipment)
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-1">
                                    <h5 style="text-transform: uppercase; font-weight: 700">
                                        {{ $shipment->product->user->first_name }}</h5>
                                </div>
                                <div class="col-2">
                                    <a href="" class="text-white px-3" style="background: #A6A6A6"><i
                                            class="fas fa-store"> View Shop</i></a>
                                </div>
                                <div class="col-9 text-end">
                                    <span style="color: #8A8A8A"><i class="fas fa-truck"></i> Seller is preparing your order
                                    </span>
                                </div>
                            </div>
                            <div class="row " style="border-top: 1px solid #D9D9D9; border-bottom: 1px solid #D9D9D9; ">
                                <div class="col-2 my-4 text-center">
                                    <img class="border border-5 rounded-5"
                                        src="{{ asset('storage/' . $shipment->product->productImages->first()->image_path) }}"
                                        alt="img" height="130" width="140">
                                </div>
                                <div class="col-6 mt-5">
                                    <strong
                                        style="text-transform: uppercase; font-size: 19px">{{ $shipment->product->product_description }}</strong>
                                    <br>
                                    <span>Version: {{ $shipment->productVariation->variation_name }}</span> <br>
                                    <span>x{{ $shipment->quantity }}</span>
                                </div>
                                <div class="col-4 text-end" style="margin-top: 5%">
                                    @if (!is_null($shipment->status))
                                        <a href="{{ route('shipping.tracking', $shipment->id) }}" class=""
                                            style="font-size: 19px; color: #55AAAD; text-decoration: none"><strong>View
                                                Details</strong></a> <br>
                                    @else
                                        <p><strong>Your is on Process</strong></p>
                                    @endif
                                    <span style="font-size: 15px; color: #FF2500">P
                                        {{ number_format($shipment->total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        @php
                            $grandTotal += $shipment->total; // Sum up the totals
                        @endphp
                    @endforeach
                    <div class="row mt-4">
                        <div class="col-8"></div>
                        <div class="col-4 row">
                            <h5 class="col"></h5>
                            <h5 class="col text-center">Order Total:</h5>
                            <h5 class="col text-end" style="color: #FF2500; font-weight: 800">
                                {{ number_format($grandTotal, 2) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
