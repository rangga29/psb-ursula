@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dropify/dist/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $page_setting['grade'] }} Admin Management</li>
            <li class="breadcrumb-item">Data Siswa</li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Kependudukan</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">UBAH DATA KEPENDUDUKAN</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.updateDataKependudukan', $registration_data->unique_code) }}" method="POST" class="forms-sample"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ $dapodik_kependudukan->user_id }}">
                        <div class="row mb-4">
                            <label for="nik" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nomor Induk Kependudukan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="Nomor Induk Kependudukan"
                                    value="{{ old('nik', $dapodik_kependudukan->nik) }}">
                                @error('nik')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="nkk" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nomor Kartu Keluarga</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('nkk') is-invalid @enderror" name="nkk" id="nkk" placeholder="Nomor Kartu Keluarga"
                                    value="{{ old('nkk', $dapodik_kependudukan->nkk) }}">
                                @error('nkk')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="nak" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nomor Akta Kelahiran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('nak') is-invalid @enderror" name="nak" id="nak" placeholder="Nomor Akta Kelahiran"
                                    value="{{ old('nak', $dapodik_kependudukan->nak) }}">
                                @error('nak')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="pas_foto" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Pas Foto</label>
                            <div class="col-md-5 col-xxl-7">
                                <input type="file" class="form-control" name="pas_foto" id="pas_foto" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff" />
                                <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small>
                                @error('pas_foto')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3 col-xxl-3">
                                <input type="hidden" name="oldPasFoto" value="{{ $dapodik_kependudukan->pas_foto }}">
                                <img src="{{ asset('upload/pas_foto/' . $page_setting['grade_slug'] . '/' . $dapodik_kependudukan->pas_foto) }}" class="card-img-top w-100" style="border-radius: 0px;"
                                    alt="Pas Foto">
                            </div>
                        </div>
                        <hr>
                        <p class="fw-bolder text-uppercase mb-3">Alamat Sesuai Kartu Keluarga</p>
                        <div class="row mb-4">
                            <label for="kk_alamat" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[KK] Alamat</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('kk_alamat') is-invalid @enderror" name="kk_alamat" id="kk_alamat" placeholder="[KK] Alamat"
                                    value="{{ old('kk_alamat', $dapodik_kependudukan->kk_alamat) }}">
                                @error('kk_alamat')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kk_rt" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[KK] RT</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kk_rt') is-invalid @enderror" name="kk_rt" id="kk_rt" placeholder="[KK] RT"
                                    value="{{ old('kk_rt', $dapodik_kependudukan->kk_rt) }}">
                                @error('kk_rt')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kk_rw" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[KK] RW</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kk_rw') is-invalid @enderror" name="kk_rw" id="kk_rw" placeholder="[KK] RW"
                                    value="{{ old('kk_rw', $dapodik_kependudukan->kk_rw) }}">
                                @error('kk_rw')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kk_kelurahan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[KK] Kelurahan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('kk_kelurahan') is-invalid @enderror" name="kk_kelurahan" id="kk_kelurahan" placeholder="[KK] Kelurahan"
                                    value="{{ old('kk_kelurahan', $dapodik_kependudukan->kk_kelurahan) }}">
                                @error('kk_kelurahan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kk_kecamatan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[KK] Kecamatan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('kk_kecamatan') is-invalid @enderror" name="kk_kecamatan" id="kk_kecamatan" placeholder="[KK] Kecamatan"
                                    value="{{ old('kk_kecamatan', $dapodik_kependudukan->kk_kecamatan) }}">
                                @error('kk_kecamatan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kk_kota" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[KK] Kota / Kabupaten</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('kk_kota') is-invalid @enderror" name="kk_kota" id="kk_kota" placeholder="[KK] Kota / Kabupaten"
                                    value="{{ old('kk_kota', $dapodik_kependudukan->kk_kota) }}">
                                @error('kk_kota')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kk_kodepos" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[KK] Kodepos</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('kk_kodepos') is-invalid @enderror" name="kk_kodepos" id="kk_kodepos" placeholder="[KK] Kodepos"
                                    value="{{ old('kk_kodepos', $dapodik_kependudukan->kk_kodepos) }}">
                                @error('kk_kodepos')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <p class="fw-bolder text-uppercase mb-3">Alamat Domisili Saat Ini</p>
                        <div class="row mb-4">
                            <label for="tt_alamat" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Domisili] Alamat</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('tt_alamat') is-invalid @enderror" name="tt_alamat" id="tt_alamat" placeholder="[Domisili] Alamat"
                                    value="{{ old('tt_alamat', $dapodik_kependudukan->tt_alamat) }}">
                                @error('tt_alamat')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tt_rt" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Domisili] RT</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('tt_rt') is-invalid @enderror" name="tt_rt" id="tt_rt" placeholder="[Domisili] RT"
                                    value="{{ old('tt_rt', $dapodik_kependudukan->tt_rt) }}">
                                @error('tt_rt')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tt_rw" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Domisili] RW</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('tt_rw') is-invalid @enderror" name="tt_rw" id="tt_rw" placeholder="[Domisili] RW"
                                    value="{{ old('tt_rw', $dapodik_kependudukan->tt_rw) }}">
                                @error('tt_rw')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tt_kelurahan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Domisili] Kelurahan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('tt_kelurahan') is-invalid @enderror" name="tt_kelurahan" id="tt_kelurahan" placeholder="[Domisili] Kelurahan"
                                    value="{{ old('tt_kelurahan', $dapodik_kependudukan->tt_kelurahan) }}">
                                @error('tt_kelurahan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tt_kecamatan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Domisili] Kecamatan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('tt_kecamatan') is-invalid @enderror" name="tt_kecamatan" id="tt_kecamatan" placeholder="[Domisili] Kecamatan"
                                    value="{{ old('tt_kecamatan', $dapodik_kependudukan->tt_kecamatan) }}">
                                @error('tt_kecamatan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tt_kota" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Domisili] Kota / Kabupaten</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('tt_kota') is-invalid @enderror" name="tt_kota" id="tt_kota" placeholder="[Domisili] Kota / Kabupaten"
                                    value="{{ old('tt_kota', $dapodik_kependudukan->tt_kota) }}">
                                @error('tt_kota')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tt_kodepos" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">[Domisili] Kodepos</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('tt_kodepos') is-invalid @enderror" name="tt_kodepos" id="tt_kodepos" placeholder="[Domisili] Kodepos"
                                    value="{{ old('tt_kodepos', $dapodik_kependudukan->tt_kodepos) }}">
                                @error('tt_kodepos')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-4">
                            <label for="tinggal_bersama" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Tinggal Bersama Dengan</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="tinggal_bersama" id="tinggal_bersama" data-width="100%">
                                    <option value="Orang Tua" {{ old('tinggal_bersama', $dapodik_kependudukan->tinggal_bersama) == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                                    <option value="Wali" {{ old('tinggal_bersama', $dapodik_kependudukan->tinggal_bersama) == 'Wali' ? 'selected' : '' }}>Wali</option>
                                    <option value="Asrama" {{ old('tinggal_bersama', $dapodik_kependudukan->tinggal_bersama) == 'Asrama' ? 'selected' : '' }}>Asrama</option>
                                    <option value="Panti Asuhan" {{ old('tinggal_bersama', $dapodik_kependudukan->tinggal_bersama) == 'Panti Asuhan' ? 'selected' : '' }}>Panti Asuhan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="transportasi" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Moda Transportasi</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="transportasi" id="transportasi" data-width="100%">
                                    <option value="Kendaraan Pribadi" {{ old('transportasi', $dapodik_kependudukan->transportasi) == 'Kendaraan Pribadi' ? 'selected' : '' }}>Kendaraan Pribadi</option>
                                    <option value="Kendaraan Umum" {{ old('transportasi', $dapodik_kependudukan->transportasi) == 'Kendaraan Umum' ? 'selected' : '' }}>Kendaraan Umum</option>
                                    <option value="Jalan Kaki" {{ old('transportasi', $dapodik_kependudukan->transportasi) == 'Jalan Kaki' ? 'selected' : '' }}>Jalan Kaki</option>
                                    <option value="Jemputan Sekolah" {{ old('transportasi', $dapodik_kependudukan->transportasi) == 'Jemputan Sekolah' ? 'selected' : '' }}>Jemputan Sekolah</option>
                                    <option value="Transportasi Online" {{ old('transportasi', $dapodik_kependudukan->transportasi) == 'Transportasi Online' ? 'selected' : '' }}>Transportasi Online
                                    </option>
                                    <option value="Lainnya" {{ old('transportasi', $dapodik_kependudukan->transportasi) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="jarak_tempuh" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jarak Tempuh (KM)</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('jarak_tempuh') is-invalid @enderror" name="jarak_tempuh" id="jarak_tempuh" placeholder="Jarak Tempuh Dalam KM"
                                    value="{{ old('jarak_tempuh', $dapodik_kependudukan->jarak_tempuh) }}">
                                @error('jarak_tempuh')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="waktu_tempuh" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Waktu Tempuh (Menit)</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('waktu_tempuh') is-invalid @enderror" name="waktu_tempuh" id="waktu_tempuh" placeholder="Waktu Tempuh Dalam Menit"
                                    value="{{ old('waktu_tempuh', $dapodik_kependudukan->waktu_tempuh) }}">
                                @error('waktu_tempuh')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                            <a href="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.index') }}" class="btn btn-secondary fw-bolder">KEMBALI</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugins-js')
    <script src="{{ asset('vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
@endpush

@push('customs-js')
    <script>
        $(function() {
            'use strict';
            $('#scan_kk').dropify();
            $('#scan_ak').dropify();
            $('#pas_foto').dropify();

            if ($(".js-select").length) {
                $(".js-select").select2();
            }

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
