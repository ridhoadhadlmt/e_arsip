@extends('template.admin')

@section('title', 'Laporan')
@section('content-icon', 'ion-ios-print')
@section('content-title', 'Laporan')

@section('content')

<form action="{{ route('report.incomingMail.search') }}" method="POST" class="bg-white p-4 rounded-2 border mb-4">
    @csrf
    <div class="row">
        <div class="col-md-6 ">
            <div class="row align-items-center">

                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-6 row align-items-center">
                            <div class="col-md-4">
                                <label for="">Dari tanggal</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="date_start" class="form-control flex">
                            </div>

                        </div>

                        <div class="col-md-6 row align-items-center">
                            <div class="col-md-5">
                                <label for="">Sampai tanggal</label>
                            </div>
                            <div class="col-md-7">
                                <input type="date" name="date_end" class="form-control flex">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row align-items-center justify-content-end">
                <div class="col-md-3">
                    <label for="">Unit Kerja</label>
                </div>
                <div class="col-md-5">
                    <select name="workunit_id" id="workunit_id" class="form-select">
                        <option value="">Semua</option>
                        @foreach($workunits as $workunit)
                        <option value="{{ $workunit->id }}">{{ $workunit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100" name="search"><i class="ion ion-ios-search"></i> Cari Laporan</button>
        </div>
    </div>
</form>


<div class="table-responsive bg-white p-4 rounded-2 border">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal dan Jam</th>
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Pengirim</th>
                <th>Sifat</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            @if(Request::has('search'))
                @foreach($incomingMails as $incomingMail)
                <tr>
                    <td>1</td>
                    <td>{{ $incomingMail->created_at }} </td>
                    <td>{{ $incomingMail->date }}</td>
                    <td>{{ $incomingMail->no_mail }}</td>
                    <td>{{ $incomingMail->sender }}</td>
                    <td>{{ $incomingMail->characteristic }}</td>
                    <td>{{ $incomingMail->as_for }}</td>

                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection