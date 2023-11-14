@extends('layouts.guest')

@section('content')
@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
    <div class="col-md-6">
        <div class="card mb-4 mx-4">
            <div class="card-body p-4">
                <h1>Register</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                        <select name="role" id="" class="form-select">
                            <option value="" selected disabled>Select Role</option>
                            <option value="buyer">Buyer</option>
                            <option value="seller">Seller</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="first_name" placeholder="{{ __('First Name') }}" required
                               autocomplete="first_name" autofocus>
                        @error('first_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="middle_name" placeholder="{{ __('Middle Name') }}" required
                               autocomplete="middle_name" autofocus>
                        @error('middle_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="last_name" placeholder="{{ __('Last Name') }}" required
                               autocomplete="last_name" autofocus>
                        @error('last_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                        <input class="form-control" type="date" name="birth_date" required
                               autocomplete="last_name" autofocus>
                        @error('birth_date')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="email" placeholder="{{ __('Email') }}" required
                               autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="nickname" placeholder="{{ __('Nickname') }}" required
                               autocomplete="nickname">
                        @error('nickname')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="astr_sign" placeholder="{{ __('Astrological Sign') }}" required
                               autocomplete="astr_sign">
                        @error('astr_sign')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="kpop_group" placeholder="{{ __('K-Pop Group') }}" required
                               autocomplete="kpop_group">
                        @error('kpop_group')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="bias" placeholder="{{ __('K-Pop Bias') }}" required
                               autocomplete="bias">
                        @error('bias')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="barangay" placeholder="{{ __('Barangay') }}" required
                               autocomplete="barangay">
                        @error('barangay')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text" name="address" placeholder="{{ __('Address') }}" required
                               autocomplete="address">
                        @error('address')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                    <select name="govt_type" id="" class="form-select">
                        <option value="" selected disabled>Select Type Of Govt. ID</option>
                        <option value="UMID">UMID</option>
                        <option value="Driver's License">Driver's License</option>
                        <option value="Philhealth Card">Philhealth Card</option>
                        <option value="SSS ID">SSS ID</option>
                        <option value="Passport ID">Passport ID</option>
                        <option value="National ID">National ID</option>
                        <option value="Other ID">Other ID</option>
                    </select>
                        @error('govt_type')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="file" name="govt_id">
                            @error('govt_id')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>


                    <div class="input-group mb-4"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                        </svg></span>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                        name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required
                        autocomplete="new-password">
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                        <input class="form-control" type="text"
                               name="shop_name" placeholder="{{ __('Shop Name') }}" autocomplete="shop_name">
                        @error('shop_name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" name="shop_address" placeholder="{{ __('Shop Address') }}"
                                   autocomplete="shop_address">
                            @error('shop_address')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="text" name="shop_barangay" placeholder="{{ __('Shop Barangay') }}"
                                   autocomplete="shop_address">
                            @error('shop_barangay')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="date" name="date_established" autocomplete="shop_address">
                            @error('date_established')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="date" name="date_established" autocomplete="date_established">
                            @error('date_established')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="string" name="contact_number" autocomplete="contact_number" placeholder="Shop's Contact Number">
                            @error('contact_number')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="string" name="dti_number" autocomplete="dti_number" placeholder="DTI Number">
                            @error('dti_number')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="file" name="dti_permit">
                            @error('dti_permit')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="file" name="barangay_clearance">
                            @error('barangay_clearance')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                        </svg></span>
                            <input class="form-control" type="file" name="business_permit">
                            @error('business_permit')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>

                    <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button>

                </form>
            </div>
        </div>
    </div>

@endsection
