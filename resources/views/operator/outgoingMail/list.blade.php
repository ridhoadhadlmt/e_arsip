@extends('template.operator')
@section('title', 'Surat Keluar ')
<!-- @section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Keluar ') -->

@section('content-cta')
<a href="{{ route('outgoingMail.create') }}" class="btn btn-primary"><i class="ion ion-ios-add"></i> Tambah Surat Keluar</a>
<!-- <button class="btn btn-primary" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="ion ion-ios-add"></i> Tambah Surat Keluar </button> -->
@endsection

@section('content')
<div class="table-responsive bg-white p-4 rounded-2 border">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal dan Jam</th>
                <th>Nomor Surat</th>
                <th>Sifat Surat</th>
                <th>Kepada</th>
                <th>Disposisi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outgoingMails as $outgoingMail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $outgoingMail->date }} - 12:00</td>
                <td>{{ $outgoingMail->no_mail }}</td>
                <td>{{ $outgoingMail->characteristic }}</td>
                <td>{{ $outgoingMail->to }}</td>
                <td>{{ $outgoingMail->disposition == null ? '' : $outgoingMail->disposition->send_via}}</td>
                <td class="text-center">
                    <a href="{{ route('operator.outgoingMail.detail', $outgoingMail->id ) }}" class="btn btn-sm btn-success"><i class="ion ion-ios-folder"></i></a>
                    <a href="{{ route('operator.outgoingMail.disposition', $outgoingMail->id ) }}" class="btn btn-sm {{ $outgoingMail->disposition == null ? 'btn-primary' : 'btn-white disabled'}}"><i class="ion ion-ios-paper-plane"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
