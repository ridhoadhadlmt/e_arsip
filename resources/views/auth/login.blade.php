<!doctype html>
  <html lang="en">

  <head>
  	<title>Sistem Informasi Pengarsipan Surat - @yield('title')</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">


  </head>
  <body>
    <div class="auth-wrapper">
        <div class="auth-inner">
            <div class="row">
                <div class="col-md-4 d-block d-lg-block pe-lg-0 ">
                    <div class="auth-form vh-100 bg-white d-flex align-items-center justify-content-center">
                        <div class="auth-content w-100 p-4">
                            <div class="auth-header mb-4">
                                <h3>Selamat Datang </br> di E-ARSIP</h2>
                                <h6 class="text-light-emphasis">Silahkan masuk dengan akunmu</h6>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="  email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-5">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="password">Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-3">Masuk</button>
                                <p class="my-3">Belum Punya Akun ? <a href="{{ route('register') }}" class="text-decoration-none"> Daftar Terlebih Dahulu</a></p>
                                <!-- <div>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 d-none d-lg-block ps-lg-0">
                    <div class="auth-hero position-relative">
                        <div class="auth-content z-1 position-absolute top-50 start-50 translate-middle">
                            <div class="auth-header text-center mb-5">
                                <div class="auth-logo p-4">
                                    <!-- <img src="{{ asset('assets/img/logo.png') }}" alt=""> -->
                                </div>
                                <h2 class="mb-3">E-ARSIP</h2>
                                <p class="mb-3 text-white">lorem ipsum dolor sit amet
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
