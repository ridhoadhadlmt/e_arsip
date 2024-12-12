@extends('template.operator')
@section('title', 'Surat Masuk')
<!-- @section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Masuk') -->

@section('content-cta')
<a href="{{ route('incomingMail.create') }}" class="btn btn-primary"><i class="ion ion-ios-add"></i> Tambah Surat Masuk</a>
<!-- <button class="btn btn-primary" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="ion ion-ios-add"></i> Tambah Surat Masuk</button> -->
@endsection

@section('content')
<div class="table-responsive bg-white p-4 rounded-2 border">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal dan Jam</th>
                <th>Nomor Surat</th>
                <th>Sifat</th>
                <th>Pengirim</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach($incomingMails as $incomingMail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $incomingMail->date }} - 12:00</td>
                <td>{{ $incomingMail->no_mail }}</td>
                <td>{{ $incomingMail->characteristic }}</td>
                <td>{{ $incomingMail->sender }}</td>
                <td>{{ $incomingMail->status }}</td>

                <td class="text-center">
                    <a href="{{ route('operator.incomingMail.detail', $incomingMail->mail_id ) }}" class="btn btn-sm btn-success"><i class="ion ion-ios-folder"></i></a>
                    <a href="{{ route('operator.incomingMail.disposition', $incomingMail->mail_id ) }}" class="btn btn-sm btn-primary"><i class="ion ion-ios-paper-plane"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

