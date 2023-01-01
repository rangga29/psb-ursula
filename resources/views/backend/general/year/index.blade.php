@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/data-tables/dataTables.bootstrap5.css') }}">
@endpush


@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">General Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Year Setting</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">YEAR SETTING</h3>
        </div>
        <div class="d-flex align-items-center text-nowrap flex-wrap">
            <a href="{{ route('dashboard.general.year.create') }}" class="btn btn-primary btn-icon-text mb-md-0 me-2 fw-bolder mb-2">
                <i class="btn-icon-prepend" data-feather="file-plus"></i>
                Tambah Data
            </a>
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
                                    <th>No</th>
                                    <th>Kode Tahun</th>
                                    <th>Nama Tahun</th>
                                    <th width="50px">Tahun PSB</th>
                                    <th width="50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($years as $year)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $year->code }}</td>
                                        <td>{{ $year->name }}</td>
                                        <td>
                                            @if ($year->isMainYear == 0)
                                                <a href="{{ route('dashboard.general.year.change-main-year', $year->id) }}" class="btn btn-primary btn-sm fw-bolder text-uppercase"
                                                    title="Ubah Jadi Tahun Utama" onclick="editData(event)">
                                                    Ubah Jadi Tahun Utama
                                                </a>
                                            @else
                                                <span class="btn btn-primary btn-sm fw-bolder text-uppercase disabled" title="Tahun Utama" aria-disabled="true">
                                                    Tahun Utama
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.general.year.edit', $year->id) }}" class="btn btn-warning btn-icon btn-sm" title="UBAH DATA">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="{{ route('dashboard.general.year.destroy', $year->id) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" id="button-delete" class="btn btn-danger btn-icon btn-sm" title="HAPUS DATA">
                                                    <i data-feather="x-square"></i>
                                                </button>
                                            </form>
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
