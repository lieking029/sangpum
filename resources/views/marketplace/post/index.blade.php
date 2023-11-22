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
    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col-2">
                <i class="fas fa-store fa-2x"></i>
                <a class="btn mx-2" style="background:#4E6A80; color:white; font-weight:500" href="/post">Marketplace</a>
            </div>
            <div class="col-8">

            </div>
            <div class="col-2 text-end">
                <a class="btn" style="background:#4E6A80" href="/"><i class="fas fa-home" style="color: white"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-9 border-end">
                    <div class="card-header">
                        <h1>Home</h1>
                    </div>
                    @foreach ($posts as $post)
                        <div class="row mt-4">
                            <div class="col-3 d-flex justify-content-end">
                                <img src="" alt="" class="rounded-5" width="50" height="50">
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-start">
                                <div class="">
                                    <label for=""><strong>{{ $post->user->first_name }}</strong></label>
                                    <label for="">@ {{ $post->user->nickname }}</label>
                                    <label for="">24mins ago</label>
                                </div>
                                <div class="">
                                    <label for=""><strong>{{ $post->title }}</strong></label>
                                </div>
                                <div class="">
                                    <p>
                                       {{ $post->description }}
                                    </p>
                                </div>
                            </div>
                            <div class="col d-flex flex-column">
                                <img src="" alt="" class="rounded-3" width="200" height="100">
                                <div class="d-flex">
                                    <a href="{{ route('comment', $post->id) }}"> <i class="fas fa-comment fa-2x me-3 mt-3"
                                            style="color: rgba(0, 0, 0, 0.5);"></i></a>
                                    <a href=""> <i class="fas fa-paper-plane fa-2x  mx-4 mt-3"
                                            style="color: rgba(0, 0, 0, 0.5);"></i></a>
                                    <a href=""> <i class="fas fa-heart fa-2x mt-3 mx-4"
                                            style="color: rgba(0, 0, 0, 0.5);"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-3 d-flex flex-column align-items-start">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="Search">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <a href="/post/create" class="my-link"><i class="fas fa-plus fa-2x"></i><span> ADD POST</span></a>
                    <a href="" class="my-link"><i class="fas fa-paper-plane fa-2x"></i><span> MY POST</span></a>
                    <a href="/chatify" class="my-link"><i class="fas fa-envelope fa-2x"></i><span> INBOX</span></a>
                    <!-- Changed text to match icon -->
                    <a href="" class="my-link"><i class="fas fa-heart fa-2x"></i><span> FAVORITES</span></a>
                    <!-- Changed text to match icon -->
                </div>
            </div>
        </div>
    </div>
@endsection
