<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

        <title>E-ARSIP</title>

    </head>
    <body class="antialiased">
    <div class="header-section px-4">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <a href="" class="navbar-brand">E-ARSIP</a>
            </div>
        </nav>
    </div>
    <div class="hero-section position-relative py-lg-5 py-5 px-4">
        <div class="d-lg-block hero-text z-1">
            <div class="container">
                <h1 class="hero-title pb-4">E-ARSIP</h1>
                <h3 class="hero-subtitle pb-4">Elektronik Arsip Surat Digital</h3>
                <div class="cta-section mt-lg-4">
                    <!-- <a href="{{ route('logout') }}" class="dropdown-item ps-2"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="ion ion-ios-log-out"></i> Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> -->
                    @guest
                    @if (Route::has('login'))
                    <a class="btn btn-lg btn-outline-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                    <a class="btn btn-lg btn-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else
                    @endguest
                </div>
            </div>
        </div>
        <div class="d-lg-block d-none hero-bg z-0 position-absolute bottom-0 end-0 ">
            <img src="{{ asset('assets/img/bg-home.svg')}}" class="" alt="">
        </div>
    </div>

    </body>
</html>
