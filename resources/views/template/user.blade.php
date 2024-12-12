<!doctype html>
  <html lang="en">

  <head>
  	<title>E-ARSIP - @yield('title')</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">


  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ion ion-ios-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">E-ARSIP</a>
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>-->
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
                                    <span class="font-weight-light">{{ Auth::user()->username }}</span>
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
    </nav>
    <div class="container py-5 overflow-hidden d-block">
        @include('sweetalert::alert')
        <!-- <form id="msform" action="" class="">

            <ul id="progressbar">
                <li class="active">Informasi Surat</li>
                <li>Informasi Pribadi</li>
                <li>Staff Pemerintah</li>
            </ul>
            <fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="">NIK</label>
                                <input type="number" class="form-control">

                            </div>
                            <div class="col-md-6">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="">Jenis Kelamin</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Laki</option>
                                    <option value="">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Agama</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Islam</option>
                                    <option value="">Kristen Khatolik</option>
                                    <option value="">Kristen Protestan</option>
                                    <option value="">Budha</option>
                                    <option value="">Hindu</option>
                                    <option value="">Konghucu</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="">Tempat Lahir</label>

                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="">Status Perkawinan</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Belum Menikah</option>
                                    <option value="">Sudah Menikah</option>
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label for="">Kewarganegaraan</label>
                                <select name="" id="" class="form-control">
                                    <option value="">WNI</option>
                                    <option value="">WNA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="next action-button">Selanjutnya</button>
            </fieldset>
            <fieldset>

                <button type="button" class="action-button previous previous_button">Back</button>
                <button type="button" class="next action-button">Continue</button>
            </fieldset>
            <fieldset>

                <button type="button" class="action-button previous previous_button">Back</button>
                <a href="#" class="action-button">Finish</a>
            </fieldset>
        </form> -->
        <!-- @if($submissionMails > 0)
        <div class="text-center">
            <h3 class="text-center">Anda Sudah Mengajukan Surat</h3>
            <img src="{{ asset('assets/img/submission-success.svg') }}" alt="">
        </div>
        @else
        <form action="{{ route('user.submission') }}" method="POST" class="bg-white p-4 rounded-2 border" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="category_id" id="for" class="form-select" required>
                                    @if($categories->count() > 0)
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="">Belum ada data</option>
                                    @endif

                                </select>
                                <label for="for">Untuk</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="as_for" id="for" class="form-control" placeholder="">
                                <label for="for">Keperluan</label>
                            </div>
                        </div>
                    </div>

                </div>
                <h5>Biodata</h5>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" id="nik" name="nik" class="form-control" placeholder="">
                                <label for="nik">NIK</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="">
                                <label for="fullname">Nama Lengkap</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" id="phone" name="phone" class="form-control" placeholder="">
                                <label for="phone">Nomor Telepon</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" id="email" name="email" class="form-control" placeholder="">
                                <label for="email">Email</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="gender" id="gender" class="form-select">
                                    <option value="male">Laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                                <label for="gender">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="religion" id="religion" class="form-select">
                                    <option value="islam">Islam</option>
                                    <option value="kristen_k">Kristen Khatolik</option>
                                    <option value="kristen_p">Kristen Protestan</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                                <label for="religion">Agama</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="place" name="place_birth" class="form-control" placeholder="">
                                <label for="place">Tempat Lahir</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" id="date" name="date_birth" class="form-control" placeholder="">
                                <label for="date">Tanggal Lahir</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="marriage_status" id="marriage" class="form-select">
                                    <option value="belum">Belum Menikah</option>
                                    <option value="sudah">Sudah Menikah</option>
                                </select>
                                <label for="marriage">Status Perkawinan</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="nationality" id="country" class="form-select">
                                    <option value="wni">WNI</option>
                                    <option value="wna">WNA</option>
                                </select>
                                <label for="country">Kewarganegaraan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                        <input type="file" name="file_name" accept=".pdf, .jpg, .jpeg, .png" id="name" class="form-control-file" placeholder="">
                    </div>
                    <small>* Upload KTP atau KK, Max 1MB</small>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-100 py-3"><i class="ion ion-ios-paper-plane"></i> Kirim</button>
                </div>
            </div>
        </form>
        @endif -->
        <form action="{{ route('user.submission') }}" method="POST" class="bg-white p-4 rounded-2 border" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="category_id" id="for" class="form-select" required>
                                    @if($categories->count() > 0)
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="">Belum ada data</option>
                                    @endif

                                </select>
                                <label for="for">Untuk</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="as_for" id="for" class="form-control" placeholder="">
                                <label for="for">Keperluan</label>
                            </div>
                        </div>
                    </div>

                </div>
                <h5>Biodata</h5>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" id="nik" name="nik" class="form-control" placeholder="">
                                <label for="nik">NIK</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="">
                                <label for="fullname">Nama Lengkap</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" id="phone" name="phone" class="form-control" placeholder="">
                                <label for="phone">Nomor Telepon</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" id="email" name="email" class="form-control" placeholder="">
                                <label for="email">Email</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="gender" id="gender" class="form-select">
                                    <option value="male">Laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                                <label for="gender">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="religion" id="religion" class="form-select">
                                    <option value="islam">Islam</option>
                                    <option value="kristen_k">Kristen Khatolik</option>
                                    <option value="kristen_p">Kristen Protestan</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                                <label for="religion">Agama</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="place" name="place_birth" class="form-control" placeholder="">
                                <label for="place">Tempat Lahir</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" id="date" name="date_birth" class="form-control" placeholder="">
                                <label for="date">Tanggal Lahir</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="marriage_status" id="marriage" class="form-select">
                                    <option value="belum">Belum Menikah</option>
                                    <option value="sudah">Sudah Menikah</option>
                                </select>
                                <label for="marriage">Status Perkawinan</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="nationality" id="country" class="form-select">
                                    <option value="wni">WNI</option>
                                    <option value="wna">WNA</option>
                                </select>
                                <label for="country">Kewarganegaraan</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-floating">
                        <input type="file" name="file_name" accept=".pdf, .jpg, .jpeg, .png" id="name" class="form-control-file" placeholder="">
                    </div>
                    <small>* Upload KTP atau KK, Max 1MB</small>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-100 py-3"><i class="ion ion-ios-paper-plane"></i> Kirim</button>
                </div>
            </div>
        </form>


    </div>

  	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  	<script src="{{ asset('assets/js/user.js') }}"></script>
  </body>

</html>
