@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Data Siswa</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12 grid-margin">
            <p class="mb-3">Data siswa digunakan oleh sekolah sebagai data dapodik. Mohon diisi dengan lengkap dan benar.</p>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fw-bolder text-uppercase collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            #1 - Data Pribadi {{ $dapodik_pribadi !== null ? '(Sudah Diisi)' : '' }}
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($dapodik_pribadi == null)
                                <a href="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.dapodik.pribadi') }}" class="btn btn-primary fw-bolder text-uppercase">Isi Data Pribadi</a>
                            @else
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Lengkap</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->nama_lengkap }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Panggilan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->nama_panggilan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kota Kelahiran</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->kota_lahir }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Tanggal Lahir</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_pribadi->tanggal_lahir)->isoFormat('DD MMMM Y') }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jenis Kelamin</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->jenis_kelamin }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kewarganegaraan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->kewarganegaraan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Negara</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->nama_negara != null ? $dapodik_pribadi->nama_negara : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Agama</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->agama }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Paroki</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->paroki != null ? $dapodik_pribadi->paroki : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Berkebutuhan Khusus</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->kebutuhan_khusus }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jenis Kebutuhan Khusus</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->jenis_kebutuhan_khusus != null ? $dapodik_pribadi->jenis_kebutuhan_khusus : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Anak Ke-</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->anak_keberapa }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jumlah Saudara Kandung</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->saudara_kandung }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Golongan Darah</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->gol_darah }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Tinggi Badan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->tinggi_badan }} CM
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Berat Badan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->berat_badan }} KG
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Lingkar Kepala</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->lingkar_kepala }} CM
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">NISN</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->nisn != null ? $dapodik_pribadi->nisn : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Asal Sekolah</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->asal_sekolah != null ? $dapodik_pribadi->asal_sekolah : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Alamat Asal Sekolah</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->asal_sekolah_alamat != null ? $dapodik_pribadi->asal_sekolah_alamat : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kota Asal Sekolah</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_pribadi->asal_sekolah_kota != null ? $dapodik_pribadi->asal_sekolah_kota : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button fw-bolder text-uppercase collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            #2 - Data Kependudukan {{ $dapodik_kependudukan !== null ? '(Sudah Diisi)' : '' }}
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($dapodik_kependudukan == null)
                                <a href="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.dapodik.kependudukan') }}" class="btn btn-primary fw-bolder text-uppercase">Isi Data
                                    Kependudukan</a>
                            @else
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">NIK</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->nik }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">NKK</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->nkk }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">NAK</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->nak }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Tinggal Bersama</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->tinggal_bersama }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Moda Transportasi</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->transportasi }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jarak Tempuh</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->jarak_tempuh }} KM
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Waktu Tempuh</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->waktu_tempuh }} Menit
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pas Foto</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : <a href="{{ asset('upload/pas_foto/' . $page_setting['unit_slug'] . '/' . $dapodik_kependudukan->pas_foto) }}" target="__blank">
                                                            Lihat Foto
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[KK] Alamat</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->kk_alamat }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[KK] RT</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->kk_rt }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[KK] RW</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->kk_rw }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[KK] Kelurahan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->kk_kelurahan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[KK] Kecamatan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->kk_kecamatan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[KK] Kota/Kabupaten</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->kk_kota }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[KK] Kodepos</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->kk_kodepos }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[DOM] Alamat</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->tt_alamat }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[DOM] RT</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->tt_rt }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[DOM] RW</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->tt_rw }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[DOM] Kelurahan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->tt_kelurahan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[DOM] Kecamatan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->tt_kecamatan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[DOM] Kota/Kabupaten</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->tt_kota }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">[DOM] Kodepos</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_kependudukan->tt_kodepos }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button fw-bolder text-uppercase collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                            #3 - Data Ayah {{ $dapodik_ayah !== null ? '(Sudah Diisi)' : '' }}
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($dapodik_ayah == null)
                                <a href="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.dapodik.ayah') }}" class="btn btn-primary fw-bolder text-uppercase">Isi Data Ayah</a>
                            @else
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Lengkap</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_nama_lengkap }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">NIK</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_nik }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kota Kelahiran</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_kota_lahir }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Tanggal Lahir</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_ayah->ayah_tanggal_lahir)->isoFormat('DD MMMM Y') }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Agama</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_agama }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kewarganegaraan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_kewarganegaraan }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pendidikan Terakhir</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_pendidikan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pekerjaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_pekerjaan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jabatan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_jabatan != null ? $dapodik_ayah->ayah_jabatan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pendapatan Per Bulan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : @if ($dapodik_ayah->ayah_pendapatan == 'gol1')
                                                            Tidak Berpenghasilan
                                                        @elseif($dapodik_ayah->ayah_pendapatan == 'gol2')
                                                            Kurang dari Rp 2.000.000
                                                        @elseif($dapodik_ayah->ayah_pendapatan == 'gol3')
                                                            Rp 2.000.000 - 5.000.000
                                                        @elseif($dapodik_ayah->ayah_pendapatan == 'gol4')
                                                            Rp 5.000.000 - 10.000.000
                                                        @elseif($dapodik_ayah->ayah_pendapatan == 'gol5')
                                                            Lebih Dari Rp 10.000.000
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Perusahaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_nama_perusahaan != null ? $dapodik_ayah->ayah_nama_perusahaan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Alamat Perusahaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_alamat_perusahaan != null ? $dapodik_ayah->ayah_alamat_perusahaan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Berkebutuhan Khusus</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_kebutuhan_khusus }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jenis Kebutuhan Khusus</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_jenis_kebutuhan_khusus != null ? $dapodik_ayah->ayah_jenis_kebutuhan_khusus : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">No. Handphone</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_telepon }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Alamat Email</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ayah->ayah_email }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button fw-bolder text-uppercase collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                            aria-controls="collapseFour">
                            #4 - Data Ibu {{ $dapodik_ibu !== null ? '(Sudah Diisi)' : '' }}
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($dapodik_ibu == null)
                                <a href="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.dapodik.ibu') }}" class="btn btn-primary fw-bolder text-uppercase">Isi Data Ibu</a>
                            @else
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Lengkap</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_nama_lengkap }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">NIK</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_nik }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kota Kelahiran</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_kota_lahir }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Tanggal Lahir</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_ibu->ibu_tanggal_lahir)->isoFormat('DD MMMM Y') }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Agama</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_agama }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kewarganegaraan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_kewarganegaraan }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pendidikan Terakhir</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_pendidikan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pekerjaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_pekerjaan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jabatan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_jabatan != null ? $dapodik_ibu->ibu_jabatan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pendapatan Per Bulan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : @if ($dapodik_ibu->ibu_pendapatan == 'gol1')
                                                            Tidak Berpenghasilan
                                                        @elseif($dapodik_ibu->ibu_pendapatan == 'gol2')
                                                            Kurang dari Rp 2.000.000
                                                        @elseif($dapodik_ibu->ibu_pendapatan == 'gol3')
                                                            Rp 2.000.000 - 5.000.000
                                                        @elseif($dapodik_ibu->ibu_pendapatan == 'gol4')
                                                            Rp 5.000.000 - 10.000.000
                                                        @elseif($dapodik_ibu->ibu_pendapatan == 'gol5')
                                                            Lebih Dari Rp 10.000.000
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Perusahaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_nama_perusahaan != null ? $dapodik_ibu->ibu_nama_perusahaan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Alamat Perusahaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_alamat_perusahaan != null ? $dapodik_ibu->ibu_alamat_perusahaan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Berkebutuhan Khusus</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_kebutuhan_khusus }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jenis Kebutuhan Khusus</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_jenis_kebutuhan_khusus != null ? $dapodik_ibu->ibu_jenis_kebutuhan_khusus : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">No. Handphone</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_telepon }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Alamat Email</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_ibu->ibu_email }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button fw-bolder text-uppercase collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                            aria-controls="collapseFive">
                            #5 - Data Wali {{ $dapodik_wali !== null ? '(Sudah Diisi)' : '' }}
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($dapodik_wali == null)
                                <p>Jika Saat Ini Tinggal Bersama Orang Tua Pengisian Data Bagian Ini Dapat Dilewati.</p>
                                <hr>
                                <a href="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.dapodik.wali') }}" class="btn btn-primary fw-bolder text-uppercase">Isi Data Wali</a>
                            @else
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Lengkap</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_nama_lengkap }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">NIK</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_nik }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kota Kelahiran</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_kota_lahir }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Tanggal Lahir</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_wali->wali_tanggal_lahir)->isoFormat('DD MMMM Y') }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Agama</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_agama }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Kewarganegaraan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_kewarganegaraan }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pendidikan Terakhir</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_pendidikan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pekerjaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_pekerjaan }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jabatan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_jabatan != null ? $dapodik_wali->wali_jabatan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Pendapatan Per Bulan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : @if ($dapodik_wali->wali_pendapatan == 'gol1')
                                                            Tidak Berpenghasilan
                                                        @elseif($dapodik_wali->wali_pendapatan == 'gol2')
                                                            Kurang dari Rp 2.000.000
                                                        @elseif($dapodik_wali->wali_pendapatan == 'gol3')
                                                            Rp 2.000.000 - 5.000.000
                                                        @elseif($dapodik_wali->wali_pendapatan == 'gol4')
                                                            Rp 5.000.000 - 10.000.000
                                                        @elseif($dapodik_wali->wali_pendapatan == 'gol5')
                                                            Lebih Dari Rp 10.000.000
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Nama Perusahaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_nama_perusahaan != null ? $dapodik_wali->wali_nama_perusahaan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Alamat Perusahaan</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_alamat_perusahaan != null ? $dapodik_wali->wali_alamat_perusahaan : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Berkebutuhan Khusus</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_kebutuhan_khusus }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Jenis Kebutuhan Khusus</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_jenis_kebutuhan_khusus != null ? $dapodik_wali->wali_jenis_kebutuhan_khusus : '--' }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">No. Handphone</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_telepon }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Alamat Email</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_email }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="text-uppercase fw-bolder">Hubungan Dengan Anak</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        : {{ $dapodik_wali->wali_hubungan_anak }}
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
