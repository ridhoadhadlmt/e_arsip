@extends('template.admin')
@section('title', 'Surat Masuk')
@section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Masuk')
@section('content')
<form action="{{ route('incomingMail.add') }}" method="POST" class="bg-white p-4 rounded-2 border" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-6">
            <!-- <div class="mb-2 row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Nomor Surat</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control">
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <input type="text" name="no_mail" class="form-control" value="{{ old('no_mail') }}" id="no_mail" placeholder="">
                @error('no_mail')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="no_mail">Nomor Surat</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- <div class="mb-2 row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Tanggal</label>
                </div>
                <div class="col-md-10">
                    <input type="date" class="form-control">
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <input type="date" name="date" class="form-control" value="{{ old('date') }}" id="date" placeholder="">
                @error('date')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="date">Tanggal</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- <div class="mb-2 row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Pengirim</label>
                </div>
                <div class="col-md-10">
                    <input type="text" name="pengirim" id="pengirim" class="form-control" >
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <input type="text" name="sender" class="form-control" value="{{ old('sender') }}" id="sender" placeholder="">
                @error('sender')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="sender">Pengirim</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- <div class="mb-2 row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Perihal</label>
                </div>
                <div class="col-md-10">
                    <input type="text" name="perihal" id="perihal" class="form-control">
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <input type="text" name="as_for" class="form-control" value="{{ old('as_for') }}" id="as_for" placeholder="">
                @error('as_for')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="as_for">Perihal</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- <div class="mb-2 row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Untuk</label>
                </div>
                <div class="col-md-10">
                    <select name="kategori" id="kategori_id" class="form-control">
                        <option value="">Surat Keterangan Usaha</option>
                        <option value="">Surat Keterangan Domisili</option>
                    </select>
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <select name="category_id" id="category_id" class="form-select">
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @else
                        <option value="">Belum ada data</option>
                    @endif
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="category_id">Untuk</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- <div class="mb-2 row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Status</label>
                </div>
                <div class="col-md-10">
                    <select name="status" id="status" class="form-control">
                        <option value="">Rahasia</option>
                        <option value="">Penting</option>
                        <option value="">Segera</option>
                        <option value="">Biasa</option>
                    </select>
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <select name="characteristic" id="characteristic" class="form-select">
                    <option value="rahasia">Rahasia</option>
                    <option value="penting">Penting</option>
                    <option value="segera">Segera</option>
                    <option value="biasa">Biasa</option>
                </select>
                @error('characteristic')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="characteristic">Sifat</label>
            </div>
        </div>
        <div class="col-md-12 col-sm-6">
            <!-- <div class="mb-2 row align-items-center">
                <div class="col-md-2">
                    <label for="" class="d-md-block text-left">Isi</label>
                </div>
                <div class="col-md-10">
                    <textarea class="form-control" name="" id=""></textarea>
                </div>
            </div> -->
            <div class="form-floating mb-3">
                <textarea name="content" id="content" class="form-control" placeholder="">{{ old('content') }}</textarea>
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="content">Isi</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <input type="file" name="file_name" id="name" accept=".pdf, .jpg, .jpeg, .png" class="form-control-file" placeholder="">
                @error('file_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <small>* .JPG, .JPEG, .PNG, .PDF Max Size 1MB</small>
        </div>
        <input type="hidden" name="action" id="action" value="add" />
        <input type="hidden" name="id" id="id" />
        <!-- <div class="col-md-10 offset-md-2">
            <button class="btn btn-primary"><i class="ion ion-ios-save"></i> Simpan</button>
            <a href="{{ route('incomingMail') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
        </div> -->
    </div>
    <div class="cta mt-4">
        <button type="submit" class="btn btn-primary"><i class="ion ion-ios-save"></i> Simpan</button>
        <a href="{{ route('incomingMail') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>

@endsection
