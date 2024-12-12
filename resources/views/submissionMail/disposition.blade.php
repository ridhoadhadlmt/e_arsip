@extends('template.admin')
@section('title', 'Disposisi Surat Pengajuan')
@section('content-icon', 'ion-ios-paper-plane')
@section('content-title', 'Disposisi Surat Pengajuan')
@section('content')

<form action="{{ route('submissionMail.adddisposition', $submissionMail->id ) }}" method="POST" class="p-4 bg-white rounded-2 border">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" id="as_for" value="{{ $submissionMail->as_for }}" disabled class="form-control" placeholder="">
                <label for="as_for" class="d-md-block text-left">Perihal</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" id="from" name="from" value="{{ $submissionMail->fullname }}" disabled class="form-control" placeholder="">
                <label for="from" class="d-md-block text-left">Pegirim</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
        <div class="form-floating mb-3">
                <select name="workunit_id" class="form-select" id="workunit_id">
                    @foreach($workunits as $workunit)
                    <option value="{{ $workunit->id }}">{{ $workunit->name }}</option>
                    @endforeach
                </select>
                <label for="workunit_id" class="d-md-block text-left">Disposisi Kepada</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <div class="form-floating">
                <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                <label for="disposition" class="d-md-block text-left">Isi Disposisi</label>
            </div>
        </div>

    </div>
    <div class="cta mt-4">
    <button type="submit" class="btn btn-primary"><i class="ion ion-ios-paper-plane"></i> Disposisi</button>
        <a href="{{ route('incomingMail') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
