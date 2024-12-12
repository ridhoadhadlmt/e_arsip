@extends('template.operator')
@section('title', 'Disposisi Surat Keluar')
<!-- @section('content-icon', 'ion-ios-paper-plane')
@section('content-title', 'Disposisi Surat Masuk') -->
@section('content')

<form action="{{ route('operator.outgoingMail.adddisposition', $outgoingMail->id ) }}" method="POST" class="p-4 bg-white rounded-2 border">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <div class="form-floating mb-3">
                <select name="send_via" class="form-select" id="send_via">
                    <option value="Email">Email</option>
                    <option value="Faksimile">Faksimile</option>
                    <option value="Kurir">Kurir</option>
                    <option value="Handcary">Handcary</option>
                    <option value="Lain-Lain">Lain-Lain</option>
                </select>
                <label for="from" class="d-md-block text-left">Dikirim Melalui</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <div class="form-floating">
                <textarea name="content" placeholder="Email/No.Fax/No.Resi" class="form-control" id="" cols="30" rows="10"></textarea>
                <label for="disposition" class="d-md-block text-left">Keterangan</label>
            </div>
        </div>

    </div>
    <div class="cta mt-4">
    <button type="submit" class="btn btn-primary"><i class="ion ion-ios-paper-plane"></i> Disposisi</button>
        <a href="{{ route('operator.outgoingMail') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
