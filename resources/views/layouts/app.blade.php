<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="theme-color" content="#ffffff">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/5e81b262d9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="wrapper d-flex flex-column min-vh-100" style="background: white">
        <header class="header header-sticky" style="background: linear-gradient(to right, #5DE0E6, #4c5571); ">
            <div class="container-fluid">
                <ul class="header-nav d-none d-md-flex">
                    @if (auth()->user()->hasRole('buyer'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('order.show', auth()->user()->id) }}"><i
                                    class="fas fa-shopping-cart text-white"></i></i></a>
                        </li>
                    @endif
                </ul>
                <ul class="header-nav d-none d-md-flex">
                    <img src="{{ asset('icons/logoSangpum.png') }}" alt="" width="150">
                </ul>
                <ul class="header-nav ms-3">
                    <strong class="text-white" style="margin-right: 50px; font-size: 20px">Wallet:
                        {{ number_format(auth()->user()->wallet, 2) }}</strong>
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user" style="color: white"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                <svg class="icon me-2">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                                </svg>
                                {{ __('My profile') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <svg class="icon me-2">
                                        <use xlink:href="{{ asset('icons/coreui.svg#cil-account-logout') }}"></use>
                                    </svg>
                                    {{ __('Logout') }}
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <div class="body flex-grow-1">
            <div class="">
                @yield('content')
            </div>
        </div>
        <div class="" style="height:2vh; background-color:#5DE0E6">

        </div>
        <footer class="container-fluid" style="background-color: #4e6a80 ">
            <div class="row">
                <div class="col">
                    <div class="m-3 mx-5">
                        <img src="{{ asset('icons/logoSangpum.png') }}" alt="">
                    </div>
                    <p class="text-white">© 2023 Sangpum. All Rights Reserved.</p>
                </div>
                <div class="col">
                    <h5 class="text-white mt-5">FOLLOW US</h5>
                    <div class="d-flex justify-content-around">
                        <div class="d-flex">
                            <a href="https://www.facebook.com/profile.php?id=61553653243716&mibextid=O4c6Bo"><i
                                    class="fab fa-facebook fa-2x me-2 text-white"></i></a>
                                    <h5 class="mt-1 text-white">Facebook</h5>
                        </div>
                        <div class="d-flex">
                            <a href="https://www.instagram.com/sangpum.shop"><i
                                class="fab fa-instagram fa-2x text-white me-2"></i></a>
                                    <h5 class="mt-1 text-white">Instagram</h5>
                        </div>
                        <div class="d-flex">
                            <a href="https://x.com/sangpumshop?s=21"><i class="fab fa-twitter fa-2x text-white"></i></a>
                                    <h5 class="mt-1 text-white mx-1">Twitter</h5>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    </div>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
</body>

</html>
