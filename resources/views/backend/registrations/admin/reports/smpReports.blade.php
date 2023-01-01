@extends('backend.layouts.master')

@push('plugins-css')
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">SMP Admin Management</li>
            <li class="breadcrumb-item">Data Pendaftaran</li>
            <li class="breadcrumb-item active" aria-current="page">Print Laporan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">Print Laporan</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12 grid-margin">
            <div class="card mb-3">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-line nav-fill" id="lineTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-bolder" id="alldata-line-tab" data-bs-toggle="tab" href="#alldata" role="tab" aria-controls="alldata" aria-selected="true">SEMUA DATA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder" id="separatedata-line-tab" data-bs-toggle="tab" href="#separatedata" role="tab" aria-controls="separatedata" aria-selected="false">
                                DATA TERTENTU (TANGGAL PENDAFTARAN)
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="lineTabContent">
                        <div class="tab-pane fade show active" id="alldata" role="tabpanel" aria-labelledby="alldata-line-tab">
                            <ul class="nav nav-tabs nav-tabs-line nav-fill" id="lineTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-bolder" id="allexcel-line-tab" data-bs-toggle="tab" href="#allexcel" role="tab" aria-controls="allexcel" aria-selected="true">EXCEL</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" id="allpdf-line-tab" data-bs-toggle="tab" href="#allpdf" role="tab" aria-controls="allpdf" aria-selected="false">PDF</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="lineTabContent">
                                <div class="tab-pane fade show active" id="allexcel" role="tabpanel" aria-labelledby="allexcel-line-tab">
                                    <form action="{{ route('dashboard.smp.admin.registration.reports.all-excel') }}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="all_excel_path" class="col-sm-2 col-form-label fw-bolder text-uppercase">Jalur Pendaftaran</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="all_excel_path" id="all_excel_path" data-width="100%">
                                                    <option value="0" selected>Semua Jalur</option>
                                                    <option value="Internal">Jalur Internal</option>
                                                    <option value="External">Jalur External</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="all_excel_year" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tahun Mendaftar</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="all_excel_year" id="all_excel_year" data-width="100%">
                                                    <option value="0" selected>Semua Tahun Pelajaran</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">Tahun Pelajaran {{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="all_excel_grade" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tingkat Mendaftar</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="all_excel_grade" id="all_excel_grade" data-width="100%">
                                                    <option value="0" selected>Semua Kelas</option>
                                                    <option value="7">Kelas 7</option>
                                                    <option value="8">Kelas 8</option>
                                                    <option value="9">Kelas 9</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="all_excel_filter" class="col-sm-2 col-form-label fw-bolder text-uppercase">Filter Data</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="all_excel_filter" id="all_excel_filter" data-width="100%">
                                                    <option value="filter-all" selected>Semua Data</option>
                                                    <option value="filter-not-verified">Filter : Belum Terverifikasi</option>
                                                    <option value="filter-verified">Filter : Terverifikasi</option>
                                                    <option value="filter-diterima">Filter : Diterima</option>
                                                    <option value="filter-tidak-diterima">Filter : Tidak Diterima</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="options" class="col-sm-2 col-form-label fw-bolder text-uppercase">Pilihan Kolom</label>
                                            <div class="col-sm-10">
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="all_column" id="all_column" value="0">
                                                        <input type="checkbox" class="form-check-input" name="all_column" id="allexcel-all-column" value="1">
                                                        <label class="form-check-label" for="allexcel-all-column">
                                                            <span class="fw-bolder">Semua Kolom</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_code" id="registration_code" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_code" id="allexcel-registration-code" value="1">
                                                        <label class="form-check-label" for="allexcel-registration-code">
                                                            Kode Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="virtual_code" id="virtual_code" value="0">
                                                        <input type="checkbox" class="form-check-input" name="virtual_code" id="allexcel-virtual-code" value="1">
                                                        <label class="form-check-label" for="allexcel-virtual-code">
                                                            Kode Virtual
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_path" id="registration_path" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_path" id="allexcel-registration-path" value="1">
                                                        <label class="form-check-label" for="allexcel-registration-path">
                                                            Jalur Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="full_name" id="full_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="full_name" id="allexcel-full-name" value="1">
                                                        <label class="form-check-label" for="allexcel-full-name">
                                                            Nama Lengkap
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="nick_name" id="nick_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="nick_name" id="allexcel-nick-name" value="1">
                                                        <label class="form-check-label" for="allexcel-nick-name">
                                                            Nama Panggilan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="birth_town" id="birth_town" value="0">
                                                        <input type="checkbox" class="form-check-input" name="birth_town" id="allexcel-birth-town" value="1">
                                                        <label class="form-check-label" for="allexcel-birth-town">
                                                            Kota Kelahiran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="birth_date" id="birth_date" value="0">
                                                        <input type="checkbox" class="form-check-input" name="birth_date" id="allexcel-birth-date" value="1">
                                                        <label class="form-check-label" for="allexcel-birth-date">
                                                            Tanggal Lahir
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="origin_school" id="origin_school" value="0">
                                                        <input type="checkbox" class="form-check-input" name="origin_school" id="allexcel-origin-school" value="1">
                                                        <label class="form-check-label" for="allexcel-origin-school">
                                                            Asal Sekolah
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="gender" id="gender" value="0">
                                                        <input type="checkbox" class="form-check-input" name="gender" id="allexcel-gender" value="1">
                                                        <label class="form-check-label" for="allexcel-gender">
                                                            Jenis Kelamin
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="register_year" id="register_year" value="0">
                                                        <input type="checkbox" class="form-check-input" name="register_year" id="allexcel-register-year" value="1">
                                                        <label class="form-check-label" for="allexcel-register-year">
                                                            Tahun Mendaftar
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="register_grade" id="register_grade" value="0">
                                                        <input type="checkbox" class="form-check-input" name="register_grade" id="allexcel-register-grade" value="1">
                                                        <label class="form-check-label" for="allexcel-register-grade">
                                                            Tingkat Dituju
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_name" id="parent_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_name" id="allexcel-parent-name" value="1">
                                                        <label class="form-check-label" for="allexcel-parent-name">
                                                            Nama Orangtua
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_phone" id="parent_phone" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_phone" id="allexcel-parent-phone" value="1">
                                                        <label class="form-check-label" for="allexcel-parent-phone">
                                                            No. Handphone
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_email" id="parent_email" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_email" id="allexcel-parent-email" value="1">
                                                        <label class="form-check-label" for="allexcel-parent-email">
                                                            Email
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_date" id="registration_date" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_date" id="allexcel-registration-date" value="1">
                                                        <label class="form-check-label" for="allexcel-registration-date">
                                                            Tanggal Pendaftaran
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem1_indo" id="kelas4_sem1_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem1_indo" id="allexcel-kelas4-sem1-indo" value="1">
                                                        <label class="form-check-label" for="allexcel-kelas4-sem1-indo">
                                                            [Kelas 4] B.Indo Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem1_mat" id="kelas4_sem1_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem1_mat" id="allexcel-kelas4-sem1-mat" value="1">
                                                        <label class="form-check-label" for="allexcel-kelas4-sem1-mat">
                                                            [Kelas 4] Mat Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem2_indo" id="kelas4_sem2_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem2_indo" id="allexcel-kelas4-sem2-indo" value="1">
                                                        <label class="form-check-label" for="allexcel-kelas4-sem2-indo">
                                                            [Kelas 4] B.Indo Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem2_mat" id="kelas4_sem2_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem2_mat" id="allexcel-kelas4-sem2-mat" value="1">
                                                        <label class="form-check-label" for="allexcel-kelas4-sem2-mat">
                                                            [Kelas 4] Mat Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem1_indo" id="kelas5_sem1_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem1_indo" id="allexcel-kelas5-sem1-indo" value="1">
                                                        <label class="form-check-label" for="allexcel-kelas5-sem1-indo">
                                                            [Kelas 5] B.Indo Sem 1
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem1_mat" id="kelas5_sem1_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem1_mat" id="allexcel-kelas5-sem1-mat" value="1">
                                                        <label class="form-check-label" for="allexcel-kelas5-sem1-mat">
                                                            [Kelas 5] Mat Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem2_indo" id="kelas5_sem2_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem2_indo" id="allexcel-kelas5-sem2-indo" value="1">
                                                        <label class="form-check-label" for="allexcel-kelas5-sem2-indo">
                                                            [Kelas 5] B.Indo Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem2_mat" id="kelas5_sem2_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem2_mat" id="allexcel-kelas5-sem2-mat" value="1">
                                                        <label class="form-check-label" for="allexcel-kelas5-sem2-mat">
                                                            [Kelas 5] Mat Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_status" id="registration_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_status" id="allexcel-registration-status" value="1">
                                                        <label class="form-check-label" for="allexcel-registration-status">
                                                            Status Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="selection_status" id="selection_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="selection_status" id="allexcel-selection-status" value="1">
                                                        <label class="form-check-label" for="allexcel-selection-status">
                                                            Status Observasi
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="approval_status" id="approval_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="approval_status" id="allexcel-approval-status" value="1">
                                                        <label class="form-check-label" for="allexcel-approval-status">
                                                            Status Penerimaan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="dapodik_status" id="dapodik_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="dapodik_status" id="allexcel-dapodik-status" value="1">
                                                        <label class="form-check-label" for="allexcel-dapodik-status">
                                                            Status Dapodik
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="aggrement_status" id="aggrement_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="aggrement_status" id="allexcel-aggrement-status" value="1">
                                                        <label class="form-check-label" for="allexcel-aggrement-status">
                                                            Status Surat Pernyataan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="payment_status" id="payment_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="payment_status" id="allexcel-payment-status" value="1">
                                                        <label class="form-check-label" for="allexcel-payment-status">
                                                            Status Surat Keuangan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="uniform_status" id="uniform_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="uniform_status" id="allexcel-uniform-status" value="1">
                                                        <label class="form-check-label" for="allexcel-uniform-status">
                                                            Status Seragam
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline">
                                                        <input type="hidden" name="book_status" id="book_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="book_status" id="allexcel-book-status" value="1">
                                                        <label class="form-check-label" for="allexcel-book-status">
                                                            Status Buku
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary me-2 fw-bolder">PRINT LAPORAN [EXCEL]</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="allpdf" role="tabpanel" aria-labelledby="allpdf-line-tab">
                                    <form action="{{ route('dashboard.smp.admin.registration.reports.all-pdf') }}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="all_pdf_path" class="col-sm-2 col-form-label fw-bolder text-uppercase">Jalur Pendaftaran</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="all_pdf_path" id="all_pdf_path" data-width="100%">
                                                    <option value="0" selected>Semua Jalur</option>
                                                    <option value="Internal">Jalur Internal</option>
                                                    <option value="External">Jalur External</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="all_pdf_year" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tahun Mendaftar</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="all_pdf_year" id="all_pdf_year" data-width="100%">
                                                    <option value="0" selected>Semua Tahun Pelajaran</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">Tahun Pelajaran {{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="all_pdf_grade" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tingkat Mendaftar</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="all_pdf_grade" id="all_pdf_grade" data-width="100%">
                                                    <option value="0" selected>Semua Kelas</option>
                                                    <option value="7">Kelas 7</option>
                                                    <option value="8">Kelas 8</option>
                                                    <option value="9">Kelas 9</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="all_pdf_filter" class="col-sm-2 col-form-label fw-bolder text-uppercase">Filter Data</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="all_pdf_filter" id="all_pdf_filter" data-width="100%">
                                                    <option value="filter-all" selected>Semua Data</option>
                                                    <option value="filter-not-verified">Filter : Belum Terverifikasi</option>
                                                    <option value="filter-verified">Filter : Terverifikasi</option>
                                                    <option value="filter-diterima">Filter : Diterima</option>
                                                    <option value="filter-tidak-diterima">Filter : Tidak Diterima</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="options" class="col-sm-2 col-form-label fw-bolder text-uppercase">Pilihan Kolom</label>
                                            <div class="col-sm-10">
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_code" id="registration_code" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_code" id="allpdf-registration-code" value="1">
                                                        <label class="form-check-label" for="allpdf-registration-code">
                                                            Kode Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="virtual_code" id="virtual_code" value="0">
                                                        <input type="checkbox" class="form-check-input" name="virtual_code" id="allpdf-virtual-code" value="1">
                                                        <label class="form-check-label" for="allpdf-virtual-code">
                                                            Kode Virtual
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_path" id="registration_path" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_path" id="allpdf-registration-path" value="1">
                                                        <label class="form-check-label" for="allpdf-registration-path">
                                                            Jalur Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="full_name" id="full_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="full_name" id="allpdf-full-name" value="1">
                                                        <label class="form-check-label" for="allpdf-full-name">
                                                            Nama Lengkap
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="nick_name" id="nick_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="nick_name" id="allpdf-nick-name" value="1">
                                                        <label class="form-check-label" for="allpdf-nick-name">
                                                            Nama Panggilan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="birth_town" id="birth_town" value="0">
                                                        <input type="checkbox" class="form-check-input" name="birth_town" id="allpdf-birth-town" value="1">
                                                        <label class="form-check-label" for="allpdf-birth-town">
                                                            Kota Kelahiran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="birth_date" id="birth_date" value="0">
                                                        <input type="checkbox" class="form-check-input" name="birth_date" id="allpdf-birth-date" value="1">
                                                        <label class="form-check-label" for="allpdf-birth-date">
                                                            Tanggal Lahir
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="origin_school" id="origin_school" value="0">
                                                        <input type="checkbox" class="form-check-input" name="origin_school" id="allpdf-origin-school" value="1">
                                                        <label class="form-check-label" for="allpdf-origin-school">
                                                            Asal Sekolah
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="gender" id="gender" value="0">
                                                        <input type="checkbox" class="form-check-input" name="gender" id="allpdf-gender" value="1">
                                                        <label class="form-check-label" for="allpdf-gender">
                                                            Jenis Kelamin
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="register_year" id="register_year" value="0">
                                                        <input type="checkbox" class="form-check-input" name="register_year" id="allpdf-register-year" value="1">
                                                        <label class="form-check-label" for="allpdf-register-year">
                                                            Tahun Mendaftar
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="register_grade" id="register_grade" value="0">
                                                        <input type="checkbox" class="form-check-input" name="register_grade" id="allpdf-register-grade" value="1">
                                                        <label class="form-check-label" for="allpdf-register-grade">
                                                            Tingkat Dituju
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_name" id="parent_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_name" id="allpdf-parent-name" value="1">
                                                        <label class="form-check-label" for="allpdf-parent-name">
                                                            Nama Orangtua
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_phone" id="parent_phone" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_phone" id="allpdf-parent-phone" value="1">
                                                        <label class="form-check-label" for="allpdf-parent-phone">
                                                            No. Handphone
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_email" id="parent_email" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_email" id="allpdf-parent-email" value="1">
                                                        <label class="form-check-label" for="allpdf-parent-email">
                                                            Email
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_date" id="registration_date" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_date" id="allpdf-registration-date" value="1">
                                                        <label class="form-check-label" for="allpdf-registration-date">
                                                            Tanggal Pendaftaran
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem1_indo" id="kelas4_sem1_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem1_indo" id="allpdf-kelas4-sem1-indo" value="1">
                                                        <label class="form-check-label" for="allpdf-kelas4-sem1-indo">
                                                            [Kelas 4] B.Indo Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem1_mat" id="kelas4_sem1_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem1_mat" id="allpdf-kelas4-sem1-mat" value="1">
                                                        <label class="form-check-label" for="allpdf-kelas4-sem1-mat">
                                                            [Kelas 4] Mat Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem2_indo" id="kelas4_sem2_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem2_indo" id="allpdf-kelas4-sem2-indo" value="1">
                                                        <label class="form-check-label" for="allpdf-kelas4-sem2-indo">
                                                            [Kelas 4] B.Indo Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem2_mat" id="kelas4_sem2_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem2_mat" id="allpdf-kelas4-sem2-mat" value="1">
                                                        <label class="form-check-label" for="allpdf-kelas4-sem2-mat">
                                                            [Kelas 4] Mat Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem1_indo" id="kelas5_sem1_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem1_indo" id="allpdf-kelas5-sem1-indo" value="1">
                                                        <label class="form-check-label" for="allpdf-kelas5-sem1-indo">
                                                            [Kelas 5] B.Indo Sem 1
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem1_mat" id="kelas5_sem1_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem1_mat" id="allpdf-kelas5-sem1-mat" value="1">
                                                        <label class="form-check-label" for="allpdf-kelas5-sem1-mat">
                                                            [Kelas 5] Mat Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem2_indo" id="kelas5_sem2_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem2_indo" id="allpdf-kelas5-sem2-indo" value="1">
                                                        <label class="form-check-label" for="allpdf-kelas5-sem2-indo">
                                                            [Kelas 5] B.Indo Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem2_mat" id="kelas5_sem2_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem2_mat" id="allpdf-kelas5-sem2-mat" value="1">
                                                        <label class="form-check-label" for="allpdf-kelas5-sem2-mat">
                                                            [Kelas 5] Mat Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_status" id="registration_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_status" id="allpdf-registration-status" value="1">
                                                        <label class="form-check-label" for="allpdf-registration-status">
                                                            Status Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="selection_status" id="selection_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="selection_status" id="allpdf-selection-status" value="1">
                                                        <label class="form-check-label" for="allpdf-selection-status">
                                                            Status Observasi
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="approval_status" id="approval_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="approval_status" id="allpdf-approval-status" value="1">
                                                        <label class="form-check-label" for="allpdf-approval-status">
                                                            Status Penerimaan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="dapodik_status" id="dapodik_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="dapodik_status" id="allpdf-dapodik-status" value="1">
                                                        <label class="form-check-label" for="allpdf-dapodik-status">
                                                            Status Dapodik
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="aggrement_status" id="aggrement_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="aggrement_status" id="allpdf-aggrement-status" value="1">
                                                        <label class="form-check-label" for="allpdf-aggrement-status">
                                                            Status Surat Pernyataan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="payment_status" id="payment_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="payment_status" id="allpdf-payment-status" value="1">
                                                        <label class="form-check-label" for="allpdf-payment-status">
                                                            Status Surat Keuangan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="uniform_status" id="uniform_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="uniform_status" id="allpdf-uniform-status" value="1">
                                                        <label class="form-check-label" for="allpdf-uniform-status">
                                                            Status Seragam
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline">
                                                        <input type="hidden" name="book_status" id="book_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="book_status" id="allpdf-book-status" value="1">
                                                        <label class="form-check-label" for="allpdf-book-status">
                                                            Status Buku
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary me-2 fw-bolder">PRINT LAPORAN [PDF]</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="separatedata" role="tabpanel" aria-labelledby="separatedata-line-tab">
                            <ul class="nav nav-tabs nav-tabs-line nav-fill" id="lineTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-bolder" id="separateexcel-line-tab" data-bs-toggle="tab" href="#separateexcel" role="tab" aria-controls="separateexcel"
                                        aria-selected="true">EXCEL</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder" id="separatepdf-line-tab" data-bs-toggle="tab" href="#separatepdf" role="tab" aria-controls="separatepdf"
                                        aria-selected="false">PDF</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="lineTabContent">
                                <div class="tab-pane fade show active" id="separateexcel" role="tabpanel" aria-labelledby="separateexcel-line-tab">
                                    <form action="{{ route('dashboard.smp.admin.registration.reports.separate-excel') }}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="separate_excel_path" class="col-sm-2 col-form-label fw-bolder text-uppercase">Jalur Pendaftaran</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="separate_excel_path" id="separate_excel_path" data-width="100%">
                                                    <option value="0" selected>Semua Jalur</option>
                                                    <option value="Internal">Jalur Internal</option>
                                                    <option value="External">Jalur External</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="separate_excel_year" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tahun Mendaftar</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="separate_excel_year" id="separate_excel_year" data-width="100%">
                                                    <option value="0" selected>Semua Tahun Pelajaran</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">Tahun Pelajaran {{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="separate_excel_grade" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tingkat Mendaftar</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="separate_excel_grade" id="separate_excel_grade" data-width="100%">
                                                    <option value="0" selected>Semua Kelas</option>
                                                    <option value="7">Kelas 7</option>
                                                    <option value="8">Kelas 8</option>
                                                    <option value="9">Kelas 9</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="separate_excel_filter" class="col-sm-2 col-form-label fw-bolder text-uppercase">Filter Data</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="separate_excel_filter" id="separate_excel_filter" data-width="100%">
                                                    <option value="filter-all" selected>Semua Data</option>
                                                    <option value="filter-not-verified">Filter : Belum Terverifikasi</option>
                                                    <option value="filter-verified">Filter : Terverifikasi</option>
                                                    <option value="filter-diterima">Filter : Diterima</option>
                                                    <option value="filter-tidak-diterima">Filter : Tidak Diterima</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="first_date" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tanggal Awal</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('first_date') is-invalid @enderror" name="first_date" id="first_date" placeholder="Tanggal Awal"
                                                    value="{{ old('first_date') }}" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" required>
                                                @error('first_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="last_date" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tanggal Akhir</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('last_date') is-invalid @enderror" name="last_date" id="last_date" placeholder="Tanggal Akhir"
                                                    value="{{ old('last_date') }}" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" required>
                                                @error('last_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="options" class="col-sm-2 col-form-label fw-bolder text-uppercase">Pilihan Kolom</label>
                                            <div class="col-sm-10">
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="all_column" id="all_column" value="0">
                                                        <input type="checkbox" class="form-check-input" name="all_column" id="separateexcel-all-column" value="1">
                                                        <label class="form-check-label" for="separateexcel-all-column">
                                                            <span class="fw-bolder">Semua Kolom</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_code" id="registration_code" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_code" id="separateexcel-registration-code" value="1">
                                                        <label class="form-check-label" for="separateexcel-registration-code">
                                                            Kode Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="virtual_code" id="virtual_code" value="0">
                                                        <input type="checkbox" class="form-check-input" name="virtual_code" id="separateexcel-virtual-code" value="1">
                                                        <label class="form-check-label" for="separateexcel-virtual-code">
                                                            Kode Virtual
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_path" id="registration_path" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_path" id="separateexcel-registration-path" value="1">
                                                        <label class="form-check-label" for="separateexcel-registration-path">
                                                            Jalur Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="full_name" id="full_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="full_name" id="separateexcel-full-name" value="1">
                                                        <label class="form-check-label" for="separateexcel-full-name">
                                                            Nama Lengkap
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="nick_name" id="nick_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="nick_name" id="separateexcel-nick-name" value="1">
                                                        <label class="form-check-label" for="separateexcel-nick-name">
                                                            Nama Panggilan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="birth_town" id="birth_town" value="0">
                                                        <input type="checkbox" class="form-check-input" name="birth_town" id="separateexcel-birth-town" value="1">
                                                        <label class="form-check-label" for="separateexcel-birth-town">
                                                            Kota Kelahiran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="birth_date" id="birth_date" value="0">
                                                        <input type="checkbox" class="form-check-input" name="birth_date" id="separateexcel-birth-date" value="1">
                                                        <label class="form-check-label" for="separateexcel-birth-date">
                                                            Tanggal Lahir
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="origin_school" id="origin_school" value="0">
                                                        <input type="checkbox" class="form-check-input" name="origin_school" id="separateexcel-origin-school" value="1">
                                                        <label class="form-check-label" for="separateexcel-origin-school">
                                                            Asal Sekolah
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="gender" id="gender" value="0">
                                                        <input type="checkbox" class="form-check-input" name="gender" id="separateexcel-gender" value="1">
                                                        <label class="form-check-label" for="separateexcel-gender">
                                                            Jenis Kelamin
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="register_year" id="register_year" value="0">
                                                        <input type="checkbox" class="form-check-input" name="register_year" id="separateexcel-register-year" value="1">
                                                        <label class="form-check-label" for="separateexcel-register-year">
                                                            Tahun Mendaftar
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="register_grade" id="register_grade" value="0">
                                                        <input type="checkbox" class="form-check-input" name="register_grade" id="separateexcel-register-grade" value="1">
                                                        <label class="form-check-label" for="separateexcel-register-grade">
                                                            Tingkat Dituju
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_name" id="parent_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_name" id="separateexcel-parent-name" value="1">
                                                        <label class="form-check-label" for="separateexcel-parent-name">
                                                            Nama Orangtua
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_phone" id="parent_phone" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_phone" id="separateexcel-parent-phone" value="1">
                                                        <label class="form-check-label" for="separateexcel-parent-phone">
                                                            No. Handphone
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_email" id="parent_email" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_email" id="separateexcel-parent-email" value="1">
                                                        <label class="form-check-label" for="separateexcel-parent-email">
                                                            Email
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_date" id="registration_date" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_date" id="separateexcel-registration-date" value="1">
                                                        <label class="form-check-label" for="separateexcel-registration-date">
                                                            Tanggal Pendaftaran
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem1_indo" id="kelas4_sem1_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem1_indo" id="separateexcel-kelas4-sem1-indo" value="1">
                                                        <label class="form-check-label" for="separateexcel-kelas4-sem1-indo">
                                                            [Kelas 4] B.Indo Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem1_mat" id="kelas4_sem1_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem1_mat" id="separateexcel-kelas4-sem1-mat" value="1">
                                                        <label class="form-check-label" for="separateexcel-kelas4-sem1-mat">
                                                            [Kelas 4] Mat Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem2_indo" id="kelas4_sem2_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem2_indo" id="separateexcel-kelas4-sem2-indo" value="1">
                                                        <label class="form-check-label" for="separateexcel-kelas4-sem2-indo">
                                                            [Kelas 4] B.Indo Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem2_mat" id="kelas4_sem2_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem2_mat" id="separateexcel-kelas4-sem2-mat" value="1">
                                                        <label class="form-check-label" for="separateexcel-kelas4-sem2-mat">
                                                            [Kelas 4] Mat Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem1_indo" id="kelas5_sem1_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem1_indo" id="separateexcel-kelas5-sem1-indo" value="1">
                                                        <label class="form-check-label" for="separateexcel-kelas5-sem1-indo">
                                                            [Kelas 5] B.Indo Sem 1
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem1_mat" id="kelas5_sem1_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem1_mat" id="separateexcel-kelas5-sem1-mat" value="1">
                                                        <label class="form-check-label" for="separateexcel-kelas5-sem1-mat">
                                                            [Kelas 5] Mat Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem2_indo" id="kelas5_sem2_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem2_indo" id="separateexcel-kelas5-sem2-indo" value="1">
                                                        <label class="form-check-label" for="separateexcel-kelas5-sem2-indo">
                                                            [Kelas 5] B.Indo Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem2_mat" id="kelas5_sem2_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem2_mat" id="separateexcel-kelas5-sem2-mat" value="1">
                                                        <label class="form-check-label" for="separateexcel-kelas5-sem2-mat">
                                                            [Kelas 5] Mat Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_status" id="registration_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_status" id="separateexcel-registration-status" value="1">
                                                        <label class="form-check-label" for="separateexcel-registration-status">
                                                            Status Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="selection_status" id="selection_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="selection_status" id="separateexcel-selection-status" value="1">
                                                        <label class="form-check-label" for="separateexcel-selection-status">
                                                            Status Observasi
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="approval_status" id="approval_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="approval_status" id="separateexcel-approval-status" value="1">
                                                        <label class="form-check-label" for="separateexcel-approval-status">
                                                            Status Penerimaan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="dapodik_status" id="dapodik_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="dapodik_status" id="separateexcel-dapodik-status" value="1">
                                                        <label class="form-check-label" for="separateexcel-dapodik-status">
                                                            Status Dapodik
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="aggrement_status" id="aggrement_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="aggrement_status" id="separateexcel-aggrement-status" value="1">
                                                        <label class="form-check-label" for="separateexcel-aggrement-status">
                                                            Status Surat Pernyataan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="payment_status" id="payment_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="payment_status" id="separateexcel-payment-status" value="1">
                                                        <label class="form-check-label" for="separateexcel-payment-status">
                                                            Status Surat Keuangan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="uniform_status" id="uniform_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="uniform_status" id="separateexcel-uniform-status" value="1">
                                                        <label class="form-check-label" for="separateexcel-uniform-status">
                                                            Status Seragam
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline">
                                                        <input type="hidden" name="book_status" id="book_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="book_status" id="separateexcel-book-status" value="1">
                                                        <label class="form-check-label" for="separateexcel-book-status">
                                                            Status Buku
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary me-2 fw-bolder">PRINT LAPORAN [EXCEL]</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="separatepdf" role="tabpanel" aria-labelledby="separatepdf-line-tab">
                                    <form action="{{ route('dashboard.smp.admin.registration.reports.separate-pdf') }}" method="POST" class="forms-sample">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="separate_pdf_path" class="col-sm-2 col-form-label fw-bolder text-uppercase">Jalur Pendaftaran</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="separate_pdf_path" id="separate_pdf_path" data-width="100%">
                                                    <option value="0" selected>Semua Jalur</option>
                                                    <option value="Internal">Jalur Internal</option>
                                                    <option value="External">Jalur External</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="separate_pdf_year" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tahun Mendaftar</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="separate_pdf_year" id="separate_pdf_year" data-width="100%">
                                                    <option value="0" selected>Semua Tahun Pelajaran</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">Tahun Pelajaran {{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="separate_pdf_grade" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tingkat Mendaftar</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="separate_pdf_grade" id="separate_pdf_grade" data-width="100%">
                                                    <option value="0" selected>Semua Kelas</option>
                                                    <option value="7">Kelas 7</option>
                                                    <option value="8">Kelas 8</option>
                                                    <option value="9">Kelas 9</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="separate_pdf_filter" class="col-sm-2 col-form-label fw-bolder text-uppercase">Filter Data</label>
                                            <div class="col-sm-10">
                                                <select class="js-filter form-select" name="separate_pdf_filter" id="separate_pdf_filter" data-width="100%">
                                                    <option value="filter-all" selected>Semua Data</option>
                                                    <option value="filter-not-verified">Filter : Belum Terverifikasi</option>
                                                    <option value="filter-verified">Filter : Terverifikasi</option>
                                                    <option value="filter-diterima">Filter : Diterima</option>
                                                    <option value="filter-tidak-diterima">Filter : Tidak Diterima</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="first_date" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tanggal Awal</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('first_date') is-invalid @enderror" name="first_date" id="first_date" placeholder="Tanggal Awal"
                                                    value="{{ old('first_date') }}" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" required>
                                                @error('first_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="last_date" class="col-sm-2 col-form-label fw-bolder text-uppercase">Tanggal Akhir</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('last_date') is-invalid @enderror" name="last_date" id="last_date" placeholder="Tanggal Akhir"
                                                    value="{{ old('last_date') }}" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" required>
                                                @error('last_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="options" class="col-sm-2 col-form-label fw-bolder text-uppercase">Pilihan Kolom</label>
                                            <div class="col-sm-10">
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_code" id="registration_code" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_code" id="separatepdf-registration-code" value="1">
                                                        <label class="form-check-label" for="separatepdf-registration-code">
                                                            Kode Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="virtual_code" id="virtual_code" value="0">
                                                        <input type="checkbox" class="form-check-input" name="virtual_code" id="separatepdf-virtual-code" value="1">
                                                        <label class="form-check-label" for="separatepdf-virtual-code">
                                                            Kode Virtual
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_path" id="registration_path" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_path" id="separatepdf-registration-path" value="1">
                                                        <label class="form-check-label" for="separatepdf-registration-path">
                                                            Jalur Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="full_name" id="full_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="full_name" id="separatepdf-full-name" value="1">
                                                        <label class="form-check-label" for="separatepdf-full-name">
                                                            Nama Lengkap
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="nick_name" id="nick_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="nick_name" id="separatepdf-nick-name" value="1">
                                                        <label class="form-check-label" for="separatepdf-nick-name">
                                                            Nama Panggilan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="birth_town" id="birth_town" value="0">
                                                        <input type="checkbox" class="form-check-input" name="birth_town" id="separatepdf-birth-town" value="1">
                                                        <label class="form-check-label" for="separatepdf-birth-town">
                                                            Kota Kelahiran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="birth_date" id="birth_date" value="0">
                                                        <input type="checkbox" class="form-check-input" name="birth_date" id="separatepdf-birth-date" value="1">
                                                        <label class="form-check-label" for="separatepdf-birth-date">
                                                            Tanggal Lahir
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="origin_school" id="origin_school" value="0">
                                                        <input type="checkbox" class="form-check-input" name="origin_school" id="separatepdf-origin-school" value="1">
                                                        <label class="form-check-label" for="separatepdf-origin-school">
                                                            Asal Sekolah
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="gender" id="gender" value="0">
                                                        <input type="checkbox" class="form-check-input" name="gender" id="separatepdf-gender" value="1">
                                                        <label class="form-check-label" for="separatepdf-gender">
                                                            Jenis Kelamin
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="register_year" id="register_year" value="0">
                                                        <input type="checkbox" class="form-check-input" name="register_year" id="separatepdf-register-year" value="1">
                                                        <label class="form-check-label" for="separatepdf-register-year">
                                                            Tahun Mendaftar
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="register_grade" id="register_grade" value="0">
                                                        <input type="checkbox" class="form-check-input" name="register_grade" id="separatepdf-register-grade" value="1">
                                                        <label class="form-check-label" for="separatepdf-register-grade">
                                                            Tingkat Dituju
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_name" id="parent_name" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_name" id="separatepdf-parent-name" value="1">
                                                        <label class="form-check-label" for="separatepdf-parent-name">
                                                            Nama Orangtua
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_phone" id="parent_phone" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_phone" id="separatepdf-parent-phone" value="1">
                                                        <label class="form-check-label" for="separatepdf-parent-phone">
                                                            No. Handphone
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="parent_email" id="parent_email" value="0">
                                                        <input type="checkbox" class="form-check-input" name="parent_email" id="separatepdf-parent-email" value="1">
                                                        <label class="form-check-label" for="separatepdf-parent-email">
                                                            Email
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_date" id="registration_date" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_date" id="separatepdf-registration-date" value="1">
                                                        <label class="form-check-label" for="separatepdf-registration-date">
                                                            Tanggal Pendaftaran
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem1_indo" id="kelas4_sem1_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem1_indo" id="separatepdf-kelas4-sem1-indo" value="1">
                                                        <label class="form-check-label" for="separatepdf-kelas4-sem1-indo">
                                                            [Kelas 4] B.Indo Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem1_mat" id="kelas4_sem1_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem1_mat" id="separatepdf-kelas4-sem1-mat" value="1">
                                                        <label class="form-check-label" for="separatepdf-kelas4-sem1-mat">
                                                            [Kelas 4] Mat Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem2_indo" id="kelas4_sem2_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem2_indo" id="separatepdf-kelas4-sem2-indo" value="1">
                                                        <label class="form-check-label" for="separatepdf-kelas4-sem2-indo">
                                                            [Kelas 4] B.Indo Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas4_sem2_mat" id="kelas4_sem2_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas4_sem2_mat" id="separatepdf-kelas4-sem2-mat" value="1">
                                                        <label class="form-check-label" for="separatepdf-kelas4-sem2-mat">
                                                            [Kelas 4] Mat Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem1_indo" id="kelas5_sem1_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem1_indo" id="separatepdf-kelas5-sem1-indo" value="1">
                                                        <label class="form-check-label" for="separatepdf-kelas5-sem1-indo">
                                                            [Kelas 5] B.Indo Sem 1
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem1_mat" id="kelas5_sem1_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem1_mat" id="separatepdf-kelas5-sem1-mat" value="1">
                                                        <label class="form-check-label" for="separatepdf-kelas5-sem1-mat">
                                                            [Kelas 5] Mat Sem 1
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem2_indo" id="kelas5_sem2_indo" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem2_indo" id="separatepdf-kelas5-sem2-indo" value="1">
                                                        <label class="form-check-label" for="separatepdf-kelas5-sem2-indo">
                                                            [Kelas 5] B.Indo Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="kelas5_sem2_mat" id="kelas5_sem2_mat" value="0">
                                                        <input type="checkbox" class="form-check-input" name="kelas5_sem2_mat" id="separatepdf-kelas5-sem2-mat" value="1">
                                                        <label class="form-check-label" for="separatepdf-kelas5-sem2-mat">
                                                            [Kelas 5] Mat Sem 2
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="registration_status" id="registration_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="registration_status" id="separatepdf-registration-status" value="1">
                                                        <label class="form-check-label" for="separatepdf-registration-status">
                                                            Status Pendaftaran
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="selection_status" id="selection_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="selection_status" id="separatepdf-selection-status" value="1">
                                                        <label class="form-check-label" for="separatepdf-selection-status">
                                                            Status Observasi
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="approval_status" id="approval_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="approval_status" id="separatepdf-approval-status" value="1">
                                                        <label class="form-check-label" for="separatepdf-approval-status">
                                                            Status Penerimaan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="dapodik_status" id="dapodik_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="dapodik_status" id="separatepdf-dapodik-status" value="1">
                                                        <label class="form-check-label" for="separatepdf-dapodik-status">
                                                            Status Dapodik
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="aggrement_status" id="aggrement_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="aggrement_status" id="separatepdf-aggrement-status" value="1">
                                                        <label class="form-check-label" for="separatepdf-aggrement-status">
                                                            Status Surat Pernyataan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="payment_status" id="payment_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="payment_status" id="separatepdf-payment-status" value="1">
                                                        <label class="form-check-label" for="separatepdf-payment-status">
                                                            Status Surat Keuangan
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline mb-3">
                                                        <input type="hidden" name="uniform_status" id="uniform_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="uniform_status" id="separatepdf-uniform-status" value="1">
                                                        <label class="form-check-label" for="separatepdf-uniform-status">
                                                            Status Seragam
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-12 mx-auto">
                                                    <div class="col form-check form-check-inline">
                                                        <input type="hidden" name="book_status" id="book_status" value="0">
                                                        <input type="checkbox" class="form-check-input" name="book_status" id="separatepdf-book-status" value="1">
                                                        <label class="form-check-label" for="separatepdf-book-status">
                                                            Status Buku
                                                        </label>
                                                    </div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                    <div class="col form-check form-check-inline"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary me-2 fw-bolder">PRINT LAPORAN [PDF]</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugins-js')
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/inputmask/jquery.inputmask.min.js') }}"></script>
@endpush

@push('customs-js')
    <script>
        $(function() {
            'use strict';
            if ($(".js-filter").length) {
                $(".js-filter").select2();
            }
        });
        (function($) {
            'use strict';

            // initializing inputmask
            $(":input").inputmask();

        })(jQuery);
    </script>
@endpush
