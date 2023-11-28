@extends('layouts.app')

@section('content')
    <style>
        .border-end {
            border-right: 1px solid #000000;
            /* Change the color as needed */
        }

        .my-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            /* Space between icon and text */
            color: rgba(0, 0, 0, 0.5);
            font-size: 1rem;
            /* Adjust the size as necessary */
            text-decoration: none;
            padding: 0.5rem 0;
            /* Add padding to increase the clickable area */
        }

        .my-link i {
            color: inherit;
            /* Icons take the color of the parent link */
        }

        .my-link span {
            color: #000;
            /* Text color - change as needed */
            font-weight: 600;
            /* Make the text bold */
        }

        .my-link:hover {
            color: #007bff;
            /* Change hover color as needed */
            text-decoration: underline;
            /* Optional: underline on hover */
        }

        /* Hover state for icons within the link */
        .my-link:hover i {
            color: #007bff;
        }

    </style>
    <div class="container-fluid card text-white" style="background: #2A3240; min-height: 100vh">
        <div class="card-header row">
            <div class="col-2">
                <i class="fas fa-store fa-2x"></i>
                <a class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500" href="">Marketplace</a>
            </div>
            <div class="col-8">

            </div>
            <div class="col-2 text-end">
                <span class="btn" style="background:#4E6A80"><i class="fas fa-home" style="color: white"></i></span>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-9 border-end">
                        <div class="card-header">
                            <h1><i class="fas fa-plus"></i> Add Post</h1>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3 d-flex justify-content-end">
                                <img src="{{ $userProfile ? asset('storage/' . $userProfile) : asset('icons/default-profile-photo.jpg') }}"
                                    alt="" class="rounded-5" width="50" height="50">
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-start">
                                <div class="">
                                    <label for=""><strong>{{ $userName }}</strong></label>
                                    <label for="">@ {{ $userNickname }}</label>
                                </div>
                                <div class="input-group mt-3">
                                    <input type="text" class="form-control" placeholder="{{ __('Title') }}"
                                        name="title">
                                </div>
                                <div class="input-group mt-3">
                                    <textarea type="text" class="form-control" placeholder="{{ __('Description') }}" name="description"></textarea>
                                </div>
                                <label for="" class="mt-3">Image</label>
                                <div class="input-group">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="input-group mt-5 d-flex justify-content-end">
                                    <button class="btn mx-2 rounded-5"
                                        style="background:#4E6A80; width:100px;">Cancel</button>
                                    <button class="btn btn-primary rounded-5" style="width:100px;"
                                        type="submit">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="col-3 d-flex flex-column align-items-start">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Search">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <a href="{{ route('post.create') }}" class="my-link text-white"><i class="fas fa-plus fa-2x"></i><span class="text-white"> ADD POST</span></a>
                <a href="{{ route('myPost') }}" class="my-link"><i class="fas fa-paper-plane fa-2x text-white"></i><span class="text-white"> MY POST</span></a>
                <a href="{{ url('chatify') }}" class="my-link text-white"><i class="fas fa-envelope fa-2x"></i><span class="text-white"> INBOX</span></a>
                <!-- Changed text to match icon -->
                <a href="" class="my-link text-white"><i class="fas fa-heart fa-2x"></i><span class="text-white"> FAVORITES</span></a>
                <!-- Changed text to match icon -->
            </div>
        </div>
    </div>
    </div>
@endsection
