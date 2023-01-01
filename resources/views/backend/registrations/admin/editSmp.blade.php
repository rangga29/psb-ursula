@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dropify/dist/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">SMP Admin Management</li>
            <li class="breadcrumb-item">Data Pendaftaran</li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">{{ $smp_registration->full_name }} {{ $page_setting['grade'] != 'TBTK' ? '[Jalur ' . $smp_registration->registration_path . ']' : '' }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body main-content">
                    <form action="{{ route('dashboard.smp.admin.registration.update', $smp_registration->unique_code) }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <h3 class="fw-bolder text-uppercase mb-4">DATA CALON SISWA</h3>
                        <div class="row mb-4">
                            <label for="registration_path" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jalur Pendaftaran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control" name="registration_path" value="{{ $smp_registration->registration_path }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="registration_code" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kode Pendaftaran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control" name="registration_code" value="{{ $smp_registration->registration_code }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="virtual_code" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kode Virtual</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control" name="virtual_code" value="{{ $smp_registration->virtual_code }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="full_name" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Lengkap</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" id="full_name" placeholder="Nama Lengkap"
                                    value="{{ old('full_name', $smp_registration->full_name) }}">
                                @error('full_name')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="nick_name" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Panggilan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('nick_name') is-invalid @enderror" name="nick_name" id="nick_name" placeholder="Nama Panggilan"
                                    value="{{ old('nick_name', $smp_registration->nick_name) }}">
                                @error('nick_name')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="birth_town" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kota Kelahiran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('birth_town') is-invalid @enderror" name="birth_town" id="birth_town" placeholder="Kota Kelahiran"
                                    value="{{ old('birth_town', $smp_registration->birth_town) }}">
                                @error('birth_town')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <input type="hidden" name="oldBirthDate" value="{{ $smp_registration->birth_date }}">
                            <label for="birth_date" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Tanggal Lahir</label>
                            <div class="col-md-8 col-xxl-10">
                                <div class="input-group date datepicker" id="datePicker">
                                    <input type="text" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" id="birth_date" placeholder="Tanggal Lahir"
                                        value="{{ old('birth_date', \Carbon\Carbon::createFromFormat('Y-m-d', $smp_registration->birth_date)->format('d/m/Y')) }}">
                                    <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                                </div>
                                @error('birth_date')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="origin_school" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Asal Sekolah</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('origin_school') is-invalid @enderror" name="origin_school" id="origin_school" placeholder="Asal Sekolah"
                                    value="{{ old('origin_school', $smp_registration->origin_school) }}">
                                @error('origin_school')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="gender" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jenis Kelamin</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="gender" id="gender" data-width="100%" rea>
                                    <option value="Laki-Laki" {{ old('gender', $smp_registration->gender) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('gender', $smp_registration->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="register_year" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Masuk Tahun Ajaran</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="register_year" id="register_year" data-width="100%" disabled>
                                    @foreach ($page_setting['years'] as $year)
                                        @if (old('register_year', $smp_registration->register_year) == $year->id)
                                            <option value="{{ $year->id }}" selected>Tahun Pelajaran {{ $year->name }}</option>
                                        @else
                                            <option value="{{ $year->id }}">Tahun Pelajaran {{ $year->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="register_grade" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Tingkat Yang Dituju</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="register_grade" id="register_grade" data-width="100%" disabled>
                                    <option value="7" {{ old('register_grade', $smp_registration->register_grade) == '7' ? 'selected' : '' }}>Kelas 7</option>
                                    <option value="8" {{ old('register_grade', $smp_registration->register_grade) == '8' ? 'selected' : '' }}>Kelas 8</option>
                                    <option value="9" {{ old('register_grade', $smp_registration->register_grade) == '9' ? 'selected' : '' }}>Kelas 9</option>
                                </select>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h3 class="fw-bolder text-uppercase mb-4">DATA ORANG TUA</h3>
                        <div class="row mb-4">
                            <label for="parent_name" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Orang Tua</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('parent_name') is-invalid @enderror" name="parent_name" id="parent_name" placeholder="Nama Orang Tua"
                                    value="{{ old('parent_name', $smp_registration->parent_name) }}">
                                @error('parent_name')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="parent_phone" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">No. Handphone</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('parent_phone') is-invalid @enderror" name="parent_phone" id="parent_phone" placeholder="No. Handphone"
                                    value="{{ old('parent_phone', $smp_registration->parent_phone) }}">
                                @error('parent_phone')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="parent_email" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Alamat Email</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="email" class="form-control @error('parent_email') is-invalid @enderror" name="parent_email" id="parent_email" placeholder="Alamat Email"
                                    value="{{ old('parent_email', $smp_registration->parent_email) }}">
                                @error('parent_email')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h3 class="fw-bolder text-uppercase mb-2">DATA NILAI RAPOR</h3>
                        <p class="mb-4">* Rentang Nilai Rapor : 10 - 100</p>
                        <div class="row mb-4">
                            <label for="kelas4_sem1_indo" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Kelas 4] B.Indo Sem 1</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kelas4_sem1_indo') is-invalid @enderror" name="kelas4_sem1_indo" id="kelas4_sem1_indo"
                                    placeholder="[Kelas 4] Bahasa Indonesia Semester 1" value="{{ old('kelas4_sem1_indo', $smp_registration->kelas4_sem1_indo) }}">
                                @error('kelas4_sem1_indo')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kelas4_sem1_mat" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Kelas 4] Mat Sem 1</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kelas4_sem1_mat') is-invalid @enderror" name="kelas4_sem1_mat" id="kelas4_sem1_mat"
                                    placeholder="[Kelas 4] Matematika Semester 1" value="{{ old('kelas4_sem1_mat', $smp_registration->kelas4_sem1_mat) }}">
                                @error('kelas4_sem1_mat')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kelas4_sem2_indo" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Kelas 4] B.Indo Sem 2</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kelas4_sem2_indo') is-invalid @enderror" name="kelas4_sem2_indo" id="kelas4_sem2_indo"
                                    placeholder="[Kelas 4] Bahasa Indonesia Semester 2" value="{{ old('kelas4_sem2_indo', $smp_registration->kelas4_sem2_indo) }}">
                                @error('kelas4_sem2_indo')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kelas4_sem2_mat" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Kelas 4] Mat Sem 2</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kelas4_sem2_mat') is-invalid @enderror" name="kelas4_sem2_mat" id="kelas4_sem2_mat"
                                    placeholder="[Kelas 4] Matematika Semester 2" value="{{ old('kelas4_sem2_mat', $smp_registration->kelas4_sem2_mat) }}">
                                @error('kelas4_sem2_mat')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kelas5_sem1_indo" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Kelas 5] B.Indo Sem 1</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kelas5_sem1_indo') is-invalid @enderror" name="kelas5_sem1_indo" id="kelas5_sem1_indo"
                                    placeholder="[Kelas 5] Bahasa Indonesia Semester 1" value="{{ old('kelas5_sem1_indo', $smp_registration->kelas5_sem1_indo) }}">
                                @error('kelas5_sem1_indo')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kelas5_sem1_mat" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Kelas 5] Mat Sem 1</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kelas5_sem1_mat') is-invalid @enderror" name="kelas5_sem1_mat" id="kelas5_sem1_mat"
                                    placeholder="[Kelas 5] Matematika Semester 1" value="{{ old('kelas5_sem1_mat', $smp_registration->kelas5_sem1_mat) }}">
                                @error('kelas5_sem1_mat')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kelas5_sem2_indo" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Kelas 5] B.Indo Sem 2</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kelas5_sem2_indo') is-invalid @enderror" name="kelas5_sem2_indo" id="kelas5_sem2_indo"
                                    placeholder="[Kelas 5] Bahasa Indonesia Semester 2" value="{{ old('kelas5_sem2_indo', $smp_registration->kelas5_sem2_indo) }}">
                                @error('kelas5_sem2_indo')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kelas5_sem2_mat" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Kelas 5] Mat Sem 2</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kelas5_sem2_mat') is-invalid @enderror" name="kelas5_sem2_mat" id="kelas5_sem2_mat"
                                    placeholder="[Kelas 5] Matematika Semester 2" value="{{ old('kelas5_sem2_mat', $smp_registration->kelas5_sem2_mat) }}">
                                @error('kelas5_sem2_mat')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h3 class="fw-bolder text-uppercase mb-4">UPLOAD DOKUMEN</h3>
                        <div class="row mb-4">
                            <label for="payment_proof" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Bukti Pembayaran</label>
                            <div class="col-md-8 col-xxl-7">
                                <input type="file" class="form-control" name="payment_proof" id="payment_proof" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small>
                                @error('payment_proof')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xxl-3">
                                <input type="hidden" name="oldPaymentProof" value="{{ $smp_registration->payment_proof }}">
                                <img src="{{ asset('upload/payment_proof/smp/' . $smp_registration->payment_proof) }}" class="card-img-top w-100" style="border-radius: 0px; background-color: black;"
                                    alt="Bukti Pembayaran">
                            </div>
                        </div>
                        @if ($smp_registration->registration_path == 'Internal')
                            <div class="row mb-4">
                                <label for="covering_letter" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Surat Pengantar</label>
                                <div class="col-md-8 col-xxl-7">
                                    <input type="file" class="form-control" name="covering_letter" id="covering_letter" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                    <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small>
                                    @error('covering_letter')
                                        <br><small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-xxl-3">
                                    <input type="hidden" name="oldCoveringLetter" value="{{ $smp_registration->covering_letter }}">
                                    <img src="{{ asset('upload/covering_letter/' . $smp_registration->covering_letter) }}" class="card-img-top w-100"
                                        style="border-radius: 0px; background-color: black;" alt="Surat Pengantar">
                                </div>
                            </div>
                        @endif
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugins-js')
    <script src="{{ asset('vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/dropify/dist/dropify.min.js') }}"></script>
@endpush

@push('customs-js')
    <script>
        $(function() {
            'use strict';
            if ($(".js-select").length) {
                $(".js-select").select2();
            }

            $('#payment_proof').dropify();
            $('#covering_letter').dropify();

            if ($('#datePicker').length) {
                var date = new Date();
                var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                $('#datePicker').datepicker({
                    format: "dd/mm/yyyy",
                    todayHighlight: true,
                    autoclose: true,
                    orientation: 'bottom'
                });
            }
        });
    </script>
@endpush
