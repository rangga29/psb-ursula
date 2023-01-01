@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{ $page_setting['grade'] }} Admin Management</li>
            <li class="breadcrumb-item">Data Siswa</li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Pribadi</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">UBAH DATA PRIBADI</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.updateDataPribadi', $registration_data->unique_code) }}" method="POST" class="forms-sample">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ $dapodik_pribadi->user_id }}">
                        <div class="row mb-4">
                            <label for="nama_lengkap" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Lengkap</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"
                                    value="{{ old('nama_lengkap', $dapodik_pribadi->nama_lengkap) }}">
                                @error('nama_lengkap')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="nama_panggilan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Panggilan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan"
                                    value="{{ old('nama_panggilan', $dapodik_pribadi->nama_panggilan) }}">
                                @error('nama_panggilan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kota_lahir" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kota Kelahiran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('kota_lahir') is-invalid @enderror" name="kota_lahir" id="kota_lahir" placeholder="Kota Kelahiran"
                                    value="{{ old('kota_lahir', $dapodik_pribadi->kota_lahir) }}">
                                @error('kota_lahir')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tanggal_lahir" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Tanggal Lahir</label>
                            <div class="col-md-8 col-xxl-10">
                                <div class="input-group date datepicker" id="datePicker">
                                    <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir"
                                        value="{{ old('tanggal_lahir', \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_pribadi->tanggal_lahir)->format('d/m/Y')) }}">
                                    <small class="input-group-text input-group-addon"><i data-feather="calendar"></i></small>
                                </div>
                                @error('tanggal_lahir')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="jenis_kelamin" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jenis Kelamin</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="jenis_kelamin" id="jenis_kelamin" data-width="100%">
                                    <option value="Laki-Laki" {{ old('jenis_kelamin', $dapodik_pribadi->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $dapodik_pribadi->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kewarganegaraan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kewarganegaraan</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="kewarganegaraan" id="kewarganegaraan" data-width="100%">
                                    <option value="WNI" {{ old('kewarganegaraan', $dapodik_pribadi->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>Warga Negara Indonesia</option>
                                    <option value="WNA" {{ old('kewarganegaraan', $dapodik_pribadi->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>Warga Negara Asing</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="nama_negara" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Negara</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('nama_negara') is-invalid @enderror" name="nama_negara" id="nama_negara" placeholder="Nama Negara"
                                    value="{{ old('nama_negara', $dapodik_pribadi->nama_negara) }}">
                                <small class="text-normal">* Kosongkan Jika Memilih WNI</small>
                                @error('nama_negara')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="agama" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Agama</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="agama" id="agama" data-width="100%">
                                    <option value="Katolik" {{ old('agama', $dapodik_pribadi->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Kristen Protestan" {{ old('agama', $dapodik_pribadi->agama) == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                    <option value="Islam" {{ old('agama', $dapodik_pribadi->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Hindu" {{ old('agama', $dapodik_pribadi->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ old('agama', $dapodik_pribadi->agama) == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Kong Hu Cu" {{ old('agama', $dapodik_pribadi->agama) == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                                    <option value="Kepercayaan Kepada Tuhan YME" {{ old('agama', $dapodik_pribadi->agama) == 'Kepercayaan Kepada Tuhan YME' ? 'selected' : '' }}>
                                        Kepercayaan Kepada Tuhan YME
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="paroki" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Paroki</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('paroki') is-invalid @enderror" name="paroki" id="paroki" placeholder="Nama Paroki"
                                    value="{{ old('paroki', $dapodik_pribadi->paroki) }}">
                                <small class="text-normal">* Kosongkan Jika Memilih Selain Katolik</small>
                                @error('paroki')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="kebutuhan_khusus" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Berkebutuhan Khusus</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="kebutuhan_khusus" id="kebutuhan_khusus" data-width="100%">
                                    <option value="Ya" {{ old('kebutuhan_khusus', $dapodik_pribadi->kebutuhan_khusus) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('kebutuhan_khusus', $dapodik_pribadi->kebutuhan_khusus) == 'Tidak' ? 'selected' : 'selected' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="jenis_kebutuhan_khusus" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jenis Kebutuhan Khusus</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('jenis_kebutuhan_khusus') is-invalid @enderror" name="jenis_kebutuhan_khusus" id="jenis_kebutuhan_khusus"
                                    placeholder="Jenis Kebutuhan Khusus" value="{{ old('jenis_kebutuhan_khusus', $dapodik_pribadi->jenis_kebutuhan_khusus) }}">
                                <small class="text-normal">* Kosongkan Jika Memilih Tidak</small>
                                @error('jenis_kebutuhan_khusus')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="anak_keberapa" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Anak Keberapa</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('anak_keberapa') is-invalid @enderror" name="anak_keberapa" id="anak_keberapa" placeholder="Anak Keberapa"
                                    value="{{ old('anak_keberapa', $dapodik_pribadi->anak_keberapa) }}">
                                @error('anak_keberapa')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="saudara_kandung" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jumlah Saudara Kandung</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('saudara_kandung') is-invalid @enderror" name="saudara_kandung" id="saudara_kandung"
                                    placeholder="Jumlah Saudara Kandung" value="{{ old('saudara_kandung', $dapodik_pribadi->saudara_kandung) }}">
                                @error('saudara_kandung')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="gol_darah" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Golongan Darah</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="gol_darah" id="gol_darah" data-width="100%">
                                    <option value="A" {{ old('gol_darah', $dapodik_pribadi->gol_darah) == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ old('gol_darah', $dapodik_pribadi->gol_darah) == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ old('gol_darah', $dapodik_pribadi->gol_darah) == 'AB' ? 'selected' : '' }}>AB</option>
                                    <option value="O" {{ old('gol_darah', $dapodik_pribadi->gol_darah) == 'O' ? 'selected' : '' }}>O</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="tinggi_badan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Tinggi Badan (CM)</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan Dalam CM"
                                    value="{{ old('tinggi_badan', $dapodik_pribadi->tinggi_badan) }}">
                                @error('tinggi_badan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="berat_badan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Berat Badan (KG)</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" id="berat_badan" placeholder="Berat Badan Dalam KG"
                                    value="{{ old('berat_badan', $dapodik_pribadi->berat_badan) }}">
                                @error('berat_badan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lingkar_kepala" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Lingkar Kepala (CM)</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('lingkar_kepala') is-invalid @enderror" name="lingkar_kepala" id="lingkar_kepala"
                                    placeholder="Lingkar Kepala Dalam CM" value="{{ old('lingkar_kepala', $dapodik_pribadi->lingkar_kepala) }}">
                                @error('lingkar_kepala')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="nisn" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nomor induk siswa nasional</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" placeholder="Nomor induk siswa nasional"
                                    value="{{ old('nisn', $dapodik_pribadi->nisn) }}">
                                @if ($page_setting['grade'] == 'TBTK')
                                    <small class="text-normal">* Kosongkan Jika Tidak Ada</small>
                                    @error('nisn')
                                        <br><small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                @else
                                    @error('nisn')
                                        <small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="asal_sekolah" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Asal Sekolah</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" id="asal_sekolah" placeholder="Nama Asal Sekolah"
                                    value="{{ old('asal_sekolah', $dapodik_pribadi->asal_sekolah) }}">
                                @if ($page_setting['grade'] == 'TBTK')
                                    <small class="text-normal">* Kosongkan Jika Tidak Ada</small>
                                    @error('asal_sekolah')
                                        <br><small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                @else
                                    @error('asal_sekolah')
                                        <small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="asal_sekolah_alamat" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Alamat Asal Sekolah</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('asal_sekolah_alamat') is-invalid @enderror" name="asal_sekolah_alamat" id="asal_sekolah_alamat"
                                    placeholder="Alamat Asal Sekolah" value="{{ old('asal_sekolah_alamat', $dapodik_pribadi->asal_sekolah_alamat) }}">
                                @if ($page_setting['grade'] == 'TBTK')
                                    <small class="text-normal">* Kosongkan Jika Tidak Ada</small>
                                    @error('asal_alamat_sekolah')
                                        <br><small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                @else
                                    @error('asal_alamat_sekolah')
                                        <small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="asal_sekolah_kota" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kota Asal Sekolah</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('asal_sekolah_kota') is-invalid @enderror" name="asal_sekolah_kota" id="asal_sekolah_kota"
                                    placeholder="Kota Asal Sekolah" value="{{ old('asal_sekolah_kota', $dapodik_pribadi->asal_sekolah_kota) }}">
                                @if ($page_setting['grade'] == 'TBTK')
                                    <small class="text-normal">* Kosongkan Jika Tidak Ada</small>
                                    @error('asal_sekolah_kota')
                                        <br><small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                @else
                                    @error('asal_sekolah_kota')
                                        <small class="text-danger">* {{ $message }}</small>
                                    @enderror
                                @endif
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
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
@endpush

@push('customs-js')
    <script>
        $(function() {
            'use strict';
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
