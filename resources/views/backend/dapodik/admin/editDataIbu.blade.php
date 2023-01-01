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
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Ibu</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">UBAH DATA IBU</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.' . $page_setting['grade_slug'] . '.admin.dapodik.updateDataIbu', $registration_data->unique_code) }}" method="POST" class="forms-sample">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ $dapodik_ibu->user_id }}">
                        <div class="row mb-4">
                            <label for="ibu_nama_lengkap" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Lengkap</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('ibu_nama_lengkap') is-invalid @enderror" name="ibu_nama_lengkap" id="ibu_nama_lengkap" placeholder="Nama Lengkap"
                                    value="{{ old('ibu_nama_lengkap', $dapodik_ibu->ibu_nama_lengkap) }}">
                                @error('ibu_nama_lengkap')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_nik" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nomor Induk Kependudukan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('ibu_nik') is-invalid @enderror" name="ibu_nik" id="ibu_nik" placeholder="Nomor Induk Kependudukan"
                                    value="{{ old('ibu_nik', $dapodik_ibu->ibu_nik) }}">
                                @error('ibu_nik')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_kota_lahir" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kota Kelahiran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('ibu_kota_lahir') is-invalid @enderror" name="ibu_kota_lahir" id="ibu_kota_lahir" placeholder="Kota Kelahiran"
                                    value="{{ old('ibu_kota_lahir', $dapodik_ibu->ibu_kota_lahir) }}">
                                @error('ibu_kota_lahir')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_tanggal_lahir" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Tanggal Lahir</label>
                            <div class="col-md-8 col-xxl-10">
                                <div class="input-group date datepicker" id="datePicker">
                                    <input type="text" class="form-control @error('ibu_tanggal_lahir') is-invalid @enderror" name="ibu_tanggal_lahir" id="ibu_tanggal_lahir" placeholder="Tanggal Lahir"
                                        value="{{ old('ibu_tanggal_lahir', \Carbon\Carbon::createFromFormat('Y-m-d', $dapodik_ibu->ibu_tanggal_lahir)->format('d/m/Y')) }}">
                                    <small class="input-group-text input-group-addon"><i data-feather="calendar"></i></small>
                                </div>
                                @error('ibu_tanggal_lahir')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_agama" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Agama</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="ibu_agama" id="ibu_agama" data-width="100%">
                                    <option value="Katolik" {{ old('ibu_agama', $dapodik_ibu->ibu_agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Kristen Protestan" {{ old('ibu_agama', $dapodik_ibu->ibu_agama) == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                    <option value="Islam" {{ old('ibu_agama', $dapodik_ibu->ibu_agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Hindu" {{ old('ibu_agama', $dapodik_ibu->ibu_agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ old('ibu_agama', $dapodik_ibu->ibu_agama) == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Kong Hu Cu" {{ old('ibu_agama', $dapodik_ibu->ibu_agama) == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                                    <option value="Kepercayaan Kepada Tuhan YME" {{ old('ibu_agama', $dapodik_ibu->ibu_agama) == 'Kepercayaan Kepada Tuhan YME' ? 'selected' : '' }}>
                                        Kepercayaan Kepada Tuhan YME
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_kewarganegaraan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kewarganegaraan</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="ibu_kewarganegaraan" id="ibu_kewarganegaraan" data-width="100%">
                                    <option value="WNI" {{ old('ibu_kewarganegaraan', $dapodik_ibu->ibu_kewarganegaraan) == 'WNI' ? 'selected' : '' }}>Warga Negara Indonesia</option>
                                    <option value="WNA" {{ old('ibu_kewarganegaraan', $dapodik_ibu->ibu_kewarganegaraan) == 'WNA' ? 'selected' : '' }}>Warga Negara Asing</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_pendidikan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Pendidikan Terakhir</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="ibu_pendidikan" id="ibu_pendidikan" data-width="100%">
                                    <option value="SD" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="Diploma 1" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'Diploma 1' ? 'selected' : '' }}>Diploma 1</option>
                                    <option value="Diploma 2" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'Diploma 2' ? 'selected' : '' }}>Diploma 2</option>
                                    <option value="Diploma 3" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'Diploma 3' ? 'selected' : '' }}>Diploma 3</option>
                                    <option value="Diploma 4" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'Diploma 4' ? 'selected' : '' }}>Diploma 4</option>
                                    <option value="Sarjana 1" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'Sarjana 1' ? 'selected' : '' }}>Sarjana 1</option>
                                    <option value="Sarjana 2" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'Sarjana 2' ? 'selected' : '' }}>Sarjana 2</option>
                                    <option value="Sarjana 3" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'Sarjana 3' ? 'selected' : '' }}>Sarjana 3</option>
                                    <option value="Lainnya" {{ old('ibu_pendidikan', $dapodik_ibu->ibu_pendidikan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_pekerjaan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Pekerjaan</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="ibu_pekerjaan" id="ibu_pekerjaan" data-width="100%">
                                    <option value="Tidak Bekerja" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                    <option value="PNS/TNI/Polri" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'PNS/TNI/Polri' ? 'selected' : '' }}>PNS/TNI/Polri</option>
                                    <option value="Karyawan Swasta" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                                    <option value="Pedagang Kecil" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil</option>
                                    <option value="Pedagang Besar" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar</option>
                                    <option value="Wiraswasta" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                    <option value="Wirausaha" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                    <option value="Buruh" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                    <option value="Pensiunan" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                    <option value="Lainnya" {{ old('ibu_pekerjaan', $dapodik_ibu->ibu_pekerjaan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_jabatan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jabatan Pekerjaan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('ibu_jabatan') is-invalid @enderror" name="ibu_jabatan" id="ibu_jabatan" placeholder="Jabatan Pekerjaan"
                                    value="{{ old('ibu_jabatan', $dapodik_ibu->ibu_jabatan) }}">
                                @error('ibu_jabatan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_pendapatan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Pendapatan Per Bulan</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="ibu_pendapatan" id="ibu_pendapatan" data-width="100%">
                                    <option value="gol1" {{ old('ibu_pendapatan', $dapodik_ibu->ibu_pendapatan) == 'gol1' ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                                    <option value="gol2" {{ old('ibu_pendapatan', $dapodik_ibu->ibu_pendapatan) == 'gol2' ? 'selected' : '' }}>Kurang dari Rp 2.000.000</option>
                                    <option value="gol3" {{ old('ibu_pendapatan', $dapodik_ibu->ibu_pendapatan) == 'gol3' ? 'selected' : '' }}>Rp 2.000.000 - 5.000.000</option>
                                    <option value="gol4" {{ old('ibu_pendapatan', $dapodik_ibu->ibu_pendapatan) == 'gol4' ? 'selected' : '' }}>Rp 5.000.000 - 10.000.000</option>
                                    <option value="gol5" {{ old('ibu_pendapatan', $dapodik_ibu->ibu_pendapatan) == 'gol5' ? 'selected' : '' }}>Lebih Dari Rp 10.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_nama_perusahaan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Perusahaan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('ibu_nama_perusahaan') is-invalid @enderror" name="ibu_nama_perusahaan" id="ibu_nama_perusahaan"
                                    placeholder="Nama Perusahaan" value="{{ old('ibu_nama_perusahaan', $dapodik_ibu->ibu_nama_perusahaan) }}">
                                @error('ibu_nama_perusahaan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_alamat_perusahaan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Alamat Perusahaan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('ibu_alamat_perusahaan') is-invalid @enderror" name="ibu_alamat_perusahaan" id="ibu_alamat_perusahaan"
                                    placeholder="Alamat Perusahaan" value="{{ old('ibu_alamat_perusahaan', $dapodik_ibu->ibu_alamat_perusahaan) }}">
                                @error('ibu_alamat_perusahaan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_kebutuhan_khusus" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Berkebutuhan Khusus</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="ibu_kebutuhan_khusus" id="ibu_kebutuhan_khusus" data-width="100%">
                                    <option value="Ya" {{ old('ibu_kebutuhan_khusus', $dapodik_ibu->ibu_kebutuhan_khusus) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('ibu_kebutuhan_khusus', $dapodik_ibu->ibu_kebutuhan_khusus) == 'Tidak' ? 'selected' : 'selected' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_jenis_kebutuhan_khusus" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jenis Kebutuhan Khusus</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('ibu_jenis_kebutuhan_khusus') is-invalid @enderror" name="ibu_jenis_kebutuhan_khusus" id="ibu_jenis_kebutuhan_khusus"
                                    placeholder="Jenis Kebutuhan Khusus" value="{{ old('ibu_jenis_kebutuhan_khusus', $dapodik_ibu->ibu_jenis_kebutuhan_khusus) }}">
                                <small class="text-normal">* Kosongkan Jika Memilih Tidak</small>
                                @error('ibu_jenis_kebutuhan_khusus')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_telepon" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">No. Handphone</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('ibu_telepon') is-invalid @enderror" name="ibu_telepon" id="ibu_telepon" placeholder="No. Handphone"
                                    value="{{ old('ibu_telepon', $dapodik_ibu->ibu_telepon) }}">
                                @error('ibu_telepon')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="ibu_email" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Alamat Email</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="email" class="form-control @error('ibu_email') is-invalid @enderror" name="ibu_email" id="ibu_email" placeholder="Alamat Email"
                                    value="{{ old('ibu_email', $dapodik_ibu->ibu_email) }}">
                                @error('ibu_email')
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
