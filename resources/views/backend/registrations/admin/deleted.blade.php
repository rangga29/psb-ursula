@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $page_setting['grade'] }} Admin Management</li>
            <li class="breadcrumb-item">Data Pendaftaran</li>
            <li class="breadcrumb-item active" aria-current="page">Data Dihapus</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">DATA DIHAPUS</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
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
                                    <th width="50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delete_registrations as $delete_registration)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $delete_registration->registration_code }}</td>
                                        <td>{{ $delete_registration->full_name }}</td>
                                        <td>TA {{ $delete_registration->registration_year->name }}</td>
                                        <td>
                                            @if ($page_setting['grade'] == 'TBTK')
                                                @if ($delete_registration->register_grade == 1)
                                                    Kelas TB
                                                @elseif($delete_registration->register_grade == 2)
                                                    Kelas TK A
                                                @else
                                                    Kelas TK B
                                                @endif
                                            @else
                                                Kelas {{ $delete_registration->register_grade }}
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $delete_registration->created_at)->isoFormat('DD MMMM Y HH:MM') }}</td>
                                        <td>
                                            @if ($delete_registration->registration_status == 1)
                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Terverifikasi</span>
                                            @elseif($delete_registration->registration_status == 2)
                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($delete_registration->selection_status == 0)
                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Belum Dilakukan</span>
                                            @elseif($delete_registration->selection_status == 1)
                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Sudah Dilakukan</span>
                                            @else
                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Terverifikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($delete_registration->approval_status == 0)
                                                <span class="btn btn-sm fw-bolder text-uppercase btn-warning disabled" aria-disabled="true">Belum Ada</span>
                                            @elseif($delete_registration->approval_status == 1)
                                                <span class="btn btn-sm fw-bolder text-uppercase btn-success disabled" aria-disabled="true">Diterima</span>
                                            @else
                                                <span class="btn btn-sm fw-bolder text-uppercase btn-danger disabled" aria-disabled="true">Tidak Diterima</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.registration.restore', $delete_registration->unique_code) }}"
                                                class="btn btn-sm fw-bolder text-uppercase btn-warning" onclick="restore(event)">
                                                Kembalikan Data
                                            </a>
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
