@extends('layouts.app')

@section('content')

<div class="row" >
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
    <div class="col-10">
        <div class="container">
            <div class="row">
                <div class="col" style="color: #8A8A8A">
                    <i class="fas fa-truck" style="font-size: 20px"></i>
                    Seller is Preparing your order
                </div>
                <div class="col text-end"><strong>Order Id: </strong></i> {{ $shipment->order_id }} </div>
            </div>
             <hr>
        </div>
    </div>
</div>

@endsection
