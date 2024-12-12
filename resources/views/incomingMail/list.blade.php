@extends('template.admin')
@section('title', 'Surat Masuk')
@section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Masuk')

@section('content-cta')
<a href="{{ route('incomingMail.create') }}" class="btn btn-primary"><i class="ion ion-ios-add"></i> <span>Tambah Surat Masuk</span></a>
<!-- <button class="btn btn-primary" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="ion ion-ios-add"></i> Tambah Surat Masuk</button> -->
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
                <th>Perihal</th>
                <th>Sifat</th>
                <th>Kategori</th>
                <th>Disposisi sekarang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incomingMails as $incomingMail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $incomingMail->date }}</td>
                <td>{{ $incomingMail->no_mail }}</td>
                <td>{{ $incomingMail->sender }}</td>
                <td>{{ $incomingMail->as_for }}</td>
                <td>{{ $incomingMail->characteristic }}</td>
                <td>{{ $incomingMail->category->name }}</td>
                <td>
                    @if($incomingMail->disposition !== null)
                    {{ $incomingMail->disposition->workunit->name }}
                    @else
                    <i class="ion ion-ios-information-circle text-danger"></i> Menunggu disposisi
                    @endif
                </td>
                <td>
                    <a href="{{ route('incomingMail.edit', $incomingMail->id ) }}" class="btn btn-sm btn-info"><i class="ion ion-ios-create"></i></a>
                    <button class="btn btn-sm btn-danger" id="confirm-data" data-bs-target="#confirm{{ $incomingMail->id }}" data-bs-toggle="modal" data-bs-target="#confirm-data"><i class="ion ion-ios-trash"></i></button>
                    <a href="{{ route('incomingMail.detail', $incomingMail->id ) }}" class="btn btn-sm btn-success"><i class="ion ion-ios-folder"></i></a>
                    <!-- <button class="btn btn-sm btn-warning"><i class="ion ion-ios-print"></i></button> -->
                    <a href="{{ route('incomingMail.disposition', $incomingMail->id ) }}" class="btn btn-sm {{ $incomingMail->disposition == null ? 'btn-primary' : 'btn-white disabled'}}"><i class="ion ion-ios-paper-plane"></i></a>
                </td>
            </tr>
            <div class="modal fade" id="confirm{{ $incomingMail->id }}" value="{{ $incomingMail->id }}" tabindex="-1" role="dialog" aria-labelledby="confirm-data" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('incomingMail.destroy', $incomingMail->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-title">Konfirmasi Hapus Unit Kerja</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ion ion-ios-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data Surat Masuk {{ $incomingMail->no_mail }} ?
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
                    <h5 class="modal-title" id="modal-title">Surat Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ion ion-ios-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="form-body"></span>
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Nomor Surat</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no_mail" placeholder="">
                                <label for="no_mail">Nomor Surat</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Pengirim</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="pengirim" id="pengirim" class="form-control">
                                </div>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="sender" placeholder="">
                                <label for="sender">Pengirim</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Perihal</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="perihal" id="perihal" class="form-control">
                                </div>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="regarding" placeholder="">
                                <label for="regarding">Perihal</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Kategori</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="kategori" id="kategori_id" class="form-control">
                                        <option value="">Surat Keterangan Usaha</option>
                                        <option value="">Surat Keterangan Domisili</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-floating mb-3">
                                <select name="kategori" id="to" class="form-select">
                                    <option value="">Surat Keterangan Usaha</option>
                                    <option value="">Surat Keterangan Domisili</option>
                                </select>
                                <label for="to">Untuk</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
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
                            <div class="form-floating mb-3">
                                <select name="status" id="status" class="form-select">
                                    <option value="">Rahasia</option>
                                    <option value="">Penting</option>
                                    <option value="">Segera</option>
                                    <option value="">Biasa</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
                                <div class="col-md-3">
                                    <label for="">Isi</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="" id=""></textarea>
                                </div>
                            </div> -->
                            <div class="form-floating">
                                <textarea name="" id="content_mail" class="form-control" placeholder=""></textarea>
                                <label for="content_mail">Isi</label>
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

