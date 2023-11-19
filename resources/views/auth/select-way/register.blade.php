@extends('layouts.guest')

@section('content')
    <div class="d-flex justify-content-evenly">
        <div class="col-lg-4">
            <div class="card-group d-md-flex row">
                <div class="card col-md-7 p-4 mb-0 rounded-5">
                    <div class="card-header d-flex justify-content-center">
                        <img src="{{ asset('icons/sangpum-logo-removebg-preview.png') }}" alt="">
                    </div>
                    <div class="card-body">
                        <div class="input-group mt-3">
                            <a href="{{ route('register.seller') }}" class="btn rounded-5 w-100"
                                style="background:#55AAAD; color:white; font-weight: bold"> {{ __('Sign up as Seller ') }}</a>
                        </div>

                        <div class="input-group mt-4 d-flex justify-content-center">
                            <p>Already have a Seller Account?  <a href="{{ route('login.seller') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-group d-md-flex row">
                <div class="card col-md-7 p-4 mb-0 rounded-5">
                    <div class="card-header d-flex justify-content-center">
                        <img src="{{ asset('icons/sangpum-logo-removebg-preview.png') }}" alt="">
                    </div>
                    <div class="card-body">
                        <div class="input-group mt-3">
                            <a href="{{ route('register.buyer') }}" class="btn rounded-5 w-100"
                                style="background:#55AAAD; color:white; font-weight: bold">{{ __('Sign up as Buyer') }}</a>
                        </div>
                        <div class="input-group mt-4 d-flex justify-content-center">
                            <p>Already have a Buyer Account? <a href="{{ route('login.buyer') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
