@extends('template.admin')
@section('title', 'Kategori')
@section('content-icon', 'ion-ios-people')
@section('content-title', 'Kategori')
@section('content')
<form action="{{ route('category.add') }}" method="POST" class="bg-white p-4 rounded-2 border">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="form-floating">
                <input type="text" id="name" name="name" class="form-control" placeholder="">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="name" class="d-md-block text-left">Nama Kategori</label>
            </div>
        </div>
    </div>
    <div class="cta mt-4">
        <button type="submit" class="btn btn-primary"><i class="ion ion-ios-save"></i> Simpan</button>
        <a href="{{ route('category') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
