@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data Administrasi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data Administrasi</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12 grid-margin">
            <div class="card mb-3">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action">
                            <h4 class="fw-bolder text-uppercase mb-3">Panduan Kelengkapan Data Administrasi</h4>
                            <h5 class="mb-3">1. Panitia PSB {{ $page_setting['unit'] }} Santa Ursula akan mengundang orang tua calon siswa untuk datang ke sekolah.</h5>
                            <h5 class="mb-3">2. Udangan akan diinformasikan melalui Whatsapp {{ $page_setting['unit'] }} Santa Ursula.</h5>
                            <h5>3. Saat datang ke sekolah, orang tua calon siswa menyiapkan materai 10.000 (Sepuluh Ribu Rupiah) sejumlah satu buah.</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
