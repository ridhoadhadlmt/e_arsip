@extends('template.operator')
@section('title', 'Surat Keluar')
<!-- @section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Keluar') -->
@section('content')

<div class="p-4 bg-white rounded-2 border">
    <div class="row">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <span class="badge bg-dark me-2"># Detail Surat Keluar</span>
                <h3>{{ $outgoingMail->no_mail }}</h3>
            </div>
            <div>
                @if($outgoingMail->status === 'closed')
                <i class="ion ion-ios-checkbox-outline"></i> Closed
                @else
                <button class="btn btn-danger" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-archive"><i class="ion ion-ios-checkbox"></i> Selesaikan Edaran</button>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <!-- <div class="">
                <span class="badge bg-dark me-2"># Detail Surat Keluar</span>
                <h3>{{ $outgoingMail->no_mail }}</h3>
            </div> -->
            <div class="d-flex mt-4">

                <div class="pe-5">
                    <div class="mb-3">Tanggal dan Jam</div>
                    <div class="mb-3">Pegirim</div>
                    <div class="mb-3">Sifat Surat</div>
                    <div class="mb-3">Perihal</div>
                    <div class="mb-3">Tertuju Kepada</div>
                    <div class="mb-3">Isi Surat</div>
                    <div class="mb-3">Alamat</div>
                    <div class="mb-3">Status</div>
                    <div class="mb-3">Disposisi</div>
                    <div class="mb-3">Tanggal Disposisi</div>

                </div>
                <div>
                    <div class="mb-3">: {{ $outgoingMail->created_at}}</div>
                    <div class="mb-3">: {{ $outgoingMail->workunit->name}}</div>
                    <div class="mb-3">: {{ $outgoingMail->characteristic}}</div>
                    <div class="mb-3">: {{ $outgoingMail->as_for}}</div>
                    <div class="mb-3">: {{ $outgoingMail->to}}</div>
                    <div class="mb-3">: {{ $outgoingMail->content}}</div>
                    <div class="mb-3">: {{ $outgoingMail->address}}</div>
                    <div class="mb-3">: {{ $outgoingMail->status}}</div>
                    <div class="mb-3">: {{ $outgoingMail->disposition->send_via}}</div>
                    <div>: {{ $outgoingMail->disposition->created_at}}</div>

                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
            <div>

                <div class="d-flex justify-content-center mb-4">
                    <a href="
                    @if($outgoingMail->file_path !== null)
                    {{ route('operator.file.view', $outgoingMail->file_path) }}
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
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-archive" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form" action="{{ route('operator.outgoingMail.archive', $outgoingMail->id) }}" method="POST">
                <div class="modal-header">
                    <h6 class="modal-subtitle" id="modal-subtitle">Selesaikan dan Simpan Arsip Surat <br> No: {{ $outgoingMail->no_mail }}</h6>
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
                                <input type="text" name="archive_place"  id="archive_place" class="form-control" placeholder="">
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
