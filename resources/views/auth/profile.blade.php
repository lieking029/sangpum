@extends('layouts.app')

@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@endif
    <div class="card mb-4">
        <div class="card-header">
            {{ __('My profile') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">{{ $message }}</div>
                            @endif

                            <div class="input-group mb-3"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                                    </svg></span>
                                <input class="form-control" type="text" name="first_name"
                                    placeholder="{{ __('Firstname') }}"
                                    value="{{ old('first_name', auth()->user()->first_name) }}" required>
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
                                <input class="form-control" type="text" name="middle_name"
                                    placeholder="{{ __('Middle Name') }}"
                                    value="{{ old('first_name', auth()->user()->middle_name) }}" required>
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
                                <input class="form-control" type="text" name="last_name"
                                    placeholder="{{ __('Last Name') }}"
                                    value="{{ old('first_name', auth()->user()->last_name) }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="input-type mt-3">
                                <label for="" class="mb-1">Update Profile Picture(Optional)</label>
                                <input type="file" class="form-control" name="profile">
                            </div>


                            <div class="input-group mb-3 mt-3"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                                    </svg></span>
                                <input class="form-control" type="text" name="email" placeholder="{{ __('Email') }}"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
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
                                    name="password" placeholder="{{ __('New password') }}">
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
                                <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                    type="password" name="password_confirmation"
                                    placeholder="{{ __('New password confirmation') }}">
                            </div>
                        </div>

                        <div class="card-footer">
                            @if (auth()->user()->hasRole('buyer'))
                                <a href="/" class="btn btn-sm btn-secondary">Cancel</a>
                            @elseif(auth()->user()->hasRole('seller'))
                                <a href="/seller-home" class="btn btn-sm btn-secondary">Cancel</a>
                            @endif
                            <button class="btn btn-sm btn-primary" type="submit">{{ __('Submit') }}</button>
                        </div>

                    </form>
                </div>
                <div class="col-4">
                    <img src="{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('icons/default-profile-photo.jpg') }}"
                        alt="Profile Picture" height="500" width="500">
                </div>
            </div>
        </div>
    </div>
@endsection
