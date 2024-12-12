@extends('template.admin')

@section('title', 'Laporan')
@section('content-icon', 'ion-ios-print')
@section('content-title', 'Laporan')

@section('content')

<form action="{{ route('report.outgoingMail.search') }}" method="POST" class="bg-white p-4 rounded-2 border mb-4">
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
                                <input type="date" value="{{ $date_start }}" name="date_start" class="form-control flex">
                            </div>

                        </div>

                        <div class="col-md-6 row align-items-center">
                            <div class="col-md-5">
                                <label for="">Sampai tanggal</label>
                            </div>
                            <div class="col-md-7">
                                <input type="date" value="{{ $date_end }}" name="date_end" class="form-control flex">
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
                        <option value="{{ $workunit->id }}" {{ $workunit_id == $workunit->id ? 'selected' : '' }}>{{ $workunit->name }}</option>
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

<form action="{{ route('report.outgoingMail.export') }}" method="POST" class="d-flex justify-content-end mb-4">
    @csrf

    <input type="hidden" name="workunit_id" value="{{ $workunit_id }}">
    <input type="hidden" name="date_start" value="{{ $date_start }}">
    <input type="hidden" name="date_end" value="{{ $date_end }}">
    <button class="btn btn-warning"><i class="ion ion-ios-document"></i> Cetak</button>
</form>
<div class="table-responsive bg-white p-4 rounded-2 border">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal dan Jam</th>
                <th>Nomor Surat</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Kepada</th>
                <th>Sifat</th>
            </tr>
        </thead>
        <tbody>
        @if(Request::has('search'))
            @foreach($outgoingMails as $outgoingMail)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $outgoingMail->created_at }}</td>
                <td>{{ $outgoingMail->no_mail }}</td>
                <td>{{ $outgoingMail->workunit->name }}</td>
                <td>{{ $outgoingMail->as_for }}</td>
                <td>{{ $outgoingMail->to }}</td>
                <td>{{ $outgoingMail->characteristic }}</td>

            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@endsection
