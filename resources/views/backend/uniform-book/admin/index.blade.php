@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $page_setting['grade'] }} Admin Management</li>
            <li class="breadcrumb-item active" aria-current="page">Data Pembelajaran</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">DATA PEMBELAJARAN</h3>
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
                                Belum Ada Data
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
                                            <th width="50px">Status Seragam</th>
                                            <th width="50px">Status Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uniform_book as $ub)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $ub->registration_code }}</td>
                                                <td>{{ $ub->full_name }}</td>
                                                <td>TA {{ $ub->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($ub->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($ub->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $ub->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ub->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-uniform-verification'))
                                                        @if ($ub->uniform_status == 0)
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.uniform-verification', [$ub->unique_code, 1]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-danger" onclick="verification(event)">
                                                                Belum Ada Data
                                                            </a>
                                                        @else
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.uniform-verification', [$ub->unique_code, 0]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                Terverifikasi
                                                            </a>
                                                        @endif
                                                    @else
                                                        @if ($ub->uniform_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Ada Data</span>
                                                        @else
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-book-verification'))
                                                        @if ($ub->book_status == 0)
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.book-verification', [$ub->unique_code, 1]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-danger" onclick="verification(event)">
                                                                Belum Ada Data
                                                            </a>
                                                        @else
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.book-verification', [$ub->unique_code, 0]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                Terverifikasi
                                                            </a>
                                                        @endif
                                                    @else
                                                        @if ($ub->book_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Ada Data</span>
                                                        @else
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
                                            <th width="50px">Status Seragam</th>
                                            <th width="50px">Status Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($not_have_uniform_book as $nv_ub)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $nv_ub->registration_code }}</td>
                                                <td>{{ $nv_ub->full_name }}</td>
                                                <td>TA {{ $nv_ub->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($nv_ub->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($nv_ub->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $nv_ub->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $nv_ub->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-uniform-verification'))
                                                        @if ($nv_ub->uniform_status == 0)
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.uniform-verification', [$nv_ub->unique_code, 1]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-danger" onclick="verification(event)">
                                                                Belum Ada Data
                                                            </a>
                                                        @else
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.uniform-verification', [$nv_ub->unique_code, 0]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                Terverifikasi
                                                            </a>
                                                        @endif
                                                    @else
                                                        @if ($nv_ub->uniform_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Ada Data</span>
                                                        @else
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-book-verification'))
                                                        @if ($nv_ub->book_status == 0)
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.book-verification', [$nv_ub->unique_code, 1]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-danger" onclick="verification(event)">
                                                                Belum Ada Data
                                                            </a>
                                                        @else
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.book-verification', [$nv_ub->unique_code, 0]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                Terverifikasi
                                                            </a>
                                                        @endif
                                                    @else
                                                        @if ($nv_ub->book_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Ada Data</span>
                                                        @else
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
                                            <th width="50px">Status Seragam</th>
                                            <th width="50px">Status Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($verified_uniform_book as $v_ub)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $v_ub->registration_code }}</td>
                                                <td>{{ $v_ub->full_name }}</td>
                                                <td>TA {{ $v_ub->registration_year->name }}</td>
                                                <td>
                                                    @if ($page_setting['grade'] == 'TBTK')
                                                        @if ($v_ub->register_grade == 1)
                                                            Kelas TB
                                                        @elseif($v_ub->register_grade == 2)
                                                            Kelas TK A
                                                        @else
                                                            Kelas TK B
                                                        @endif
                                                    @else
                                                        Kelas {{ $v_ub->register_grade }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v_ub->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-uniform-verification'))
                                                        @if ($v_ub->uniform_status == 0)
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.uniform-verification', [$v_ub->unique_code, 1]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-danger" onclick="verification(event)">
                                                                Belum Ada Data
                                                            </a>
                                                        @else
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.uniform-verification', [$v_ub->unique_code, 0]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                Terverifikasi
                                                            </a>
                                                        @endif
                                                    @else
                                                        @if ($v_ub->uniform_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Ada Data</span>
                                                        @else
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->hasPermissionTo($page_setting['grade_slug'] . '-book-verification'))
                                                        @if ($v_ub->book_status == 0)
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.book-verification', [$v_ub->unique_code, 1]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-danger" onclick="verification(event)">
                                                                Belum Ada Data
                                                            </a>
                                                        @else
                                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.uniform-book.book-verification', [$v_ub->unique_code, 0]) }}"
                                                                class="btn btn-sm fw-bolder text-uppercase btn-success" onclick="verification(event)">
                                                                Terverifikasi
                                                            </a>
                                                        @endif
                                                    @else
                                                        @if ($v_ub->book_status == 0)
                                                            <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Ada Data</span>
                                                        @else
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
