@extends('template.admin')
@section('title', 'Surat Pengajuan ')
@section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Pengajuan ')


@section('content')
<div class="table-responsive bg-white p-4 rounded-2 border">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>NIK</th>
                <th>Perihal</th>
                <th>Pengirim</th>
                <!-- <th>Disposisi</th> -->
                <!-- <th>Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($submissionMails as $submissionMail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $submissionMail->created_at }}</td>
                <td>{{ $submissionMail->nik }}</td>
                <td>{{ $submissionMail->as_for }}</td>
                <td>{{ $submissionMail->fullname }}</td>
                <!-- <td></td> -->
                <td>
                <!-- <a href="{{ route('submissionMail.disposition', $submissionMail->id ) }}" class="btn btn-sm {{ $submissionMail->disposition == null ? 'btn-primary' : 'btn-white disabled'}}"><i class="ion ion-ios-paper-plane"></i></a> -->
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
