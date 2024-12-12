@extends('template.admin')

@section('title', 'Pengaturan')
@section('content-icon', 'ion-ios-cog')
@section('content-title', 'Pengaturan')
@section('content')

<form action="{{ route('user.update', $auth->id) }}" method="POST" class="bg-white p-4 rounded-2 border">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <!-- <div class="form-group row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Nama Pengguna</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control">
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <input type="text" value="{{ $auth->name }}" id="name" name="name" class="form-control" placeholder="">
                <label for="name" class="d-md-block text-left">Nama Pengguna</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- <div class="form-group row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Username</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control">
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <input type="text" value="{{ $auth->username }}" id="username" name="username" class="form-control" placeholder="">
                <label for="username" class="d-md-block text-left">Username</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- <div class="form-group row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Username</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control">
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <input type="email" value="{{ $auth->email }}" id="email" name="email" class="form-control" placeholder="">
                <label for="email" class="d-md-block text-left">Email</label>
            </div>
        </div>

        <div class="col-md-12 col-sm-6">
            <!-- <div class="form-group row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Password</label>
                </div>
                <div class="col-md-10">
                    <input type="password" class="form-control">
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="">
                <label for="password" class="d-md-block text-left">Password</label>
            </div>
        </div>
        <!-- <div class="col-md-10 offset-md-2">
            <button class="btn btn-primary"><i class="ion ion-ios-save"></i> Simpan</button>
            <a href="{{ route('outgoingMail') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
        </div> -->
    </div>
    <div class="cta mt-4">
        <button type="submit" class="btn btn-primary"><i class="ion ion-ios-save"></i> Ubah</button>
        <a href="{{ route('admin') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
