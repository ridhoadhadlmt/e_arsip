@extends('template.admin')
@section('title', 'Disposisi')
@section('content-icon', 'ion-ios-paper-plane')
@section('content-title', 'Disposisi')

@section('content')

<div class="table-responsive bg-white p-4 rounded-2 border">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Isi Disposisi</th>
                <th>Disposisi Kepada</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dispositions as $disposition)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $disposition->content }}</td>
                <td>{{ $disposition->workunit->name }}</td>
                <td>

                </td>

            </tr>
            <div class="modal fade" id="confirm{{ $disposition->id }}" value="{{ $disposition->id }}" tabindex="-1" role="dialog" aria-labelledby="confirm-data" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('disposition.destroy', $disposition->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-title">Konfirmasi Hapus Disposisi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ion ion-ios-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini ?
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
                    <h5 class="modal-title" id="modal-title">Disposisi</h5>
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
                                <input type="text" id="name" class="form-control" placeholder="">
                                <label for="name" class="d-md-block text-left">Nama Disposisi</label>
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
