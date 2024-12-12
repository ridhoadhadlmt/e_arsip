@extends('template.admin')
@section('title', 'Kategori')
@section('content-icon', 'ion-ios-people')
@section('content-title', 'Kategori')
@section('content')

<form action="{{ route('category.update', $category->id) }}" method="POST" class="bg-white p-4 rounded-2 border">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="form-floating">
                <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control" placeholder="">
                <label for="name" class="d-md-block text-left">Nama Kategori</label>
            </div>
        </div>
    </div>
    <div class="cta mt-4">
        <button type="submit" class="btn btn-success"><i class="ion ion-ios-save"></i> Ubah</button>
        <a href="{{ route('category') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
