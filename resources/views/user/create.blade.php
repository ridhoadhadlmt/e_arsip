@extends('template.admin')

@section('title', 'Pengguna')
@section('content-icon', 'ion-ios-person')
@section('content-title', 'Pengguna')
@section('content')

<form action="{{ route('user.add') }}" method="POST" class="bg-white p-4 rounded-2 border">
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
                <input type="text" id="name" name="name" class="form-control" placeholder="">
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
                <input type="text" id="username" name="username" class="form-control" placeholder="">
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
                <input type="email" id="email" name="email" class="form-control" placeholder="">
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
        <div class="col-md-12 col-sm-6">
            <!-- <div class="form-group row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Unit Kerja</label>
                </div>
                <div class="col-md-10">
                    <select name="unit_kerja" id="unit_kerja_id" class="form-control">
                        <option value="">Bendahara</option>
                        <option value="">Sekretaris</option>
                    </select>
                </div>
            </div> -->
            <div class="form-floating">
                <select name="workunit_id" id="workunit_id" class="form-select">
                    @if($workunits->count() > 0)
                    @foreach($workunits as $workunit)
                    <option value="{{ $workunit->id }}">{{ $workunit->name}}</option>
                    @endforeach
                    @else
                    <option value="">Belum ada data</option>
                    @endif
                </select>
                <label for="unit_kerja_id" class="d-md-block text-left">Unit Kerja</label>
            </div>
        </div>
        <!-- <div class="col-md-10 offset-md-2">
            <button class="btn btn-primary"><i class="ion ion-ios-save"></i> Simpan</button>
            <a href="{{ route('outgoingMail') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
        </div> -->
    </div>
    <div class="cta mt-4">
        <button type="submit" class="btn btn-primary"><i class="ion ion-ios-save"></i> Simpan</button>
        <a href="{{ route('user') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
