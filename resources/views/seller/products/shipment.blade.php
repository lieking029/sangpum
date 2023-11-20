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
            <div class="card-header d-flex justify-content-evenly border rounded-3">
                <label for="">orders</label>
                <label for="">nigga</label>
                <label for="">nigga</label>
                <label for="">nigga</label>
                <label for="">nigga</label>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <img src="" alt="" class="border rounded-5 mx-3" width="40" height="40">
                    <div class="d-flex flex-column justify-content-center">
                        <label for="">bunnyy</label>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="btn m-2"
                            style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; color: white">
                            Delete</a>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-center">
                        <label for="">Order ID: </label>
                    </div>
                    <div class="d-flex flex-column justify-content-center mx-3">
                        <label for="">bunnyy</label>
                    </div>
                </div>
            </div>
            <hr>

        </div>
    </div>
@endsection
