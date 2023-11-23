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
        <header class="header header-sticky" style="background: linear-gradient(to right, #5DE0E6, #004AAD); ">
            <div class="container-fluid">
                <ul class="header-nav d-none d-md-flex">
                    <li class="nav-item"><a class="nav-link" href="{{ route('order.show', auth()->user()->id ) }}"><i class="fas fa-shopping-cart" style="color: white"></i></a>
                    </li>
                </ul>
                <ul class="header-nav d-none d-md-flex">
                    <img src="{{ asset('icons/logoSangpum.png') }}" alt="" width="150">
                </ul>
                <ul class="header-nav ms-3">
                    <a href=""><i class="fas fa-comment me-3" style="color:white"></i></a>
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
            <div class="" >
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
</body>

</html>
