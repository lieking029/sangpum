@extends('layouts.app')

@section('content')
    <style>
        .vertical-divider {
            border-left: 1px solid #000;
            /* This creates the vertical line */
            height: 100%;
            /* This sets the height */
            margin: 0 10px;
            /* This adds some horizontal spacing */
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2" style="background: rgb(153, 207, 208); min-height: 100vh">
                <div class="text-center">
                    <img height="150" width="150" class="rounded-circle mt-4"
                        src="{{ auth()->user()->profile ? asset('/storage' . auth()->user()->profile) : asset('icons/default-profile-photo.jpg') }}"
                        alt="">
                    <br>
                    <h5 style="font-weight: 700">{{ auth()->user()->first_name }}</h5>
                    <div class="mt-5">
                        <a class="btn rounded-5 text-white"
                            style="background: #55AAAD; padding-right: 90px; padding-left: 90px"
                            href="{{ route('profile.show') }}"><strong>My Account</strong></a>
                        <a class="btn rounded-5 text-white mt-3"
                            style="background: #4C5370; padding-right: 90px; padding-left: 90px"
                            href="{{ route('shipping.myPurchase') }}"><strong>My Purchase</strong></a>
                    </div>
                </div>
            </div>
            <div class="col-10 mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col" style="color: #8A8A8A">
                            <i class="fas fa-truck" style="font-size: 20px"></i>
                            Seller is Preparing your order
                        </div>
                        <div class="col text-end"><strong>Order Id: </strong></i> {{ $shipment->order_id }} </div>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <div class="d-flex align-items-center" style="margin-left: 18%">
                            <div>
                                <div class="rounded-circle px-2 py-1 mt-1"
                                    style="background: {{ $shipment->status >= 0 ? '#FFDE59' : '#4C5370' }}; width: 35px;">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                            <div style="width: 10rem; height: 100%; border: 5px solid #4C5370; margin: 0 10px;"
                                class="rounded-5"></div>
                            <div class="text-center">
                                <div class="rounded-circle px-2 py-1 mt-1"
                                    style="background: {{ $shipment->status >= 1 ? '#FFDE59' : '#4C5370' }};; width: 35px;">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                            <div style="width: 10rem; height: 100%; border: 5px solid #4C5370; margin: 0 10px;"
                                class="rounded-5"></div>
                            <div class="text-center">
                                <div class="rounded-circle px-2 py-1 mt-1"
                                    style="background: {{ $shipment->status >= 2 ? '#FFDE59' : '#4C5370' }};; width: 35px;">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                            <div style="width: 10rem; height: 100%; border: 5px solid #4C5370; margin: 0 10px;"
                                class="rounded-5"></div>
                            <div class="text-center">
                                <div class="rounded-circle px-2 py-1 mt-1"
                                    style="background: {{ $shipment->status >= 3 ? '#FFDE59' : '#4C5370' }};; width: 35px;">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center" style="margin-left: 18%">
                            <div>
                                <strong>To Ship</strong>

                            </div>
                            <div style="width: 8rem; height: 100%; border: 5px solid white; margin: 0 10px;"
                                class="rounded-5"></div>
                            <div class="">
                                <strong>Shipped</strong>
                            </div>
                            <div style="width: 7rem; height: 100%; border: 5px solid white; margin: 0 10px;"
                                class="rounded-5"></div>
                            <div>
                                <strong>Out for Delivery</strong>
                            </div>
                            <div style="width: 6rem; height: 100%; border: 5px solid white; margin: 0 10px;"
                                class="rounded-5"></div>
                            <div>
                                <strong>Delivered</strong>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <strong>Tracking No.</strong> <span>{{ $shipment->order_id }}</span>
                        <hr>
                        <div class="row">
                            <div class="col-4" style="border-right: 2px solid #8A8A8A">
                                <div class="text-center">
                                    <span class="btn text-white rounded-5"
                                        style="background: #4E6A80; width: 75%"><strong>Delivery Address</strong></span>
                                </div>
                                <div class="mt-3" style="margin-left: 12%; color: #737373">
                                    <strong>{{ $shipment->user->first_name }} {{ $shipment->user->middle_name }}
                                        {{ $shipment->user->last_name }} </strong> <br>
                                    <span>{{ $shipment->user->address }}</span> <br>
                                    <span>{{ $shipment->user->email }}</span>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="container">
                                    <span class="btn text-white rounded-5"
                                        style="background: #55AAAD; width: 50%"><strong>Tracking History</strong></span>
                                    <br>

                                    @if ($shipment->status >= 0)
                                        <div class="row" style="margin-left: 2%">
                                            <div class="col-1 mt-4">
                                                <div class="rounded-circle p-1 text-center text-white"
                                                    style="background: #A6A6A6; width: 30px; font-size: 18px">
                                                    <i class="fas fa-paste"></i>
                                                </div>
                                            </div>
                                            <div class="col-5 mt-4 text-start" style="font-size: 18px">
                                                {{ \Carbon\Carbon::parse($shipment->tracking->order_placed)->format('n/j/Y g:i A') }}
                                            </div>
                                            <div class="col-6 mt-4" style="font-size: 18px">
                                                <strong>Order Placed</strong> <br>
                                                <span>Order is Placed</span>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($shipment->status >= 1)
                                        <div class="row" style="margin-left: 2%">
                                            <div class="col-1 mt-4">
                                                <div class="rounded-circle p-1 text-center text-white"
                                                    style="background: #83E0E4; width: 30px; font-size: 18px">
                                                    <i class="fas fa-store"></i>
                                                </div>
                                            </div>
                                            <div class="col-5 mt-4 text-start" style="font-size: 18px">
                                                {{ \Carbon\Carbon::parse($shipment->tracking->pre_ship)->format('n/j/Y g:i A') }}
                                            </div>
                                            <div class="col-6 mt-4" style="font-size: 18px">
                                                <strong>Preparing to Ship</strong> <br>
                                                <span>Seller is preparing to ship your parcel</span>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($shipment->status >= 2)
                                        <div class="row" style="margin-left: 2%">
                                            <div class="col-1 mt-4">
                                                <div class="rounded-circle p-1 text-center text-white"
                                                    style="background: #55AAAD; width: 30px; font-size: 18px">
                                                    <i class="fas fa-motorcycle"></i>
                                                </div>
                                            </div>
                                            <div class="col-5 mt-4 text-start" style="font-size: 18px">
                                                {{ \Carbon\Carbon::parse($shipment->tracking->delivery)->format('n/j/Y g:i A') }}
                                            </div>
                                            <div class="col-6 mt-4" style="font-size: 18px">
                                                <strong>Out for Delivery</strong> <br>
                                                <span>The rider will attempt to deliver your parcel</span>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="text-end mt-5">
                                        <a href="{{ route('shipping.myPurchase') }}"
                                            class="btn text-white rounded-5 px-4"
                                            style="background: #4C5571"><strong>Back</strong></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
