@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $page_setting['grade'] }} Admin Management</li>
            <li class="breadcrumb-item">Data Pendaftaran</li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">{{ $registration_data->full_name }} {{ $page_setting['grade'] != 'TBTK' ? '[' . $registration_data->registration_path . ']' : '' }}</h3>
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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h4 class="text-uppercase fw-bolder">Bukti Pembayaran</h4>
                            <img src="{{ asset('upload/payment_proof/' . $page_setting['grade_slug'] . '/' . $registration_data->payment_proof) }}" class="card-img-top w-100 mt-3"
                                style="border-radius: 0px;" alt="{{ $registration_data->payment_proof }}">
                        </div>
                        @if ($page_setting['grade'] == 'SMP')
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
            <div class="card mb-3">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <h5 class="text-uppercase fw-bolder">Status Pendaftaran</h5>
                                </div>
                                <div class="col-md-6">
                                    @if ($registration_data->registration_status == 1)
                                        <a class="btn fw-bolder btn-warning text-uppercase" disabled="disabled">Belum Terverifikasi</a>
                                    @elseif($registration_data->registration_status == 2)
                                        <a class="btn fw-bolder btn-success text-uppercase" disabled="disabled">Terverifikasi</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <h5 class="text-uppercase fw-bolder">Status {{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }}</h5>
                                </div>
                                <div class="col-md-6">
                                    @if ($registration_data->selection_status == 0)
                                        <a class="btn fw-bolder btn-danger text-uppercase" disabled="disabled">Belum Dilakukan</a>
                                    @elseif($registration_data->selection_status == 1)
                                        <a class="btn fw-bolder btn-success text-uppercase" disabled="disabled">Sudah Dilakukan</a>
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
                                        <a class="btn fw-bolder btn-warning text-uppercase" disabled="disabled">Belum Pengumuman</a>
                                    @elseif($registration_data->approval_status == 1)
                                        <a class="btn fw-bolder btn-success text-uppercase" disabled="disabled">Diterima</a>
                                    @elseif($registration_data->approval_status == 2)
                                        <a class="btn fw-bolder btn-danger text-uppercase" disabled="disabled">Tidak Diterima</a>
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
                                        <a class="btn fw-bolder btn-danger text-uppercase" disabled="disabled">Belum Mengisi</a>
                                    @elseif($registration_data->dapodik_status == 1)
                                        <a class="btn fw-bolder btn-warning text-uppercase" disabled="disabled">Belum Terverifikasi</a>
                                    @elseif($registration_data->dapodik_status == 2)
                                        <a class="btn fw-bolder btn-success text-uppercase" disabled="disabled">Terverifikasi</a>
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
                                        <a class="btn fw-bolder btn-danger text-uppercase" disabled="disabled">Belum Mengisi</a>
                                    @elseif($registration_data->payment_status == 1 && $registration_data->aggrement_status == 1)
                                        <a class="btn fw-bolder btn-warning text-uppercase" disabled="disabled">Terverifikasi</a>
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
                                        <a class="btn fw-bolder btn-danger text-uppercase" disabled="disabled">Belum Ada Data</a>
                                    @elseif($registration_data->uniform_status == 1 && $registration_data->book_status == 1)
                                        <a class="btn fw-bolder btn-warning text-uppercase" disabled="disabled">Terverifikasi</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @can($page_setting['grade_slug'] . '-registration-verification')
                            @if ($registration_data->approval_status == 0 && $registration_data->selection_status == 0)
                                @if ($registration_data->registration_status == 1)
                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$registration_data->unique_code, 2]) }}"
                                        class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                        Verifikasi Pendaftaran
                                    </a>
                                @elseif($registration_data->registration_status == 2)
                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$registration_data->unique_code, 1]) }}"
                                        class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                        Batal Verifikasi Pendaftaran
                                    </a>
                                @endif
                            @else
                                @if ($registration_data->registration_status == 1)
                                    <a href="#" class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">
                                        Verifikasi Pendaftaran
                                    </a>
                                @elseif($registration_data->registration_status == 2)
                                    <a href="#" class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">
                                        Batal Verifikasi Pendaftaran
                                    </a>
                                @endif
                            @endif
                        @endcan
                        @can($page_setting['grade_slug'] . '-selection-verification')
                            <hr class="my-1">
                            @if ($registration_data->approval_status == 0 && $registration_data->registration_status == 2)
                                @if ($registration_data->selection_status == 0)
                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$registration_data->unique_code, 1]) }}"
                                        class="btn btn-sm btn-success fw-bolder text-uppercase" onclick="verification(event)">
                                        {{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }} Sudah Dilakukan
                                    </a>
                                @elseif($registration_data->selection_status == 1)
                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$registration_data->unique_code, 0]) }}"
                                        class="btn btn-sm btn-danger fw-bolder text-uppercase" onclick="verification(event)">
                                        Batal Status {{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }}
                                    </a>
                                @endif
                            @else
                                @if ($registration_data->selection_status == 0)
                                    <a href="#" class="btn btn-sm btn-success fw-bolder text-uppercase disabled" aria-disabled="true">
                                        {{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }} Sudah Dilakukan
                                    </a>
                                @elseif($registration_data->selection_status == 1)
                                    <a href="#" class="btn btn-sm btn-danger fw-bolder text-uppercase disabled" aria-disabled="true">
                                        Batal Status {{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }}
                                    </a>
                                @endif
                            @endif
                        @endcan
                        @can($page_setting['grade_slug'] . '-approval-verification')
                            <hr class="my-1">
                            @if ($registration_data->registration_status == 2 && $registration_data->selection_status == 1)
                                @if ($registration_data->dapodik_status == 0 &&
                                    $registration_data->aggrement_status == 0 &&
                                    $registration_data->payment_status == 0 &&
                                    $registration_data->uniform_status == 0 &&
                                    $registration_data->book_status == 0)
                                    @if ($registration_data->approval_status == 0)
                                        <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration_data->unique_code, 1]) }}"
                                            class="btn btn-sm btn-success fw-bolder text-uppercase" onclick="verification(event)">
                                            Diterima
                                        </a>
                                        <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration_data->unique_code, 2]) }}"
                                            class="btn btn-sm btn-danger fw-bolder text-uppercase" onclick="verification(event)">
                                            Tidak Diterima
                                        </a>
                                    @elseif($registration_data->approval_status == 1)
                                        <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration_data->unique_code, 0]) }}"
                                            class="btn btn-sm btn-warning fw-bolder text-uppercase" onclick="verification(event)">
                                            Batal Penerimaan
                                        </a>
                                        <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration_data->unique_code, 2]) }}"
                                            class="btn btn-sm btn-danger fw-bolder text-uppercase" onclick="verification(event)">
                                            Tidak Diterima
                                        </a>
                                    @else
                                        <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration_data->unique_code, 0]) }}"
                                            class="btn btn-sm btn-warning fw-bolder text-uppercase" onclick="verification(event)">
                                            Batal Penerimaan
                                        </a>
                                        <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration_data->unique_code, 1]) }}"
                                            class="btn btn-sm btn-success fw-bolder text-uppercase" onclick="verification(event)">
                                            Diterima
                                        </a>
                                    @endif
                                @else
                                    @if ($registration_data->approval_status == 0)
                                        <a href="#" class="btn btn-sm btn-success fw-bolder text-uppercase disabled" aria-disabled="true">
                                            Diterima
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger fw-bolder text-uppercase disabled" aria-disabled="true">
                                            Tidak Diterima
                                        </a>
                                    @elseif($registration_data->approval_status == 1)
                                        <a href="#" class="btn btn-sm btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">
                                            Batal Penerimaan
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger fw-bolder text-uppercase disabled" aria-disabled="true">
                                            Tidak Diterima
                                        </a>
                                    @else
                                        <a href="#" class="btn btn-sm btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">
                                            Batal Penerimaan
                                        </a>
                                        <a href="#" class="btn btn-sm btn-success fw-bolder text-uppercase disabled" aria-disabled="true">
                                            Diterima
                                        </a>
                                    @endif
                                @endif
                            @else
                                @if ($registration_data->approval_status == 0)
                                    <a href="#" class="btn btn-sm btn-success fw-bolder text-uppercase disabled" aria-disabled="true">
                                        Diterima
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger fw-bolder text-uppercase disabled" aria-disabled="true">
                                        Tidak Diterima
                                    </a>
                                @elseif($registration_data->approval_status == 1)
                                    <a href="#" class="btn btn-sm btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">
                                        Batal Penerimaan
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger fw-bolder text-uppercase disabled" aria-disabled="true">
                                        Tidak Diterima
                                    </a>
                                @else
                                    <a href="#" class="btn btn-sm btn-warning fw-bolder text-uppercase disabled" aria-disabled="true">
                                        Batal Penerimaan
                                    </a>
                                    <a href="#" class="btn btn-sm btn-success fw-bolder text-uppercase disabled" aria-disabled="true">
                                        Diterima
                                    </a>
                                @endif
                            @endif
                        @endcan
                        <hr class="my-1">
                        @can($page_setting['grade_slug'] . '-registration-report')
                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.download-pdf', $registration_data->unique_code) }}"
                                class="btn btn-secondary fw-bolder text-uppercase" target="__blank">
                                Download PDF
                            </a>
                        @endcan
                        @can($page_setting['grade_slug'] . '-registration-edit')
                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.edit', $registration_data->unique_code) }}" class="btn btn-warning fw-bolder text-uppercase">
                                Ubah Data Pendaftaran
                            </a>
                        @endcan
                        @can($page_setting['grade_slug'] . '-registration-delete')
                            <form action="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.destroy', $registration_data->unique_code) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <div class="d-grid">
                                    @if ($registration_data->dapodik_status == 0 &&
                                        $registration_data->aggrement_status == 0 &&
                                        $registration_data->payment_status == 0 &&
                                        $registration_data->uniform_status == 0 &&
                                        $registration_data->book_status == 0)
                                        <button type="button" id="button-delete" class="btn btn-danger fw-bolder text-uppercase" title="HAPUS DATA">
                                            Hapus Data Pendaftaran
                                        </button>
                                    @else
                                        <button type="button" id="button-delete" class="btn btn-danger fw-bolder text-uppercase" title="HAPUS DATA" disabled>
                                            Hapus Data Pendaftaran
                                        </button>
                                    @endif
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
