<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    @vite('resources/sass/app.scss')
    <title>Sangpum</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-image: linear-gradient(to right, rgba(83, 148, 157, 0.5), rgba(255, 255, 255, 0) 70%), url('{{ asset('icons/home page.png') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }

    .button-59 {
        align-items: center;
        background-color: rgba(76, 85, 113, 0.5);
        border: 1px solid #ECEFF1;
        box-sizing: border-box;
        color: white;
        cursor: pointer;
        display: inline-flex;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        font-weight: 500;
        height: 48px;
        justify-content: center;
        letter-spacing: 1px;
        line-height: 24px;
        min-width: 140px;
        outline: 0;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        transition: all .2s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-59:focus {
        color: #171e29;
    }

    .button-59:hover {
        border-color: #06f;
        color: #06f;
        fill: #06f;
    }

    .button-59:active {
        border-color: #06f;
        color: #06f;
        fill: #06f;
    }

    @media (min-width: 768px) {
        .button-59 {
            min-width: 170px;
        }
    }

    .button-58 {
        align-items: center;
        background-color: #55AAAD;
        border: 2px;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inline-flex;
        fill: #000;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        font-weight: 500;
        height: 48px;
        justify-content: center;
        letter-spacing: 1px;
        line-height: 24px;
        min-width: 140px;
        outline: 0;
        padding: 0 17px;
        text-align: center;
        text-decoration: none;
        transition: all .3s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-58:focus {
        color: #171e29;
    }

    .button-58:hover {
        background-color: #3385ff;
        border-color: #3385ff;
        fill: #06f;
    }

    .button-58:active {
        background-color: #3385ff;
        border-color: #3385ff;
        fill: #06f;
    }

    @media (min-width: 768px) {
        .button-58 {
            min-width: 170px;
        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-body-transparent">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-evenly" id="navbarNav">
                <a class="nav-link" href="/home" style="color: white; font-family: 'Montserrat', sans-serif;">Home</a>
                <div class="d-flex align-items-center">
                    <label for="" class="text-white me-2">Follow us on</label>
                    <a href="https://www.facebook.com/profile.php?id=61553653243716&mibextid=O4c6Bo"><i
                            class="fab fa-facebook fa-2x me-2"></i></a>
                    <a href="https://www.instagram.com/sangpum.shop"><i
                            class="fab fa-instagram fa-2x text-white me-2"></i></a>
                    <a href="https://x.com/sangpumshop?s=21"><i class="fab fa-twitter fa-2x"></i></a>
                </div>
            </div>
            <a class="navbar-brand" href="/home">
                <img src="{{ asset('icons/logoSangpum.png') }}" alt="logo" class="d-block mx-auto">
            </a>

            <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavAltMarkup">
                @if (Route::has('login'))
                    <div class="button-group navbar-nav d-flex">
                        @auth
                            @if (auth()->user()->hasRole('buyer'))
                                <a href="{{ url('/') }}" class="btn btn-sm btn-primary">Home</a>
                            @elseif(auth()->user()->hasRole('seller'))
                                <a href="{{ url('/seller-home') }}" class="btn btn-sm btn-primary">Home</a>
                            @endif
                        @else
                            <a href="{{ route('auth.login') }}" class="btn rounded-5 mx-2"
                                style="width: 80px; background:#55AAAD; color:white">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('auth.register') }}" class="btn rounded-5"
                                    style="width: 80px; background:white;">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="container d-flex">
        <div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 300px;">
            <div class="mt-5 p-2 bd-highlight">
                <h1 class="fw-bold" style="font-size: 60px; color: white; font-family: 'Inter', sans-serif;">
                    Your One-Stop <br> Marketplace. Let Your <br>Fandom Flourish!
                </h1>
            </div>
            <div class="p-2 bd-highlight">
                <h5 style="font-size:20px; font-family: 'Montserrat', sans-serif; color:white;">Immerse yourself in a
                    community
                    fueled by the <br> love for K-Pop, where
                    every product has a story <br> and
                    every transaction carries the excitement of <br>sharing fandom joy.</h5>
            </div>
            <div class="p-2 bd-highlight">
                <a class="button-58" role="button" href="{{ route('login.buyer') }}">SHOP NOW</a>
                <a class="button-59" role="button" href="{{ route('login.seller') }}">SELL NOW</a>
            </div>
        </div>
    </div>
</body>

</html>
