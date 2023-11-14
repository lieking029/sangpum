@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h4>My Shop</h4>
        </div>
        <div class="col text-end">
            <div class="dropdown">
                <button class="btn btn-transparent" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars" style="font-size: 23px"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col d-flex">
                <img src="" alt="" height="50" width="50">
                <div class="mt-1">
                <span class="fw-bold">{{ auth()->user()->shop->shop_name }}</span> <a href="#" class="btn" style="font-size: 9px; background: rgb(163, 163, 163); padding-top: 2px; padding-bottom: 2px; padding-right: 15px; padding-left: 15px; border-radius: 0; margin-left: 20px; color: white" >Edit Shop</a> <br>
                <span>{{ auth()->user()->shop->shop_address }}</span>
                </div>
            </div>
            <div class="col">
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>

        <div class="mt-4 table-responsive">

        </div>

    </div>
</div>

@endsection
