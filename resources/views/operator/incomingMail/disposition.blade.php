@extends('template.operator')
@section('title', 'Disposisi Surat Masuk')
<!-- @section('content-icon', 'ion-ios-paper-plane')
@section('content-title', 'Disposisi Surat Masuk') -->
@section('content')

<form action="{{ route('operator.incomingMail.adddisposition', $incomingMail->disposition->id ) }}" method="POST" class="p-4 bg-white rounded-2 border">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" id="as_for" value="{{ $incomingMail->as_for }}" disabled class="form-control" placeholder="">
                <label for="as_for" class="d-md-block text-left">Perihal</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" id="from" name="from" value="Administrasi" disabled class="form-control" placeholder="">
                <label for="from" class="d-md-block text-left">Dari Bagian</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
        <div class="form-floating mb-3">
                <select name="workunit_id" class="form-select" id="workunit_id">
                    @foreach($workunits as $workunit)
                        @if($workunit->id != Auth::user()->workunit_id)
                        <option value="{{ $workunit->id }}">{{ $workunit->name }}</option>
                        @else

                        @endif
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
        <a href="{{ route('operator.incomingMail') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
