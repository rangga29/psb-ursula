@extends('registration.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h1 class="page-title fw-bolder text-uppercase">Formulir Pendaftaran [Jalur {{ $page_setting['path'] }}]</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body main-content">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <span>
                                    <li><small>{{ $error }}</small></li>
                                </span>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                        </div>
                    @endif
                    <form action="{{ route('sd.registration.externalStore') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <h3 class="fw-bolder text-uppercase mb-4">DATA CALON SISWA</h3>
                        <div class="row mb-4">
                            <label for="full_name" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Lengkap</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" id="full_name" placeholder="Nama Lengkap"
                                    value="{{ old('full_name') }}">
                                @error('full_name')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="nick_name" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Panggilan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('nick_name') is-invalid @enderror" name="nick_name" id="nick_name" placeholder="Nama Panggilan"
                                    value="{{ old('nick_name') }}">
                                @error('nick_name')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="birth_town" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kota Kelahiran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('birth_town') is-invalid @enderror" name="birth_town" id="birth_town" placeholder="Kota Kelahiran"
                                    value="{{ old('birth_town') }}">
                                @error('birth_town')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="birth_date" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Tanggal Lahir</label>
                            <div class="col-md-8 col-xxl-10">
                                <div class="input-group date datepicker" id="datePicker">
                                    <input type="text" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" id="birth_date" placeholder="Tanggal Lahir"
                                        value="{{ old('birth_date') }}">
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
                                    value="{{ old('origin_school') }}">
                                @error('origin_school')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="gender" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jenis Kelamin</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="gender" id="gender" data-width="100%">
                                    <option value="Laki-Laki" {{ old('gender') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="register_year" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Masuk Tahun Ajaran</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="register_year" id="register_year" data-width="100%">
                                    @foreach ($page_setting['years'] as $year)
                                        @if ($year->isMainYear == 1)
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
                                <select class="form-select js-select" name="register_grade" id="register_grade" data-width="100%">
                                    <option value="1" {{ old('register_grade') == '1' ? 'selected' : '' }}>Kelas 1</option>
                                    <option value="2" {{ old('register_grade') == '2' ? 'selected' : '' }}>Kelas 2</option>
                                    <option value="3" {{ old('register_grade') == '3' ? 'selected' : '' }}>Kelas 3</option>
                                    <option value="4" {{ old('register_grade') == '4' ? 'selected' : '' }}>Kelas 4</option>
                                    <option value="5" {{ old('register_grade') == '5' ? 'selected' : '' }}>Kelas 5</option>
                                    <option value="6" {{ old('register_grade') == '6' ? 'selected' : '' }}>Kelas 6</option>
                                </select>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h3 class="fw-bolder text-uppercase mb-4">DATA ORANG TUA</h3>
                        <div class="row mb-4">
                            <label for="parent_name" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Orang Tua</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('parent_name') is-invalid @enderror" name="parent_name" id="parent_name" placeholder="Nama Orang Tua"
                                    value="{{ old('parent_name') }}">
                                @error('parent_name')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="parent_phone" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">No. Handphone</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('parent_phone') is-invalid @enderror" name="parent_phone" id="parent_phone" placeholder="No. Handphone"
                                    value="{{ old('parent_phone') }}">
                                @error('parent_phone')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="parent_email" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Alamat Email</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="email" class="form-control @error('parent_email') is-invalid @enderror" name="parent_email" id="parent_email" placeholder="Alamat Email"
                                    value="{{ old('parent_email') }}">
                                @error('parent_email')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h3 class="fw-bolder text-uppercase mb-4">UPLOAD DOKUMEN</h3>
                        <div class="row mb-4">
                            <label for="payment_proof" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Bukti Pembayaran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="file" class="form-control" name="payment_proof" id="payment_proof" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small>
                                @error('payment_proof')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
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

@push('customs-js')
    <script>
        $(function() {
            'use strict';
            if ($(".js-select").length) {
                $(".js-select").select2();
            }

            $('#payment_proof').dropify();

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
