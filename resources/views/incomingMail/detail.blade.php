@extends('template.admin')
@section('title', 'Surat Masuk')
@section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Masuk')
@section('content')

<div class="p-4 bg-white rounded-2 border">
    <div class="row">
        <div class="col-md-6">
            <div class="">
                <span class="badge bg-dark me-2"># Detail Surat Masuk</span>
                <h3>{{ $incomingMail->no_mail }}</h3>
            </div>
            <div class="d-flex mt-4">

                <div class="pe-5">
                    <div class="mb-3">Tanggal dan Jam</div>
                    <div class="mb-3">Pegirim</div>
                    <div class="mb-3">Sifat Surat</div>
                    <div class="mb-3">Perihal</div>
                    <div class="mb-3">Isi Surat</div>
                    <div class="mb-3">Disposisi Awal</div>
                    <div class="mb-3">Disposisi Sekarang</div>
                    <div>Status</div>
                </div>
                <div>
                    <div class="mb-3">: {{ $incomingMail->created_at}}</div>
                    <div class="mb-3">: {{ $incomingMail->sender}}</div>
                    <div class="mb-3">: {{ $incomingMail->characteristic}}</div>
                    <div class="mb-3">: {{ $incomingMail->as_for}}</div>
                    <div class="mb-3">: {{ $incomingMail->content}}</div>
                    <div class="mb-3">: Admin</div>
                    <div class="mb-3">:
                        @if($incomingMail->disposition !== null)
                            {{ $incomingMail->disposition->workunit->name}}
                        @else
                           <i class="ion ion-ios-information-circle text-danger"></i> Menunggu disposisi
                        @endif
                    </div>
                    <div>: {{ $incomingMail->status}}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
            <div>

                <div class="d-flex justify-content-center mb-4">
                    <a href="
                    @if($incomingMail->file_path !== null)
                        {{ route('incomingMail.file.view', $incomingMail->file_path) }}
                    @else

                    @endif
                    " class="btn btn-lg border"
                    style="width: 100px; height: 100px;">
                        @if($incomingMail->file_path !== null)
                            <i class="ion ion-ios-print" style="font-size: 80px;color:#0C83C5"></i>
                        @else
                            <i class="ion ion-ios-unlock" style="font-size: 80px"></i>
                        @endif

                    </a>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <span class="btn btn-default border w-100">{{ $incomingMail->no_mail }}</span>
                </div>
                <!-- <button class="btn btn-success text-center w-100" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="ion ion-ios-cloud-download"></i> Ubah / Upload</button> -->
            </div>
        </div>
    </div>
</div>
@endsection
