@extends('template.admin')
@section('title', 'Surat Masuk')
@section('content-icon', 'ion-ios-mail')
@section('content-title', 'Surat Masuk')
@section('content')
<form action="{{ route('incomingMail.update', $incomingMail->id) }}" method="POST" class="bg-white p-4 rounded-2 border" enctype="multipart/form-data">
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
                <input type="text" name="no_mail" class="form-control" value="{{ $incomingMail->no_mail }}" id="no_mail" placeholder="">
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
                <input type="date" name="date" class="form-control" value="{{ $incomingMail->date }}" id="date" placeholder="">
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
                <input type="text" name="sender" class="form-control" value="{{ $incomingMail->sender }}" id="sender" placeholder="">
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
                <input type="text" name="as_for" class="form-control" value="{{ $incomingMail->as_for }}" id="as_for" placeholder="">
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
                    <option value="rahasia" {{ $incomingMail->characteristic == 'rahasia' ? 'selected' :''}}>Rahasia</option>
                    <option value="penting" {{ $incomingMail->characteristic == 'penting' ? 'selected' :''}}>Penting</option>
                    <option value="segera" {{ $incomingMail->characteristic == 'segera' ? 'selected' :''}}>Segera</option>
                    <option value="biasa" {{ $incomingMail->characteristic == 'biasa' ? 'selected' :''}}>Biasa</option>
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
                <textarea name="content" id="content" class="form-control" value="{{ $incomingMail->content }}" placeholder="">{{ $incomingMail->content }}</textarea>
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="content">Isi</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating">
                <input type="file" name="file_name" accept=".pdf, .jpg, .jpeg, .png" id="name" class="form-control-file" placeholder="">
            </div>
            <small>* .JPG, .JPEG, .PNG, .PDF Max Size 1MB</small>
        </div>
    </div>
    <div class="cta mt-4">
        <button type="submit" class="btn btn-success"><i class="ion ion-ios-save"></i> Ubah</button>
        <a href="{{ route('incomingMail') }}" class="btn btn-danger"><i class="ion ion-ios-arrow-back"></i> Kembali</a>
    </div>
</form>
@endsection
