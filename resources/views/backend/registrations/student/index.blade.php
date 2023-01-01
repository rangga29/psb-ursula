@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data Pendaftaran</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">{{ $registration_data->full_name }} {{ $page_setting['unit'] != 'TBTK' ? '[Jalur ' . $registration_data->registration_path . ']' : '' }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-8 grid-margin">
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
                                            @if ($page_setting['unit'] == 'TBTK')
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
            @if ($page_setting['unit'] == 'SMP')
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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h4 class="text-uppercase fw-bolder">Bukti Pembayaran</h4>
                            <img src="{{ asset('upload/payment_proof/' . $page_setting['unit_slug'] . '/' . $registration_data->payment_proof) }}" class="card-img-top w-100 mt-3"
                                style="border-radius: 0px;" alt="{{ $registration_data->payment_proof }}">
                        </div>
                        @if ($page_setting['unit'] == 'SMP')
                            @if ($registration_data->covering_letter != null)
                                <div class="col-md-6 mb-3">
                                    <h4 class="text-uppercase fw-bolder">Surat Pengantar</h4>
                                    <img src="{{ asset('upload/covering_letter/' . $registration_data->covering_letter) }}" class="card-img-top w-100 mt-3" style="border-radius: 0px;"
                                        alt="{{ $registration_data->covering_letter }}">
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <h5 class="text-uppercase fw-bolder">Status Pendaftaran</h5>
                                </div>
                                <div class="col-md-6">
                                    @if ($registration_data->registration_status == 1)
                                        <a class="btn fw-bolder text-uppercase btn-warning" disabled="disabled">Belum Terverifikasi</a>
                                    @elseif($registration_data->registration_status == 2)
                                        <a class="btn fw-bolder text-uppercase btn-success" disabled="disabled">Terverifikasi</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <h5 class="text-uppercase fw-bolder">Status {{ $page_setting['unit'] == 'SMP' ? 'Wawancara' : 'Observasi' }}</h5>
                                </div>
                                <div class="col-md-6">
                                    @if ($registration_data->selection_status == 0)
                                        <a class="btn fw-bolder text-uppercase btn-danger" disabled="disabled">Belum Dilakukan</a>
                                    @elseif($registration_data->selection_status == 1)
                                        <a class="btn fw-bolder text-uppercase btn-success" disabled="disabled">Sudah Dilakukan</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <h5 class="text-uppercase fw-bolder">Status Penerimaan</h5>
                                </div>
                                <div class="col-md-6">
                                    @if ($registration_data->approval_status == 0)
                                        <a class="btn fw-bolder text-uppercase btn-warning" disabled="disabled">Belum Pengumuman</a>
                                    @elseif($registration_data->approval_status == 1)
                                        <a class="btn fw-bolder text-uppercase btn-success" disabled="disabled">Diterima</a>
                                    @elseif($registration_data->approval_status == 2)
                                        <a class="btn fw-bolder text-uppercase btn-danger" disabled="disabled">Tidak Diterima</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <h5 class="text-uppercase fw-bolder">Status Data Siswa</h5>
                                </div>
                                <div class="col-md-6">
                                    @if ($registration_data->dapodik_status == 0)
                                        <a class="btn fw-bolder text-uppercase btn-danger" disabled="disabled">Belum Mengisi</a>
                                    @elseif($registration_data->dapodik_status == 1)
                                        <a class="btn fw-bolder text-uppercase btn-warning" disabled="disabled">Belum Terverifikasi</a>
                                    @elseif($registration_data->dapodik_status == 2)
                                        <a class="btn fw-bolder text-uppercase btn-success" disabled="disabled">Terverifikasi</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="text-uppercase fw-bolder">Status Data Administrasi</h5>
                                </div>
                                <div class="col-md-6">
                                    @if ($registration_data->payment_status == 0 || $registration_data->aggrement_status == 0)
                                        <a class="btn fw-bolder text-uppercase btn-danger" disabled="disabled">Belum Mengisi</a>
                                    @elseif($registration_data->payment_status == 1 && $registration_data->aggrement_status == 1)
                                        <a class="btn fw-bolder text-uppercase btn-success" disabled="disabled">Terverifikasi</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="text-uppercase fw-bolder">Status Data Pembelajaran</h5>
                                </div>
                                <div class="col-md-6">
                                    @if ($registration_data->uniform_status == 0 || $registration_data->book_status == 0)
                                        <a class="btn fw-bolder text-uppercase btn-danger" disabled="disabled">Belum Ada Data</a>
                                    @elseif($registration_data->uniform_status == 1 && $registration_data->book_status == 1)
                                        <a class="btn fw-bolder text-uppercase btn-success" disabled="disabled">Terverifikasi</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
