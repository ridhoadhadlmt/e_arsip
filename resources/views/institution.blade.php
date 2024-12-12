@extends('template.admin')

@section('title', 'Instansi')
@section('content-icon', 'ion-ios-business')
@section('content-title', 'Instansi')
@section('content')

<div class="p-4 bg-white rounded-2 border">
    <div class="row align-items-center">
        <div class="col-md-2 d-md-block d-flex justify-content-center">
            <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="">
        </div>
        <div class="col-md-10 d-md-block py-md-0 pt-4">
            <h4 class="mb-3 text-center text-md-start">Kantor Desa Sambirejo</h4>
            <div class="row">
                <div class="col-md-2 col-5">
                  <p>Kota / Kabupaten</p>
                  <p>Nomor Telepon</p>
                  <p>Email</p>
                  <p>Kepala</p>
                  <p class="mb-0">Alamat</p>
                </div>

                <div class="col">

                    <p>: Kabupaten Deli Serdang</p>
                    <p>: 085373009004</p>
                    <p>: sambirejotimurdesa@gmail.com</p>
                    <p>: Mhd Arifin</p>
                    <p class="mb-0">: Jl. Makmur Dusun VII Tanjung Desa Sambirejo Timur</p>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
