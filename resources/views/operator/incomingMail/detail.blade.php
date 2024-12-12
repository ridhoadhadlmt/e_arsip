@extends('template.operator')
@section('title', 'Surat Masuk')
<!-- @section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Masuk') -->
@section('content')

<div class="p-4 bg-white rounded-2 border">
    <div class="row">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <span class="badge bg-dark me-2"># Detail Surat Masuk</span>
                <h3>{{ $incomingMail->no_mail }}</h3>
            </div>
            <div>
                @if($incomingMail->status === 'closed')
                <i class="ion ion-ios-checkbox-outline"></i> Closed
                @else
                <button class="btn btn-danger" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-archive"><i class="ion ion-ios-checkbox"></i> Selesaikan Edaran</button>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <!-- <div class="">
                <span class="badge bg-dark me-2"># Detail Surat Masuk</span>
                <h3>{{ $incomingMail->no_mail }}</h3>
            </div> -->
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
                            {{ $incomingMail->workunit->name}}
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
                    {{ route('operator.file.view', $incomingMail->file_path) }}
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
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-archive" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form" action="{{ route('operator.incomingMail.archive', $incomingMail->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-subtitle" id="modal-subtitle">Selesaikan dan Simpan Arsip Surat <br> No: {{ $incomingMail->no_mail }}</h6>
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
                                <input type="text" name="archive_place" id="archive_place" class="form-control" placeholder="">
                                <label for="archive_place">Lokasi Penyimpanan Arsip</label>
                            </div>
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
