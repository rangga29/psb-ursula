@extends('backend.layouts.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $page_setting['grade'] }} Admin Management</li>
            <li class="breadcrumb-item">Data Siswa</li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">{{ $registration_data->full_name }} {{ $page_setting['grade'] != 'TBTK' ? '[Jalur ' . $registration_data->registration_path . ']' : '' }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-9 grid-margin">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Kode Pendaftaran</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->registration_code }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Kode Virtual</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->virtual_code }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Nama Lengkap</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->full_name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Nama Panggilan</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->nick_name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Tanggal Lahir</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->birth_town }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d', $registration_data->birth_date)->isoFormat('DD MMMM Y') }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Jenis Kelamin</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->gender }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Tahun Mendaftar</span>
                                        </div>
                                        <div class="col-md-6">
                                            : TA {{ $registration_data->registration_year->name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Tingkat yang Dituju</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($page_setting['grade'] == 'TBTK')
                                                : Kelas @if ($registration_data->register_grade == 1)
                                                    TB
                                                @elseif($registration_data->register_grade == 2)
                                                    TK A
                                                @else
                                                    TK B
                                                @endif
                                            @else
                                                : Kelas {{ $registration_data->register_grade }}
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Asal Sekolah</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->origin_school }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Nama Orang Tua</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->parent_name }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">Alamat Email</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->parent_email }}
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-uppercase fw-bolder">No. Handphone</span>
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $registration_data->parent_phone }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @if ($page_setting['grade'] == 'SMP')
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-uppercase fw-bolder">[Kelas 4] B.Indo Sem 1</span>
                                            </div>
                                            <div class="col-md-6">
                                                : {{ $registration_data->kelas4_sem1_indo }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-uppercase fw-bolder">[Kelas 4] B.Indo Sem 2</span>
                                            </div>
                                            <div class="col-md-6">
                                                : {{ $registration_data->kelas4_sem1_mat }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-uppercase fw-bolder">[Kelas 4] Mat Sem 1</span>
                                            </div>
                                            <div class="col-md-6">
                                                : {{ $registration_data->kelas4_sem2_indo }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-uppercase fw-bolder">[Kelas 4] Mat Sem 2</span>
                                            </div>
                                            <div class="col-md-6">
                                                : {{ $registration_data->kelas4_sem2_mat }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-uppercase fw-bolder">[Kelas 5] B.Indo Sem 1</span>
                                            </div>
                                            <div class="col-md-6">
                                                : {{ $registration_data->kelas5_sem1_indo }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-uppercase fw-bolder">[Kelas 5] B.Indo Sem 2</span>
                                            </div>
                                            <div class="col-md-6">
                                                : {{ $registration_data->kelas5_sem1_mat }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-uppercase fw-bolder">[Kelas 5] Mat Sem 1</span>
                                            </div>
                                            <div class="col-md-6">
                                                : {{ $registration_data->kelas5_sem2_indo }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span class="text-uppercase fw-bolder">[Kelas 5] Mat Sem 2</span>
                                            </div>
                                            <div class="col-md-6">
                                                : {{ $registration_data->kelas5_sem2_mat }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bolder text-uppercase collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    #1 - Data Pribadi {{ $dapodik_pribadi !== null ? '(Sudah Diisi)' : '(Belum Diisi)' }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($dapodik_pribadi == null)
                                        Data Belum Diisi
                                    @else
                                        <div class="row">
                                            <div class="col-md-6">
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
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group">
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
                                    #2 - Data Kependudukan {{ $dapodik_kependudukan !== null ? '(Sudah Diisi)' : '(Belum Diisi)' }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($dapodik_kependudukan == null)
                                        Data Belum Diisi
                                    @else
                                        <div class="row">
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
                                                <ul class="list-group">
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
                                    #3 - Data Ayah {{ $dapodik_ayah !== null ? '(Sudah Diisi)' : '(Belum Diisi)' }}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($dapodik_ayah == null)
                                        Data Belum Diisi
                                    @else
                                        <div class="row">
                                            <div class="col-md-6">
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
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group">
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
                                    #4 - Data Ibu {{ $dapodik_ibu !== null ? '(Sudah Diisi)' : '(Belum Diisi)' }}
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($dapodik_ibu == null)
                                        Data Belum Diisi
                                    @else
                                        <div class="row">
                                            <div class="col-md-6">
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
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group">
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
                                    #5 - Data Wali {{ $dapodik_wali !== null ? '(Sudah Diisi)' : '(Belum Diisi)' }}
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($dapodik_wali == null)
                                        Data Belum Diisi
                                    @else
                                        <div class="row">
                                            <div class="col-md-6">
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
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group">
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
            @if ($dapodik_kependudukan != null)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="text-uppercase fw-bolder">Pas Foto</span>
                                <img src="{{ asset('upload/pas_foto/' . $page_setting['grade_slug'] . '/' . $dapodik_kependudukan->pas_foto) }}" alt="Pas Foto">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-xxl-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @can($page_setting['grade_slug'] . '-dapodik-verification')
                            @if ($registration_data->dapodik_status == 0)
                                <span class="btn fw-bolder btn-danger text-uppercase disabled" aria-disabled="true">Belum Diisi</span>
                            @elseif($registration_data->dapodik_status == 1)
                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$registration_data->unique_code, 2]) }}"
                                    class="btn fw-bolder btn-warning text-uppercase">
                                    Belum Verifikasi
                                </a>
                            @elseif($registration_data->dapodik_status == 2)
                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$registration_data->unique_code, 1]) }}"
                                    class="btn fw-bolder btn-success text-uppercase">
                                    Terverifikasi
                                </a>
                            @endif
                        @endcan
                        @can($page_setting['grade_slug'] . '-dapodik-edit')
                            <hr class="my-1">
                            @if ($dapodik_pribadi == null || $registration_data->dapodik_status == 2)
                                <span class="btn btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">Ubah Data Pribadi</span>
                            @else
                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.editDataPribadi', $registration_data->unique_code) }}"
                                    class="btn btn-warning fw-bolder text-uppercase">
                                    Ubah Data Pribadi
                                </a>
                            @endif
                            @if ($dapodik_kependudukan == null || $registration_data->dapodik_status == 2)
                                <span class="btn btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">Ubah Data Kependudukan</span>
                            @else
                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.editDataKependudukan', $registration_data->unique_code) }}"
                                    class="btn btn-warning fw-bolder text-uppercase">
                                    Ubah Data Kependudukan
                                </a>
                            @endif
                            @if ($dapodik_ayah == null || $registration_data->dapodik_status == 2)
                                <span class="btn btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">Ubah Data Ayah</span>
                            @else
                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.editDataAyah', $registration_data->unique_code) }}"
                                    class="btn btn-warning fw-bolder text-uppercase">
                                    Ubah Data Ayah
                                </a>
                            @endif
                            @if ($dapodik_ibu == null || $registration_data->dapodik_status == 2)
                                <span class="btn btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">Ubah Data Ibu</span>
                            @else
                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.editDataIbu', $registration_data->unique_code) }}"
                                    class="btn btn-warning fw-bolder text-uppercase">
                                    Ubah Data Ibu
                                </a>
                            @endif
                            @if ($dapodik_wali == null || $registration_data->dapodik_status == 2)
                                <span class="btn btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">Ubah Data Wali</span>
                            @else
                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.editDataWali', $registration_data->unique_code) }}"
                                    class="btn btn-warning fw-bolder text-uppercase">
                                    Ubah Data Wali
                                </a>
                            @endif
                        @endcan
                        @can($page_setting['grade_slug'] . '-dapodik-report')
                            <hr class="my-1">
                            @if ($registration_data->dapodik_status == 0)
                                <span class="btn btn-secondary fw-bolder text-uppercase disabled" aria-disabled="true">
                                    Download PDF
                                </span>
                            @else
                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.download-pdf', $registration_data->unique_code) }}"
                                    class="btn btn-secondary fw-bolder text-uppercase" target="__blank">
                                    Download PDF
                                </a>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
