@php
    $users = App\Models\User::find(auth()->user()->role == 1);
@endphp

<!doctype html>
  <html lang="en">

  <head>
  	<title>E-ARSIP - @yield('title')</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">


  </head>
  <body>
  <div class="wrapper">
  	<div class="sidebar-wrapper">

      <div class="sidebar-menu">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a href="{{ route('admin') }}" class="nav-link {{ request()->routeIs('admin') ? 'active':'' }}"><i class="ion ion-ios-pie"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('institution') }}" class="nav-link {{ request()->routeIs('institution') ? 'active':'' }}"><i class="ion ion-ios-business"></i> Instansi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workUnit') }}" class="nav-link {{ request()->routeIs('workUnit') || request()->routeIs('workUnit*') ? 'active':'' }}"><i class="ion ion-ios-people"></i> Unit Kerja</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('incomingMail') }}" class="nav-link {{ request()->routeIs('incomingMail') || request()->routeIs('incomingMail*') ? 'active':'' }}"><i class="ion ion-ios-mail"></i> Surat Masuk</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('outgoingMail') }}" class="nav-link {{ request()->routeIs('outgoingMail') || request()->routeIs('outgoingMail*') ? 'active':'' }}"><i class="ion ion-ios-mail-open"></i> Surat Keluar</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('submissionMail') }}" class="nav-link {{ request()->routeIs('submissionMail') || request()->routeIs('submissionMail*') ? 'active':'' }}"><i class="ion ion-ios-mail-unread"></i> Surat Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('disposition') }}" class="nav-link {{ request()->routeIs('disposition') || request()->routeIs('disposition*') ? 'active':'' }}"><i class="ion ion-ios-paper-plane"></i> Disposisi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category') }}" class="nav-link {{ request()->routeIs('category') || request()->routeIs('category*') ? 'active':'' }}"><i class="ion ion-ios-list"></i> Kategori</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('user') }}" class="nav-link {{ request()->routeIs('user') || request()->routeIs('user*') ? 'active':'' }} "><i class="ion ion-ios-person"></i> Pengguna</a>
                </li>
                <li class="nav-item" data-bs-toggle="collapse" href="#report" role="button" aria-expanded="false" aria-controls="report">
                    <a class="nav-link"><i class="ion ion-ios-print"></i> Laporan<span class="float-end"><i class="ion ion-ios-arrow-down"></i></span></a>
                </li>
                <div class="collapse {{ request()->routeIs('report.incomingMail*') || request()->routeIs('report.outgoingMail*') ? 'show':'' }}" id="report">
                    <nav class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('report.incomingMail') }}" class="nav-link {{ request()->routeIs('report.incomingMail*') ? 'active':'' }}"><i class="ion ion-ios-radio-button-on"></i> Surat Masuk</a>
                            <a href="{{ route('report.outgoingMail') }}" class="nav-link {{ request()->routeIs('report.outgoingMail*') ? 'active':'' }}"><i class="ion ion-ios-radio-button-on"></i> Surat Keluar</a>
                        </li>

                    </nav>
                </div>
                <!-- <li class="nav-item">
                  <a href="index.html" class="nav-link"><i class="ion ion-ios-cloud-download"></i> Data Cadangan</a>
                </li> -->
            </ul>
      </div>
    </div>
    <div class="main-wrapper">
      <div class="main-header">
        <div class="header-logo">
          <a href="" class="navbar-brand">
            <!-- <img src="{{ asset('assets/img/logo.png') }}" class="w-25" alt=""> -->
            E-ARSIP
          </a>
        </div>
        <nav class="navbar navbar-expand-md">
          <button class="btn btn-toggle" id="menu-toggle"><i class="ion ion-ios-menu"></i></button>

          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="" data-bs-toggle="dropdown" class="nav-link position-relative">
                <i class="ion ion-ios-notifications"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill w-50 h-50 bg-danger">
                    <span class="position-absolute top-50 start-50 translate-middle">{{ $users !== null ? $users->notifications->count() : 0}}</span>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-end notifications border">
                <div class="dropdown-header d-flex justify-content-between align-items-center">
                    Notifikasi
                    <i class="ion ion-ios-notifications"></i>
                </div>
                <div class="dropdown-divider"></div>


                <div class="row px-2 align-items-center">

                    @forelse($users->notifications as $notification)
                    <div class="col-md-2">
                        <img src="{{ asset('assets/img/1.png') }}" class="rounded-circle img-fluid" alt="">
                    </div>
                    <div class="col-md-10">
                        <p class="mb-1 notification-title">Anda memiliki surat masuk dari {{ $notification->data['fullname']}} ({{ $notification->data['email']}})</p>
                        <span class="mb-1 notification-subtitle">Perihal: {{ $notification->data['as_for']}}</span>
                    </div>
                    @empty
                    <span class="px-3">Belum Ada Surat Masuk</span>
                    @endforelse
                </div>
                <!--
                <div class="dropdown-divider"></div>
                <div class="row px-2 align-items-center">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/img/1.png') }}" class="rounded-circle img-fluid" alt="">
                    </div>
                    <div class="col-md-10">
                        <p class="mb-1 notification-title">Anda telah ditugaskan untuk menangani surat dengan nomor DPU/2020/IV/762-1</p>
                        <p class="mb-1 notification-subtitle">Deadline : 10/09/2023, Kategori: Surat Undangan Rapat</p>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row px-2 align-items-center">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/img/1.png') }}" class="rounded-circle img-fluid" alt="">
                    </div>
                    <div class="col-md-10">
                        <p class="mb-1 notification-title">Ingatkan untuk menyelesaikan surat DPU/2020/IV/762-1 sebelum 10/09/2023</p>
                        <p class="mb-1 notification-subtitle">Judul Surat : Surat Undangan Rapat Kecamatan, Tanggal Batas waktu: 10/09/2023</p>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row px-2 align-items-center">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/img/1.png') }}" class="rounded-circle img-fluid" alt="">
                    </div>
                    <div class="col-md-10">
                        <p class="mb-1 notification-title">Surat dengan nomor DPU/2020/IV/762-1 telah berhasil dikirimkan kepada Siti</p>
                        <p class="mb-1 notification-subtitle">Tanggal Pengiriman: 10/09/2023, Status: Terkirim</p>
                    </div>
                </div> -->
                <div class="cta px-2 pt-4">
                    <button class="btn btn-primary w-100">Lihat Semua Notifikasi</button>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href="" class="nav-link d-md-flex d-flex justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/img/1.png') }}" class="rounded-circle img-fluid"  alt="">
              </a>
              <div class="dropdown-menu dropdown-menu-end panels border">
                <div class="d-flex align-items-center ps-2">
                    <div class="w-25">
                        <img src="{{ asset('assets/img/1.png') }}" class="rounded-circle img-fluid" alt="">
                    </div>
                    <div class="w-75 ps-2">
                        <h6>{{ Auth::user()->name }}</h6>
                        <h6>Administrator</h6>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="{{ route('setting') }}" class="dropdown-item ps-2"><i class="ion ion-ios-cog"></i> Pengaturan</a>
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
        </nav>
      </div>
      <div class="main-content">
      @include('sweetalert::alert')
          <div class="content-header d-flex justify-content-between">
              <h4 class="content-title">
                  <i class="ion
                  @if(View::hasSection('content-title'))
                  @yield('content-icon')
                  @else ion-ios-pie
                  @endif">
                </i>
                @if(View::hasSection('content-title'))

                @yield('content-title')

                @else
                Dashboard
                @endif
            </h4>
            <div class="content-cta">
                @yield('content-cta')
            </div>
        </div>
        <div class="content">

            @if(View::hasSection('content'))
            {{ Breadcrumbs::render() }}
            @yield('content')

        @else
            <div class="row">
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card incomings">
                  <div class="card-body">
                    <h5>Surat Masuk <i class="ion ion-ios-mail float-end"></i></h5>
                    <h3>{{ $incomingMails }}</h3>
                    <h6>Total Surat Masuk</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card outgoings">
                  <div class="card-body">
                    <h5>Surat Keluar <i class="ion ion-ios-mail-open float-end"></i></h5>
                    <h3>{{ $outgoingMails }}</h3>
                    <h6>Total Surat Keluar</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card units">
                  <div class="card-body">
                    <h5>Unit Kerja <i class="ion ion-ios-people float-end"></i></h5>
                    <h3>{{ $workUnits }}</h3>
                    <h6>Total Unit Kerja</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card dispositions">
                  <div class="card-body">
                    <h5>Disposisi <i class="ion ion-ios-paper-plane float-end"></i></h5>
                    <h3>{{ $dispositions }}</h3>
                    <h6>Total Disposisi</h6>
                  </div>
                </div>
              </div>
            </div>
        @endif

        </div>

      </div>
    </div>
  </div>
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
  	<script src="{{ asset('assets/js/dataTables.bootstrap5.js') }}"></script>
  	<script src="{{ asset('assets/js/select2.min.js') }}"></script>
  	<script src="{{ asset('assets/js/admin.js') }}"></script>
  </body>

  </html>
