@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col-2"><h4 class="">My Purchase</h4></div>
        <div class="col-8 d-flex"></div>
        <div class="col-2 text-end"><span class="btn rounded-5 text-white" style="background: #4E6A80"><strong>Marketplace</strong></span> <a href="" class="btn rounded-5 text-white" style="background: #4E6A80"><i class="fas fa-home"></i></a> </div>
    </div>
    <div class="card-body">
        <h3 style="margin-left: 4%">Orders</h3>
        @foreach ($shipments as $shipment)
            <div class="">
                <div class="row">
                    <div class="col-1">
                        {{ $shipment->product->user->first_name }}
                    </div>
                    <div class="col-2">
                        <a href="" class="text-white px-3" style="background: #A6A6A6"><i class="fas fa-store"> View Shop</i></a>
                    </div>
                    <div class="col-9 text-end">
                        <span style="color: #8A8A8A"><i class="fas fa-truck"></i> Seller is preparing your order </span>
                    </div>
                </div>
                <div class="row" style="border-top: 1px solid #D9D9D9">

                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
