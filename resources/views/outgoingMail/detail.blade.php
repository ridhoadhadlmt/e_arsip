@extends('template.admin')
@section('title', 'Surat Keluar')
@section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Keluar')
@section('content')

<div class="p-4 bg-white rounded-2 border">
    <div class="row">
        <div class="col-md-6">
            <div class="">
                <span class="badge bg-dark me-2"># Detail Surat Keluar</span>
                <h3>{{ $outgoingMail->no_mail }}</h3>
            </div>
            <div class="d-flex mt-4">

                <div class="pe-5">
                    <div class="mb-3">Tanggal dan Jam</div>
                    <div class="mb-3">Pegirim</div>
                    <div class="mb-3">Sifat Surat</div>
                    <div class="mb-3">Perihal</div>
                    <div class="mb-3">Tertuju Kepada</div>
                    <div class="mb-3">Isi Surat</div>
                    <div class="mb-3">Alamat</div>
                </div>
                <div>
                    <div class="mb-3">: {{ $outgoingMail->created_at}}</div>
                    <div class="mb-3">: {{ $outgoingMail->workunit->name}}</div>
                    <div class="mb-3">: {{ $outgoingMail->characteristic}}</div>
                    <div class="mb-3">: {{ $outgoingMail->as_for}}</div>
                    <div class="mb-3">: {{ $outgoingMail->to}}</div>
                    <div class="mb-3">: {{ $outgoingMail->content}}</div>
                    <div class="mb-3">: {{ $outgoingMail->address}}</div>

                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
            <div>

                <div class="d-flex justify-content-center mb-4">
                    <a href="
                    @if($outgoingMail->file_path !== null)
                    {{ route('outgoingMail.file.view', $outgoingMail->file_path) }}
                    @else

                    @endif
                    " class="btn btn-lg border"
                    style="width: 100px; height: 100px;">
                        @if($outgoingMail->file_path !== null)
                            <i class="ion ion-ios-print" style="font-size: 80px;color:#0C83C5"></i>
                        @else
                            <i class="ion ion-ios-unlock" style="font-size: 80px"></i>
                        @endif
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <span class="btn btn-default border w-100">{{ $outgoingMail->no_mail }}</span>
                </div>
                <!-- <button class="btn btn-success text-center w-100" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="ion ion-ios-cloud-download"></i> Ubah / Upload</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form" action="{{ route('outgoingMail.file.upload', $outgoingMail->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ion ion-ios-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="form-body"></span>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="file" name="file_name" accept=".pdf, .jpg, .jpeg, .png" id="name" class="form-control-file" placeholder="">
                            </div>
                        <small>* .PDF Max Size 1MB</small>
                        </div>
                        <input type="hidden" name="action" id="action" value="add" />
                        <input type="hidden" name="id" id="id" />
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="action-btn" name="action-btn" class="btn btn-primary">Simpan</button>
                    <button type="button" id="cancel-btn" name="cancel-btn" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
