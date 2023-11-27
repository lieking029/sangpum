@extends('layouts.app')

@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@endif
<div class="container-fluid card">
    <div class="card-header">
        <h4>Your Shop</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('shop.update', $shop->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="">Shop Name</label>
                        <input type="text" name="shop_name" value="{{ $shop->shop_name }}" placeholder="Shop Name" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Shop Address</label>
                        <input type="text" name="shop_address" value="{{ $shop->shop_address }}" placeholder="Shop Address" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Shop Barangay</label>
                        <input type="text" name="shop_barangay" placeholder="Shop Barangay" value="{{ $shop->shop_barangay }}" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="">Contact Number</label>
                        <input type="number" name="contact_number" placeholder="Contact Number" value="{{ $shop->contact_number }}" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Date Established</label>
                        <input type="date" name="date_established" placeholder="Contact Number" value="{{ $shop->date_established }}" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">DTI Number</label>
                        <input type="text" name="dti_number" placeholder="DTI Number" value="{{ $shop->dti_number }}" class="form-control">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Update</button>
        </form>
    </div>
</div>

@endsection
