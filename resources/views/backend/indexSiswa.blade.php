@extends('backend.layouts.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="fw-bolder">Selamat Datang, {{ auth()->user()->name }}</h3>
        </div>
    </div>
    @if ($registration_data->approval_status == 1)
        <div class="alert alert-success" role="alert">
            <h2 class="alert-heading mb-2">SELAMAT!!!</h2>
            <h4>Sudah berhasil di terima di <span class="fw-bolder text-uppercase">{{ $page_setting['unit'] }} Santa Ursula Bandung</span></h4>
            <hr>
            <h5 class="mb-0">Jangan lupa untuk mengecek email dan melanjutkan ke kelengkapan data siswa dan data administrasi.</h5>
        </div>
    @elseif($registration_data->approval_status == 2)
        <div class="alert alert-danger" role="alert">
            <h2 class="alert-heading">MOHON MAAF</h2>
            <h4>Belum berhasil di terima di <span class="fw-bolder text-uppercase">{{ $page_setting['unit'] }} Santa Ursula Bandung</span></h4>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body main-content">
                    <div>
                        <h2 class="page-title fw-bolder text-uppercase">Dashboard Calon Siswa PSB {{ $page_setting['unit'] }} Santa Ursula Bandung</h2>
                    </div>
                    <hr class="mt-2 mb-4">
                    <h4>Seluruh proses PSB {{ $page_setting['unit'] }} Santa Ursula Bandung akan dilakukan di dalam dashboard ini.</h4>
                    <h4>Pastikan untuk login secara berkala untuk mengecek hasil penerimaan serta informasi terbaru terkait PSB {{ $page_setting['unit'] }} Santa Ursula Bandung.</h4>
                    <h4>Jika terdapat pertanyaan dapat menghubungi kontak panitia PSB yang ada di halaman website.</h4>
                    @if ($registration_data->approval_status == 1)
                        <hr class="mt-3 mb-4">
                        <h4>Selamat karena sudah diterima di {{ $page_setting['unit'] }} Santa Ursula Bandung.</h4>
                        <h4>Proses selanjutnya adalah pengisian data siswa dan data administrasi lewat tombol dibawah ini.</h4>
                        <div class="d-grid gap-2">
                            <a href="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.dapodik.index') }}" class="btn btn-primary fw-bolder text-uppercase">
                                Pengisian Data Siswa
                            </a>
                            <a href="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.administration.index') }}" class="btn btn-primary fw-bolder text-uppercase">
                                Kelengkapan Data Administrasi
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-4 grid-margin stretch-card">
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
