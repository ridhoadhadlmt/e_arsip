@extends('template.admin')
@section('title', 'Unit Kerja')
@section('content-icon', 'ion-ios-people')
@section('content-title', 'Unit Kerja')
@section('content')
<form action="{{ route('workUnit.update', $workUnit->id) }}" method="POST" class="bg-white p-4 rounded-2 border">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="form-floating">
                <input type="text" id="name" name="name" value="{{ $workUnit->name }}" class="form-control" placeholder="">
                <label for="name" class="d-md-block text-left">Unit Kerja</label>
            </div>
        </div>
    </div>
    <div class="cta mt-4">
        <button type="submit" class="btn btn-primary"><i class="ion ion-ios-save"></i> Simpan</button>
        <a href="{{ route('workUnit') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
