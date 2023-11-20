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

    <div class="row">
        <div class="col px-5">
            <div class="form-group mt-2">
                <label for="" style="font-size: 19px"><strong>Shipping Information</strong></label>
                <p class="w-75">
                    <span style="color: #737373">{{ auth()->user()->first_name }} {{ auth()->user()->middle_name }} {{ auth()->user()->last_name }}</span> <br>
                    <span style="color: #737373">{{ auth()->user()->address }}</span> <br>
                    <span style="color: #737373">{{ auth()->user()->email }}</span>
                </p>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>

@endsection
