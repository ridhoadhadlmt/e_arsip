@extends('template.admin')
@section('title', 'Surat Keluar ')
@section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Keluar ')

@section('content-cta')
<a href="{{ route('outgoingMail.create') }}" class="btn btn-primary"><i class="ion ion-ios-add"></i> <span>Tambah Surat Keluar</span></a>
<!-- <button class="btn btn-primary" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="ion ion-ios-add"></i> Tambah Surat Keluar </button> -->
@endsection

@section('content')
<div class="table-responsive bg-white p-4 rounded-2 border">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nomor Surat</th>
                <th>Pengirim</th>
                <th>Status</th>
                <th>Kategori</th>
                <th>Kepada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outgoingMails as $outgoingMail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $outgoingMail->date }}</td>
                <td>{{ $outgoingMail->no_mail }}</td>
                <td>{{ $outgoingMail->workunit->name }}</td>
                <td>{{ $outgoingMail->characteristic }}</td>
                <td>{{ $outgoingMail->category->name }}</td>
                <td>{{ $outgoingMail->to }}</td>
                <td>
                    <a href="{{ route('outgoingMail.edit', $outgoingMail->id) }}" class="btn btn-sm btn-info"><i class="ion ion-ios-create"></i></a>
                    <a href="{{ route('outgoingMail.detail', $outgoingMail->id ) }}" class="btn btn-sm btn-success"><i class="ion ion-ios-folder"></i></a>
                    <button class="btn btn-sm btn-danger" id="confirm-data" data-bs-target="#confirm{{ $outgoingMail->id }}" data-bs-toggle="modal" data-bs-target="#confirm-data"><i class="ion ion-ios-trash"></i></button>
                </td>
            </tr>
            <div class="modal fade" id="confirm{{ $outgoingMail->id }}" value="{{ $outgoingMail->id }}" tabindex="-1" role="dialog" aria-labelledby="confirm-data" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('outgoingMail.destroy', $outgoingMail->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-title">Konfirmasi Hapus Unit Kerja</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ion ion-ios-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data Surat Masuk {{ $outgoingMail->no_mail }} ?
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" id="action-btn" name="action-btn" class="btn btn-primary">Hapus</button>
                                <button type="button" id="cancel-btn" name="cancel-btn" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Surat Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ion ion-ios-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="form-body"></span>
                    @csrf

                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" id="no" class="form-control" placeholder="">
                                <label for="no">Nomor Surat</label>
                            </div>
                            <!-- <div class="mb-3 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Nomor Surat</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" id="sender" class="form-control" placeholder="">
                                <label for="sender">Pengirim</label>
                            </div>
                            <!-- <div class="mb-3 row align-items-center">
                                <div class="col-md-3">
                                    <label for="sender">Pengirim</label>
                                    </div>
                                <div class="col-md-9">
                                    <input type="text" id="sender" class="form-control">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="perihal" id="subject" class="form-control" placeholder="">
                                <label for="subject">Perihal</label>
                            </div>
                            <!-- <div class="mb-3 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Perihal</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="perihal" id="perihal" class="form-control">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="kepada" id="to" class="form-control" placeholder="">
                                <label for="to">Kepada</label>
                            </div>
                            <!-- <div class="mb-3 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Kepada</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="kepada" id="kepada" class="form-control">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <select name="kategori" id="kategori_id" class="form-select">
                                    <option value="">Surat Keterangan Usaha</option>
                                    <option value="">Surat Keterangan Domisili</option>
                                </select>
                                <label for="kategori_id">Untuk</label>
                            </div>
                            <!-- <div class="mb-3 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Untuk</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="kategori" id="kategori_id" class="form-control">
                                        <option value="">Surat Keterangan Usaha</option>
                                        <option value="">Surat Keterangan Domisili</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <select name="status" id="status" class="form-select">
                                    <option value="">Rahasia</option>
                                    <option value="">Penting</option>
                                    <option value="">Segera</option>
                                    <option value="">Biasa</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                            <!-- <div class="mb-3 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Rahasia</option>
                                        <option value="">Penting</option>
                                        <option value="">Segera</option>
                                        <option value="">Biasa</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="address" id="address" class="form-control" placeholder="">
                                <label for="address" class="d-md-block text-left">Alamat</label>
                            </div>
                            <!-- <div class="mb-3 row align-items-center">
                                <div class="col-md-3">
                                    <label for="" class="d-md-block text-left">Alamat</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <div class="form-floating">
                                <textarea class="form-control" name="" cols="10" id="content" placeholder=""></textarea>
                                <label for="content">Isi</label>
                            </div>
                            <!-- <div class="mb-3 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Isi</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="" id=""></textarea>
                                </div>
                            </div> -->
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
