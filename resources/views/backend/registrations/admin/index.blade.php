@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $page_setting['grade'] }} Admin Management</li>
            <li class="breadcrumb-item active" aria-current="page">Data Pendaftaran</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">DATA PENDAFTARAN {{ $page_setting['grade'] != 'TBTK' ? '[' . $page_setting['path'] . ']' : '' }}</h3>
        </div>
        <div class="d-flex align-items-center text-nowrap flex-wrap">
            @can($page_setting['grade_slug'] . '-registration-report')
                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.reports') }}" class="btn btn-secondary btn-icon-text mb-md-0 fw-bolder me-2 mb-2">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print Laporan
                </a>
            @endcan
            @can($page_setting['grade_slug'] . '-registration-delete')
                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.deleted-data') }}" class="btn btn-danger btn-icon-text mb-md-0 fw-bolder mb-2">
                    <i class="btn-icon-prepend" data-feather="trash-2"></i>
                    Data Dihapus
                </a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-line nav-fill" id="lineTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-uppercase active" id="all-line-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">
                                Semua Data
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-uppercase" id="not-verified-line-tab" data-bs-toggle="tab" href="#not-verified" role="tab" aria-controls="not-verified"
                                aria-selected="false">
                                Belum Verifikasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-uppercase" id="verified-line-tab" data-bs-toggle="tab" href="#verified" role="tab" aria-controls="verified" aria-selected="false">
                                Terverifikasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-uppercase" id="diterima-line-tab" data-bs-toggle="tab" href="#diterima" role="tab" aria-controls="diterima" aria-selected="false">
                                Diterima
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-uppercase" id="tidak-diterima-line-tab" data-bs-toggle="tab" href="#tidak-diterima" role="tab" aria-controls="tidak-diterima"
                                aria-selected="false">
                                Tidak Diterima
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="lineTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-line-tab">
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th width="10px">No</th>
                                            <th width="50px">Kode Pendaftaran</th>
                                            <th>Nama Lengkap</th>
                                            <th width="50px">Tahun</th>
                                            <th width="50px">Tingkat</th>
                                            <th width="50px">Tanggal Daftar</th>
                                            <th width="50px">Pendaftaran</th>
                                            <th width="50px">{{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }}</th>
                                            <th width="50px">Penerimaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($registrations as $registration)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $registration->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.show', $registration->unique_code) }}">
                                                        {{ $registration->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $registration->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($registration->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($registration->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $registration->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $registration->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-registration-verification'))
                                                        @if ($registration->approval_status == 0 && $registration->selection_status == 0)
                                                            @if ($registration->registration_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$registration->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @elseif($registration->registration_status == 2)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($registration->registration_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($registration->registration_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($registration->registration_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($registration->registration_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-selection-verification'))
                                                        @if ($registration->registration_status == 2 && $registration->approval_status == 0)
                                                            @if ($registration->selection_status == 0)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-danger" onclick="verification(event)">
                                                                    Belum Dilakukan
                                                                </a>
                                                            @elseif($registration->selection_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$registration->unique_code, 0]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Sudah Dilakukan
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($registration->selection_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                            @elseif($registration->selection_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($registration->selection_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                        @elseif($registration->selection_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-approval-verification'))
                                                        @if ($registration->registration_status == 2 && $registration->selection_status == 1)
                                                            @if ($registration->dapodik_status == 0 && $registration->aggrement_status == 0 && $registration->payment_status == 0 && $registration->uniform_status == 0 && $registration->book_status == 0)
                                                                <div class="btn-group" role="group">
                                                                    @if ($registration->approval_status == 0)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-warning dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Belum Pengumuman
                                                                        </button>
                                                                    @elseif($registration->approval_status == 1)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-success dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Diterima
                                                                        </button>
                                                                    @else
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-danger dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Tidak Diterima
                                                                        </button>
                                                                    @endif
                                                                    <div class="dropdown-menu" aria-labelledby="selectionGroup1">
                                                                        @if ($registration->approval_status == 0)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @elseif($registration->approval_status == 1)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if ($registration->approval_status == 0)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                                @elseif($registration->approval_status == 1)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                                @else
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if ($registration->approval_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                            @elseif($registration->approval_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                            @else
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($registration->approval_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                        @elseif($registration->approval_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                        @else
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="not-verified" role="tabpanel" aria-labelledby="not-verified-line-tab">
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th width="10px">No</th>
                                            <th width="50px">Kode Pendaftaran</th>
                                            <th>Nama Lengkap</th>
                                            <th width="50px">Tahun</th>
                                            <th width="50px">Tingkat</th>
                                            <th width="50px">Tanggal Daftar</th>
                                            <th width="50px">Pendaftaran</th>
                                            <th width="50px">{{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }}</th>
                                            <th width="50px">Penerimaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($not_verified_registrations as $nv_registration)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $nv_registration->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.show', $nv_registration->unique_code) }}">
                                                        {{ $nv_registration->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $nv_registration->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($nv_registration->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($nv_registration->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $nv_registration->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $nv_registration->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-registration-verification'))
                                                        @if ($nv_registration->approval_status == 0 && $nv_registration->selection_status == 0)
                                                            @if ($nv_registration->registration_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$nv_registration->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @elseif($nv_registration->registration_status == 2)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$nv_registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($nv_registration->registration_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($nv_registration->registration_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($nv_registration->registration_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($nv_registration->registration_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-selection-verification'))
                                                        @if ($nv_registration->registration_status == 2 && $nv_registration->approval_status == 0)
                                                            @if ($nv_registration->selection_status == 0)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$nv_registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Dilakukan
                                                                </a>
                                                            @elseif($nv_registration->selection_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$nv_registration->unique_code, 0]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Sudah Dilakukan
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($nv_registration->selection_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                            @elseif($nv_registration->selection_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($nv_registration->selection_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                        @elseif($nv_registration->selection_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-approval-verification'))
                                                        @if ($nv_registration->registration_status == 2 && $nv_registration->selection_status == 1)
                                                            @if ($nv_registration->dapodik_status == 0 &&
                                                                $nv_registration->aggrement_status == 0 &&
                                                                $nv_registration->payment_status == 0 &&
                                                                $nv_registration->uniform_status == 0 &&
                                                                $nv_registration->book_status == 0)
                                                                <div class="btn-group" role="group">
                                                                    @if ($nv_registration->approval_status == 0)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-warning dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Belum Pengumuman
                                                                        </button>
                                                                    @elseif($nv_registration->approval_status == 1)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-success dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Diterima
                                                                        </button>
                                                                    @else
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-danger dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Tidak Diterima
                                                                        </button>
                                                                    @endif
                                                                    <div class="dropdown-menu" aria-labelledby="selectionGroup1">
                                                                        @if ($nv_registration->approval_status == 0)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$nv_registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$nv_registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @elseif($nv_registration->approval_status == 1)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$nv_registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$nv_registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$nv_registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$nv_registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if ($nv_registration->approval_status == 0)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                                @elseif($nv_registration->approval_status == 1)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                                @else
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if ($nv_registration->approval_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                            @elseif($nv_registration->approval_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                            @else
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($nv_registration->approval_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                        @elseif($nv_registration->approval_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                        @else
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="verified" role="tabpanel" aria-labelledby="verified-line-tab">
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th width="10px">No</th>
                                            <th width="50px">Kode Pendaftaran</th>
                                            <th>Nama Lengkap</th>
                                            <th width="50px">Tahun</th>
                                            <th width="50px">Tingkat</th>
                                            <th width="50px">Tanggal Daftar</th>
                                            <th width="50px">Pendaftaran</th>
                                            <th width="50px">{{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }}</th>
                                            <th width="50px">Penerimaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($verified_registrations as $v_registration)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $v_registration->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.show', $v_registration->unique_code) }}">
                                                        {{ $v_registration->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $v_registration->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($v_registration->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($v_registration->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $v_registration->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v_registration->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-registration-verification'))
                                                        @if ($v_registration->approval_status == 0 && $v_registration->selection_status == 0)
                                                            @if ($v_registration->registration_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$v_registration->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @elseif($v_registration->registration_status == 2)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$v_registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($v_registration->registration_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($v_registration->registration_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($v_registration->registration_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($v_registration->registration_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-selection-verification'))
                                                        @if ($v_registration->registration_status == 2 && $v_registration->approval_status == 0)
                                                            @if ($v_registration->selection_status == 0)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$v_registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Dilakukan
                                                                </a>
                                                            @elseif($v_registration->selection_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$v_registration->unique_code, 0]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Sudah Dilakukan
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($v_registration->selection_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                            @elseif($v_registration->selection_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($v_registration->selection_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                        @elseif($v_registration->selection_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-approval-verification'))
                                                        @if ($v_registration->registration_status == 2 && $v_registration->selection_status == 1)
                                                            @if ($v_registration->dapodik_status == 0 &&
                                                                $v_registration->aggrement_status == 0 &&
                                                                $v_registration->payment_status == 0 &&
                                                                $v_registration->uniform_status == 0 &&
                                                                $v_registration->book_status == 0)
                                                                <div class="btn-group" role="group">
                                                                    @if ($v_registration->approval_status == 0)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-warning dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Belum Pengumuman
                                                                        </button>
                                                                    @elseif($v_registration->approval_status == 1)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-success dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Diterima
                                                                        </button>
                                                                    @else
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-danger dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Tidak Diterima
                                                                        </button>
                                                                    @endif
                                                                    <div class="dropdown-menu" aria-labelledby="selectionGroup1">
                                                                        @if ($v_registration->approval_status == 0)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$v_registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$v_registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @elseif($v_registration->approval_status == 1)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$v_registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$v_registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$v_registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$v_registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if ($v_registration->approval_status == 0)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                                @elseif($v_registration->approval_status == 1)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                                @else
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if ($v_registration->approval_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                            @elseif($v_registration->approval_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                            @else
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($v_registration->approval_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                        @elseif($v_registration->approval_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                        @else
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="diterima" role="tabpanel" aria-labelledby="diterima-line-tab">
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th width="10px">No</th>
                                            <th width="50px">Kode Pendaftaran</th>
                                            <th>Nama Lengkap</th>
                                            <th width="50px">Tahun</th>
                                            <th width="50px">Tingkat</th>
                                            <th width="50px">Tanggal Daftar</th>
                                            <th width="50px">Pendaftaran</th>
                                            <th width="50px">{{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }}</th>
                                            <th width="50px">Penerimaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diterima_registrations as $diterima_registration)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $diterima_registration->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.show', $diterima_registration->unique_code) }}">
                                                        {{ $diterima_registration->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $diterima_registration->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($diterima_registration->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($diterima_registration->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $diterima_registration->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $diterima_registration->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-registration-verification'))
                                                        @if ($diterima_registration->approval_status == 0 && $diterima_registration->selection_status == 0)
                                                            @if ($diterima_registration->registration_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$diterima_registration->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @elseif($diterima_registration->registration_status == 2)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$diterima_registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($diterima_registration->registration_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($diterima_registration->registration_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($diterima_registration->registration_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($diterima_registration->registration_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-selection-verification'))
                                                        @if ($diterima_registration->registration_status == 2 && $diterima_registration->approval_status == 0)
                                                            @if ($diterima_registration->selection_status == 0)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$diterima_registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Dilakukan
                                                                </a>
                                                            @elseif($diterima_registration->selection_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$diterima_registration->unique_code, 0]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Sudah Dilakukan
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($diterima_registration->selection_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                            @elseif($diterima_registration->selection_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($diterima_registration->selection_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                        @elseif($diterima_registration->selection_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-approval-verification'))
                                                        @if ($diterima_registration->registration_status == 2 && $diterima_registration->selection_status == 1)
                                                            @if ($diterima_registration->dapodik_status == 0 &&
                                                                $diterima_registration->aggrement_status == 0 &&
                                                                $diterima_registration->payment_status == 0 &&
                                                                $diterima_registration->uniform_status == 0 &&
                                                                $diterima_registration->book_status == 0)
                                                                <div class="btn-group" role="group">
                                                                    @if ($diterima_registration->approval_status == 0)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-warning dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Belum Pengumuman
                                                                        </button>
                                                                    @elseif($diterima_registration->approval_status == 1)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-success dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Diterima
                                                                        </button>
                                                                    @else
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-danger dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Tidak Diterima
                                                                        </button>
                                                                    @endif
                                                                    <div class="dropdown-menu" aria-labelledby="selectionGroup1">
                                                                        @if ($diterima_registration->approval_status == 0)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$diterima_registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$diterima_registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @elseif($diterima_registration->approval_status == 1)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$diterima_registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$diterima_registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$diterima_registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$diterima_registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if ($diterima_registration->approval_status == 0)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                                @elseif($diterima_registration->approval_status == 1)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                                @else
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if ($diterima_registration->approval_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                            @elseif($diterima_registration->approval_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                            @else
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($diterima_registration->approval_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                        @elseif($diterima_registration->approval_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                        @else
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tidak-diterima" role="tabpanel" aria-labelledby="tidak-diterima-line-tab">
                            <div class="table-responsive">
                                <table class="table-hover table-striped table-bordered display table">
                                    <thead>
                                        <tr>
                                            <th width="10px">No</th>
                                            <th width="50px">Kode Pendaftaran</th>
                                            <th>Nama Lengkap</th>
                                            <th width="50px">Tahun</th>
                                            <th width="50px">Tingkat</th>
                                            <th width="50px">Tanggal Daftar</th>
                                            <th width="50px">Pendaftaran</th>
                                            <th width="50px">{{ $page_setting['grade'] == 'SMP' ? 'Wawancara' : 'Observasi' }}</th>
                                            <th width="50px">Penerimaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tidak_diterima_registrations as $tidak_diterima_registration)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tidak_diterima_registration->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.show', $tidak_diterima_registration->unique_code) }}">
                                                        {{ $tidak_diterima_registration->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $tidak_diterima_registration->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($tidak_diterima_registration->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($tidak_diterima_registration->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $tidak_diterima_registration->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tidak_diterima_registration->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-registration-verification'))
                                                        @if ($tidak_diterima_registration->approval_status == 0 && $tidak_diterima_registration->selection_status == 0)
                                                            @if ($tidak_diterima_registration->registration_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$tidak_diterima_registration->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @elseif($tidak_diterima_registration->registration_status == 2)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.registration-verification', [$tidak_diterima_registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($tidak_diterima_registration->registration_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($tidak_diterima_registration->registration_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($tidak_diterima_registration->registration_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($tidak_diterima_registration->registration_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-selection-verification'))
                                                        @if ($tidak_diterima_registration->registration_status == 2 && $tidak_diterima_registration->approval_status == 0)
                                                            @if ($tidak_diterima_registration->selection_status == 0)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$tidak_diterima_registration->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Dilakukan
                                                                </a>
                                                            @elseif($tidak_diterima_registration->selection_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.selection-verification', [$tidak_diterima_registration->unique_code, 0]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Sudah Dilakukan
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($tidak_diterima_registration->selection_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                            @elseif($tidak_diterima_registration->selection_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($tidak_diterima_registration->selection_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                                        @elseif($tidak_diterima_registration->selection_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-approval-verification'))
                                                        @if ($tidak_diterima_registration->registration_status == 2 && $tidak_diterima_registration->selection_status == 1)
                                                            @if ($tidak_diterima_registration->dapodik_status == 0 &&
                                                                $tidak_diterima_registration->aggrement_status == 0 &&
                                                                $tidak_diterima_registration->payment_status == 0 &&
                                                                $tidak_diterima_registration->uniform_status == 0 &&
                                                                $tidak_diterima_registration->book_status == 0)
                                                                <div class="btn-group" role="group">
                                                                    @if ($tidak_diterima_registration->approval_status == 0)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-warning dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Belum Pengumuman
                                                                        </button>
                                                                    @elseif($tidak_diterima_registration->approval_status == 1)
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-success dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Diterima
                                                                        </button>
                                                                    @else
                                                                        <button id="selectionGroup1" type="button" class="btn btn-sm fw-bolder text-uppercase btn-danger dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Tidak Diterima
                                                                        </button>
                                                                    @endif
                                                                    <div class="dropdown-menu" aria-labelledby="selectionGroup1">
                                                                        @if ($tidak_diterima_registration->approval_status == 0)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$tidak_diterima_registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$tidak_diterima_registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @elseif($tidak_diterima_registration->approval_status == 1)
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$tidak_diterima_registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$tidak_diterima_registration->unique_code, 2]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Tidak Diterima
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$tidak_diterima_registration->unique_code, 0]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Batal Pengumuman
                                                                            </a>
                                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.approval-verification', [$tidak_diterima_registration->unique_code, 1]) }}"
                                                                                class="dropdown-item fw-bolder text-uppercase" onclick="verification(event)">
                                                                                Diterima
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if ($tidak_diterima_registration->approval_status == 0)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                                @elseif($tidak_diterima_registration->approval_status == 1)
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                                @else
                                                                    <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if ($tidak_diterima_registration->approval_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                            @elseif($tidak_diterima_registration->approval_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                            @else
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($tidak_diterima_registration->approval_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Pengumuman</span>
                                                        @elseif($tidak_diterima_registration->approval_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                                        @else
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugins-js')
    <script src="{{ asset('vendor/data-tables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/data-tables/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('customs-js')
    <script>
        $(document).ready(function() {
            $("table.display").DataTable({
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"],
                ],
                iDisplayLength: 10,
                language: {
                    search: "",
                },
            });
            $("table.display").each(function() {
                var datatable = $(this);
                var search_input = datatable
                    .closest(".dataTables_wrapper")
                    .find("div[id$=_filter] input");
                search_input.attr("placeholder", "Search");
                search_input.removeClass("form-control-sm");
                var length_sel = datatable
                    .closest(".dataTables_wrapper")
                    .find("div[id$=_length] select");
                length_sel.removeClass("form-control-sm");
            });
        });
    </script>
@endpush
