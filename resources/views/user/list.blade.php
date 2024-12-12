@extends('template.admin')

@section('title', 'Pengguna ')
@section('content-icon', 'ion-ios-person')
@section('content-title', 'Pengguna ')

@section('content-cta')
<a href="{{ route('user.create') }}" class="btn btn-primary"><i class="ion ion-ios-add"></i> <span>Tambah Pengguna</span></a>
<!-- <button class="btn btn-primary" id="add-data" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="ion ion-ios-add"></i> Tambah Pengguna </button> -->
@endsection

@section('content')

<div class="table-responsive bg-white p-4 rounded-2 border">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Pengguna</th>
                <th>Unit Kerja</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->username}}</td>
                <td>{{ $user->name}}</td>
                <td>@if($user->workunit_id === 0 && $user->role === 1)
                    Administrator
                    @elseif($user->workunit_id === 0)
                    -
                    @else
                    {{ $user->workunit->name }}
                    @endif
                </td>
                <td>
                    <!-- <button class="btn btn-sm btn-info"><i class="ion ion-ios-create"></i></button> -->
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="ion ion-ios-create"></i></a>
                    <button class="btn btn-sm btn-danger" id="confirm-data" data-bs-target="#confirm{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#confirm-data"><i class="ion ion-ios-trash"></i></button>
                </td>
            </tr>
            <div class="modal fade" id="confirm{{ $user->id }}" value="{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="confirm-data" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-title">Konfirmasi Hapus Unit Kerja</h5>
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
                    <h5 class="modal-title" id="modal-title">Pengguna</h5>
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
                                    <label for="" class="d-md-block text-left">Username</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="text" id="username" class="form-control" placeholder="">
                                <label for="username" class="d-md-block text-left">Username</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
                                <div class="col-md-3">
                                    <label for="" class="d-md-block text-left">Nama Pengguna</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="text" id="name" class="form-control" placeholder="">
                                <label for="name" class="d-md-block text-left">Nama Pengguna</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
                                <div class="col-md-3">
                                    <label for="" class="d-md-block text-left">Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control">
                                </div>
                            </div> -->
                            <div class="form-floating mb-3">
                                <input type="password" id="password" class="form-control" placeholder="">
                                <label for="password" class="d-md-block text-left">Password</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <!-- <div class="mb-2 row align-items-center">
                                <div class="col-md-3">
                                    <label for="" class="d-md-block text-left">Unit Kerja</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="unit_kerja" id="unit_kerja_id" class="form-select">
                                        <option value="">Bendahara</option>
                                        <option value="">Sekretaris</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-floating">
                                <select name="unit_kerja" id="unit_kerja_id" class="form-select">
                                    <option value="">Bendahara</option>
                                    <option value="">Sekretaris</option>
                                </select>
                                <label for="unit_kerja_id" class="d-md-block text-left">Unit Kerja</label>
                            </div>
                        </div>

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
