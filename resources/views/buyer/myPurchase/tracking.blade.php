@extends('layouts.app')

@section('content')

<style>
    .vertical-divider {
    border-left: 1px solid #000; /* This creates the vertical line */
    height: 100%; /* This sets the height */
    margin: 0 10px; /* This adds some horizontal spacing */
}

</style>

<div class="row " >
    <div class="col-2" style="background: rgb(153, 207, 208); min-height: 100vh">
        <div class="text-center">
            <img height="150" width="150" class="rounded-circle mt-4" src="https://scontent.fmnl9-2.fna.fbcdn.net/v/t39.30808-6/316541946_876752107083217_5841789909563890176_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHp6OL09d2UfnUuFcRlp8baIdqJpC8rMSgh2omkLysxKCdoRpbmZRyInp5_zCnXNT8QmYMTBdoAECcciFLtEg89&_nc_ohc=49tITbGC5wIAX8RQUyY&_nc_ht=scontent.fmnl9-2.fna&oh=00_AfCfJzg_Fw9pT9clXdXopcsTMp8sM4bKC1enYKR27jVGxQ&oe=6560049B" alt="">
            <br><h5 style="font-weight: 700">{{ auth()->user()->first_name }}</h5>
            <div class="mt-5">
                <button class="btn rounded-5 text-white" style="background: #55AAAD; padding-right: 90px; padding-left: 90px"><strong>My Account</strong></button>
                <button class="btn rounded-5 text-white mt-3" style="background: #4C5370; padding-right: 90px; padding-left: 90px"><strong>My Purchase</strong></button>
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
                        <div class="rounded-circle px-2 py-1 mt-1" style="background: #4C5370; width: 35px;">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                    <div style="width: 10rem; height: 100%; border: 5px solid #4C5370; margin: 0 10px;" class="rounded-5"></div>
                    <div class="text-center">
                        <div class="rounded-circle px-2 py-1 mt-1" style="background: #4C5370; width: 35px;">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                    <div style="width: 10rem; height: 100%; border: 5px solid #4C5370; margin: 0 10px;" class="rounded-5"></div>
                    <div class="text-center">
                        <div class="rounded-circle px-2 py-1 mt-1" style="background: #4C5370; width: 35px;">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                    <div style="width: 10rem; height: 100%; border: 5px solid #4C5370; margin: 0 10px;" class="rounded-5"></div>
                    <div class="text-center">
                        <div class="rounded-circle px-2 py-1 mt-1" style="background: #4C5370; width: 35px;">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center" style="margin-left: 18%">
                    <div>
                        <strong>To Ship</strong>

                    </div>
                    <div style="width: 8rem; height: 100%; border: 5px solid white; margin: 0 10px;" class="rounded-5"></div>
                    <div class="">
                        <strong>Shipped</strong>
                    </div>
                    <div style="width: 7rem; height: 100%; border: 5px solid white; margin: 0 10px;" class="rounded-5"></div>
                    <div>
                        <strong>Out for Delivery</strong>
                    </div>
                    <div style="width: 6rem; height: 100%; border: 5px solid white; margin: 0 10px;" class="rounded-5"></div>
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
                            <span class="btn text-white rounded-5" style="background: #4E6A80; width: 75%"><strong>Delivery Address</strong></span>
                        </div>
                        <div class="mt-3" style="margin-left: 12%; color: #737373">
                            <strong>{{ $shipment->user->first_name }} {{ $shipment->user->middle_name }} {{ $shipment->user->last_name }}  </strong> <br>
                            <span>{{ $shipment->user->address }}</span> <br>
                            <span>{{ $shipment->user->email }}</span>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="container">
                            <span class="btn text-white rounded-5" style="background: #55AAAD; width: 50%"><strong>Tracking History</strong></span> <br>
                            <div class="text-end mt-5">
                                <a href="{{ route('shipping.myPurchase') }}" class="btn text-white rounded-5 px-4" style="background: #4C5571"><strong>Back</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
