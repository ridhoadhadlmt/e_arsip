
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
                <div class="col-md-4 d-block d-lg-block pe-lg-0">
                    <div class="auth-form vh-100 bg-white d-flex align-items-center justify-content-center">
                        <div class="auth-form w-100 p-4">
                            <div class="auth-header mb-4">
                                <h3>Selamat datang </br> di E-Arsip</h2>
                                <h6 class="text-light-emphasis">Silahkan daftar akunmu</h6>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="name">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="name">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="mail" type="mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-floating mb-5">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="password">Konfirmasi Password</label>
                                </div>
                                <input type="hidden" name="workunit_id" value="0">
                                <input type="hidden" name="role" value="0">
                                <button type="submit" class="btn btn-primary w-100 py-3">Daftar</button>
                                <p class="my-3">Sudah Punya Akun ? <a href="{{ route('login') }}" class="text-decoration-none"> Silahkan Login</a></p>

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
                <div class="col-md-8 d-none d-lg-block  ps-lg-0">
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

