@extends('template.admin')
@section('title', 'Disposisi')
@section('content-icon', 'ion-ios-people')
@section('content-title', 'Disposisi')
@section('content')

<form action="{{ route('disposition.add') }}" method="POST" class="bg-white p-4 rounded-2 border">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" id="content" name="content" class="form-control" placeholder="">
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="content" class="d-md-block text-left">Isi Disposisi</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <div class="form-floating">
                <select name="status" id="status" class="form-select">
                    <option value="open">Open</option>
                    <option value="close">Close</option>
                </select>
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="status" class="d-md-block text-left">Status</label>
            </div>
        </div>
    </div>
    <div class="cta mt-4">
        <button type="submit" class="btn btn-primary"><i class="ion ion-ios-save"></i> Simpan</button>
        <a href="{{ route('disposition') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection