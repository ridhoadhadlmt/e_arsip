@php
    $users = App\Models\User::find(auth()->user()->role == 2);
@endphp

<!doctype html>
  <html lang="en">

  <head>
  	<title>E-Arsip - @yield('title')</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/operator.css') }}">


  </head>
  <body>
    <div class="wrapper">
        <div class="main-wrapper">
            <div class="hero ">
                <div class="container py-5 d-flex align-items-center">
                    <a class="navbar-brand" href="#">
                        <!-- <img src="{{ asset('assets/img/logo.png') }}" class="w-25" alt=""> -->
                        E-ARSIP
                    </a>
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item dropdown d-flex text-end">
                            <a href="" class="nav-link" data-bs-toggle="dropdown">
                                <img src="{{ asset('assets/img/1.png') }}" class="rounded-circle img-fluid w-25"  alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="d-flex align-items-center ps-2">
                                    <div class="w-25">
                                        <img src="{{ asset('assets/img/1.png') }}" class="rounded-circle img-fluid" alt="">
                                    </div>
                                    <div class="w-75 ps-2">
                                        <h6>{{ Auth::user()->name }}</h6>
                                        <h6 class="font-weight-light">{{ Auth::user()->role}}</h6>
                                    </div>
                                </div>
                                <!-- <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item ps-2"><i class="ion ion-ios-cog"></i> Pengaturan</a> -->
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item ps-2"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="ion ion-ios-log-out"></i> Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="topbar-menu container">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-2 p-3 justify-content-center justify-content-md-start">
                    <ul class="d-flex gap-3 flex-row navbar-nav flex-row justify-content-center">
                        <li class="nav-item">
                            <a href="{{ route('operator') }}" class="nav-link p-2 {{ request()->routeIs('operator') ? 'active':'' }}"><i class="ion ion-ios-pie"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('operator.incomingMail') }}" class="nav-link p-2 {{ request()->routeIs('operator.incomingMail') || request()->routeIs('operator.incomingMail*') ? 'active':'' }}"><i class="ion ion-ios-mail"></i> Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('operator.outgoingMail') }}" class="nav-link p-2 {{ request()->routeIs('operator.outgoingMail') || request()->routeIs('operator.outgoingMail*') ? 'active':'' }}"><i class="ion ion-ios-mail-open"></i> Surat Keluar</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="main-content">
        @include('sweetalert::alert')
            <div class="content container my-4">
            @if(View::hasSection('content'))
            {{ Breadcrumbs::render() }}
                @yield('content')
            @else
                <div class="dashboard my-4">
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="card border-0 units">
                            <div class="card-body">
                                <h5>Semua Surat <i class="ion ion-ios-mail-unread float-end"></i></h5>
                                <h3>{{ $all }}</h3>
                                <h6>Total Semua Surat</h6>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="card border-0 incomings">
                            <div class="card-body">
                                <h5>Surat Masuk <i class="ion ion-ios-mail float-end"></i></h5>
                                <h3>{{ $incomingMails }}</h3>
                                <h6>Total Surat Masuk</h6>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="card border-0 outgoings">
                            <div class="card-body">
                                <h5>Surat Keluar <i class="ion ion-ios-mail-open float-end"></i></h5>
                                <h3>{{ $outgoingMails }}</h3>
                                <h6>Total Surat Keluar</h6>
                            </div>
                            </div>
                        </div>

                        <!-- <div class="col-md-3 mb-4 mb-md-0">
                            <div class="card border-0 dispositions">
                            <div class="card-body">
                                <h5>Semua Surat <i class="ion ion-ios-mail float-end"></i></h5>
                                <h3></h3>
                                <h6>Total Disposisi</h6>
                            </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="mail my-4">
                    <div class="row">
                        <div class="col-md-12 mb-4 mb-md-0">
                            <div class="incomingMail">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h4>Surat masuk terakhir</h4>
                                    <a href="{{ route('operator.incomingMail') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                                </div>


                                <div class="card">
                                    <div class="card-body">

                                        @forelse($users->notifications as $notification)
                                        <div class="row align-items-center">
                                            <div class="col-1">
                                                <img src="{{ asset('assets/img/1.png') }}" class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <div class="col">
                                                <p>Surat masuk dari {{ $notification->data['fullname'] }} ({{ $notification->data['email']}}) </p>
                                                <span>Tanggal Masuk : {{ $notification->data['date'] }}, Perihal:  {{ $notification->data['as_for'] }}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        @empty
                                        Belum ada surat masuk
                                        @endforelse
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            @endif
            </div>
        </div>
    </div>




    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
  	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  	<script src="{{ asset('assets/js/dataTables.bootstrap5.js') }}"></script>
  	<script src="{{ asset('assets/js/operator.js') }}"></script>
  </body>

</html>
