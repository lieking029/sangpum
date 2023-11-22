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
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <div class="container-fluid card">
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
            <div class="row">
                <div class="col-9 border-end">
                    <div class="card-header">
                        <h1>Home</h1>
                    </div>
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
                                <a href=""> <i class="fas fa-comment fa-2x me-3 mt-3"
                                        style="color: rgba(0, 0, 0, 0.5);"></i></a>
                                <a href=""> <i class="fas fa-paper-plane fa-2x  mx-4 mt-3"
                                        style="color: rgba(0, 0, 0, 0.5);"></i></a>
                                <a href=""> <i class="fas fa-heart fa-2x mt-3 mx-4"
                                        style="color: rgba(0, 0, 0, 0.5);"></i></a>
                            </div>
                        </div>
                    </div>
                    @foreach ($post->comments as $comment)
                        <hr>
                        <div class="row mt-4">
                            {{-- Check if the comment has an associated user --}}
                            @if ($comment->user)
                                <div class="col-3 d-flex justify-content-end">
                                    {{-- Display the user's profile picture --}}
                                    <img src="{{ $comment->user->profile_picture_url }}" alt="" class="rounded-5"
                                        width="50" height="50">
                                </div>
                                <div class="col-3 d-flex flex-column justify-content-start">
                                    <div class="">
                                        <label for=""><strong>{{ $comment->user->first_name }}</strong></label>
                                        <label for="">@ {{ $comment->user->nickname }}</label>
                                        <label for="">{{ $comment->created_at->diffForHumans() }}</label>
                                    </div>
                                    <div class="">
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                                {{-- Other columns and details --}}
                            @else
                                <div class="col-3 d-flex justify-content-end">
                                    <img src="{{ url('/default-avatar.png') }}" alt="" class="rounded-5"
                                        width="50" height="50">
                                </div>
                                <div class="col-3 d-flex flex-column justify-content-start">
                                    <div class="">
                                        <label for=""><strong>User Deleted</strong></label>
                                    </div>
                                    <div class="">
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                                {{-- Other columns and details --}}
                            @endif
                        </div>
                    @endforeach

                    <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-4">
                            <input type="hidden" value="{{ $userId }}" name="user_id">
                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                            <div class="col-3 d-flex justify-content-end">
                                <img src="" alt="" class="rounded-5" width="50" height="50">
                            </div>
                            <div class="col-3 d-flex flex-column justify-content-start">
                                <div class="">
                                    <label for="">{{ $userName }}<strong></strong></label>
                                    <label for="">@ {{ $userNickname }}</label>
                                </div>
                                <div class="input-group mt-3">
                                    <textarea type="text" class="form-control" placeholder="{{ __('Comment') }}" name="comment"></textarea>
                                </div>
                                <label for="" class="mt-3">Image</label>
                                <div class="input-group">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="input-group mt-5 d-flex justify-content-end">
                                    <button class="btn mx-2 rounded-5"
                                        style="background:#4E6A80; width:100px;">Cancel</button>
                                    <button class="btn btn-primary rounded-5" style="width:100px;"
                                        type="submit">Comment</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
