@extends('layouts.app')

@section('content')
    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col mt-2">
                <h3 style="color: #4C5571; font-weight: 800">Delivered Items</h3>
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
                        {{-- <li class="text-center" style="margin-left: 20px"><span class="dropdown-item btn rounded-5 mb-3" href="#"
                            style="background: #55AAAD; color:white; width: 85%">Finance</span></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($shipments as $shipment)
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <img src="" alt="" class="border rounded-5 mx-3" width="40" height="40">
                        <div class="d-flex flex-column justify-content-center">
                            <strong style="text-transform: uppercase">{{ $shipment->user->first_name }}</strong>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            {{-- <a href="#" class="btn m-2"
                                style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; color: white">
                                Message</a> --}}
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <div class=" flex-column justify-content-center">
                            <strong>Order ID: </strong>
                            <span>{{ $shipment->order_id }}</span>
                        </div>
                    </div>
                </div>
                    <hr>
                    <div class="row d-flex">
                        <div class="col">
                            <div class="form-check d-flex">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                    style="margin-top: 45px; margin-right:20px;">
                                <img src="{{ $shipment->product_image }}" alt="" width="100" height="100" class="mb-3">
                                <div class="d-flex justify-content-center" style="margin-top: 40px; margin-left:40px;">
                                    <strong style="text-transform: uppercase">{{ $shipment->product->product_description }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column align-items-end mx-4" style="margin-top: 40px;">
                                {{-- @if (is_null($shipment->status))
                                    <button style="border: 0; background: none" data-bs-toggle="modal" data-bs-target="#exampleModal"><strong style="color: #55AAAD">Arrange Shipment</strong></button>
                                @elseif ($shipment->status == 0)
                                    <a href="{{ route('toShipping', $shipment->id) }}" style="border: 0; background: none; text-decoration: none"><strong style="color: #55AAAD">Arrived in Shipment</strong></a>
                                    @elseif ($shipment->status == 1)
                                    <a href="{{ route('toReceive', $shipment->id) }}" style="border: 0; background: none; text-decoration: none"><strong style="color: #55AAAD">Out for Delivery</strong></a>
                                    @elseif ($shipment->status == 2)
                                    <a href="{{ route('complete', $shipment->id) }}" style="border: 0; background: none; text-decoration: none"><strong style="color: #55AAAD">Parcel is Delivered</strong></a>
                                @endif --}}
                                {{-- <strong>View Details</strong> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="flex-column justify-content-center">
                                    <strong >Quantity:  </strong> <span>x{{ $shipment->quantity }}</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex flex-column justify-content-center">
                                    <strong>Order Total: </strong>
                                </div>
                                <div class="d-flex flex-column justify-content-center mx-4">
                                    <strong style="color: #FF2500">P {{ number_format($shipment->total, 2) }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection
