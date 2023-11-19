@extends('layouts.guest')

@section('content')
    <div class="col-lg-5">
        <div class="card-group d-md-flex row ">
            <div class="card col-md-7 p-4 mb-0 rounded-5">
                <div class="card-header d-flex justify-content-center">
                    <img src="{{ asset('icons/sangpum-logo-removebg-preview.png') }}" alt="">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column" style="text-align: center;">
                        <h1 class="font-weight: 900;">{{ __('Login') }}</h1>
                        <p>as seller</p>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                                </svg></span>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                                placeholder="{{ __('Email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" placeholder="{{ __('Password') }}" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <!-- Remember Password Checkbox -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Password
                                    </label>
                                </div>
                            </div>

                            <!-- Forgot Your Password Link -->
                            @if (Route::has('password.request'))
                                <div class="col-12 col-md-6 text-end">
                                    <a href="{{ route('password.request') }}" class="btn btn-link"
                                        type="button">{{ __('Forgot Your Password?') }}</a>
                                </div>
                            @endif
                        </div>

                        <div class="input-group mt-3">
                            <button class="btn rounded-5 w-100" type="submit"
                                style="background:#55AAAD; color:white; font-weight: bold">{{ __('Login') }}</button>
                        </div>

                        <div class="input-group mt-4 d-flex justify-content-center">
                            <p>Don't Have an Account? <a href="{{ route('register.seller') }}">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
