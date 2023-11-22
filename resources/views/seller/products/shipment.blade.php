@extends('layouts.app')

@section('content')
    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col mt-2">
                <h3 style="color: #4C5571; font-weight: 800">Shipment</h3>
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
            {{-- <div class="card-header d-flex justify-content-evenly border rounded-3">
                <label for=""><u>orders</u></label>
                <label for="">nigga</label>
                <label for="">nigga</label>
                <label for="">nigga</label>
                <label for="">nigga</label>
            </div> --}}
            {{-- <hr> --}}
            <div class="row">
                @foreach ($shipments as $shipment)
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <img src="" alt="" class="border rounded-5 mx-3" width="40" height="40">
                        <div class="d-flex flex-column justify-content-center">
                            <strong style="text-transform: uppercase">{{ $shipment->user->first_name }}</strong>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <a href="#" class="btn m-2"
                                style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; color: white">
                                Message</a>
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
                                @if (is_null($shipment->status))
                                    <button style="border: 0; background: none" data-bs-toggle="modal" data-bs-target="#exampleModal"><strong style="color: #55AAAD">Arrange Shipment</strong></button>
                                @elseif ($shipment->status == 0)
                                    <a href="{{ route('toShipping', $shipment->id) }}" style="border: 0; background: none; text-decoration: none"><strong style="color: #55AAAD">Arrived in Shipment</strong></a>
                                    @elseif ($shipment->status == 1)
                                    <a href="{{ route('toReceive', $shipment->id) }}" style="border: 0; background: none; text-decoration: none"><strong style="color: #55AAAD">Out for Delivery</strong></a>
                                    @elseif ($shipment->status == 2)
                                    <a href="{{ route('complete', $shipment->id) }}" style="border: 0; background: none; text-decoration: none"><strong style="color: #55AAAD">Parcel is Delivered</strong></a>
                                @endif
                                <strong>View Details</strong>
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
                    {{-- MODALS --}}

                    {{-- PICK UP MODAL --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" style="font-weight: 800" id="exampleModalLabel">Ship Order</h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <strong>Order Id:</strong><span>{{ $shipment->order_id }}</span>
                              <div class="text-center mt-4">
                                <h4 style="color: #4C5571; font-size: 30px">I will Arrange Pickup</h4>
                                <span>J&T Express will collect the parcel</span> <br>
                                <span>from your pickup address</span> <br>

                                <a href="{{ route('toShipment', $shipment->id) }}" class="btn text-white mt-5 px-5 rounded-5" style="background: #55AAAD"><strong>Confirm</strong></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
            @endforeach
            {{-- <div class="card-footer d-flex justify-content-between pt-5">
                <div class="">
                    <a href="#" class="btn m-2"
                        style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 5px; padding-bottom: 5px; padding-right: 20px; padding-left: 20px; border-radius: 0; color: white">
                        Delete</a>
                </div>
                <div class="">
                    <a href="#" class="btn m-2"
                        style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 5px; padding-bottom: 5px; padding-right: 20px; padding-left: 20px; border-radius: 0; color: white">
                        Delete</a>
                </div>
            </div> --}}

        </div>
    </div>
</div>
@endsection
