@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $page_setting['grade'] }} Admin Management</li>
            <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">DATA SISWA</h3>
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
                            <a class="nav-link fw-bolder text-uppercase" id="not-have-line-tab" data-bs-toggle="tab" href="#not-have" role="tab" aria-controls="not-have" aria-selected="false">
                                Belum Mengisi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-uppercase" id="not-verified-line-tab" data-bs-toggle="tab" href="#not-verified" role="tab" aria-controls="not-verified"
                                aria-selected="false">
                                Belum Terverifikasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-uppercase" id="verified-line-tab" data-bs-toggle="tab" href="#verified" role="tab" aria-controls="verified" aria-selected="false">
                                Terverifikasi
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
                                            <th width="50px">Data Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_dapodik as $dapodik)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dapodik->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.show', $dapodik->unique_code) }}">
                                                        {{ $dapodik->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $dapodik->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($dapodik->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($dapodik->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $dapodik->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dapodik->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-dapodik-verification'))
                                                        @if ($dapodik->approval_status == 1 && $dapodik->dapodik_status != 0)
                                                            @if ($dapodik->dapodik_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$dapodik->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @else
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$dapodik->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($dapodik->dapodik_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Mengisi</span>
                                                            @elseif ($dapodik->dapodik_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($dapodik->dapodik_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($dapodik->dapodik_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Mengisi</span>
                                                        @elseif ($dapodik->dapodik_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($dapodik->dapodik_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="not-have" role="tabpanel" aria-labelledby="not-have-line-tab">
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
                                            <th width="50px">Data Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($not_have_dapodik as $nh_dapodik)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $nh_dapodik->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.show', $nh_dapodik->unique_code) }}">
                                                        {{ $nh_dapodik->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $nh_dapodik->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($nh_dapodik->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($nh_dapodik->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $nh_dapodik->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $nh_dapodik->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-dapodik-verification'))
                                                        @if ($nh_dapodik->approval_status == 1 && $nh_dapodik->dapodik_status != 0)
                                                            @if ($nh_dapodik->dapodik_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$nh_dapodik->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @else
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$nh_dapodik->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($nh_dapodik->dapodik_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Mengisi</span>
                                                            @elseif ($nh_dapodik->dapodik_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($nh_dapodik->dapodik_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($nh_dapodik->dapodik_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Mengisi</span>
                                                        @elseif ($nh_dapodik->dapodik_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($nh_dapodik->dapodik_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
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
                                            <th width="50px">Data Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($not_verified_dapodik as $nv_dapodik)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $nv_dapodik->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.show', $nv_dapodik->unique_code) }}">
                                                        {{ $nv_dapodik->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $nv_dapodik->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($nv_dapodik->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($nv_dapodik->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $nv_dapodik->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $nv_dapodik->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-dapodik-verification'))
                                                        @if ($nv_dapodik->approval_status == 1 && $nv_dapodik->dapodik_status != 0)
                                                            @if ($nv_dapodik->dapodik_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$nv_dapodik->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @else
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$nv_dapodik->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($nv_dapodik->dapodik_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Mengisi</span>
                                                            @elseif ($nv_dapodik->dapodik_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($nv_dapodik->dapodik_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($nv_dapodik->dapodik_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Mengisi</span>
                                                        @elseif ($nv_dapodik->dapodik_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($nv_dapodik->dapodik_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
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
                                            <th width="50px">Data Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($verified_dapodik as $v_dapodik)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $v_dapodik->registration_code }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.show', $v_dapodik->unique_code) }}">
                                                        {{ $v_dapodik->full_name }}
                                                    </a>
                                                </td>
                                                <td>TA {{ $v_dapodik->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($v_dapodik->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($v_dapodik->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $v_dapodik->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v_dapodik->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-dapodik-verification'))
                                                        @if ($v_dapodik->approval_status == 1 && $v_dapodik->dapodik_status != 0)
                                                            @if ($v_dapodik->dapodik_status == 1)
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$v_dapodik->unique_code, 2]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="verification(event)">
                                                                    Belum Terverifikasi
                                                                </a>
                                                            @else
                                                                <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.dapodik-verification', [$v_dapodik->unique_code, 1]) }}"
                                                                    class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                    Terverifikasi
                                                                </a>
                                                            @endif
                                                        @else
                                                            @if ($v_dapodik->dapodik_status == 0)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Mengisi</span>
                                                            @elseif ($v_dapodik->dapodik_status == 1)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                            @elseif($v_dapodik->dapodik_status == 2)
                                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($v_dapodik->dapodik_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Mengisi</span>
                                                        @elseif ($v_dapodik->dapodik_status == 1)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                                        @elseif($v_dapodik->dapodik_status == 2)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
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
