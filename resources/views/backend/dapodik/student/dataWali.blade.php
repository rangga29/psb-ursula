@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Data Siswa</li>
            <li class="breadcrumb-item active" aria-current="page">Data Wali</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder text-uppercase mb-3">#5 - Data Wali</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <small>
                                    <li>{{ $error }}</li>
                                </small>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                        </div>
                    @endif
                    <form action="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.dapodik.wali.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                        <div class="row mb-4">
                            <label for="wali_nama_lengkap" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Lengkap</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('wali_nama_lengkap') is-invalid @enderror" name="wali_nama_lengkap" id="wali_nama_lengkap" placeholder="Nama Lengkap"
                                    value="{{ old('wali_nama_lengkap') }}">
                                @error('wali_nama_lengkap')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_nik" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nomor Induk Kependudukan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('wali_nik') is-invalid @enderror" name="wali_nik" id="wali_nik" placeholder="Nomor Induk Kependudukan"
                                    value="{{ old('wali_nik') }}">
                                @error('wali_nik')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_kota_lahir" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kota Kelahiran</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('wali_kota_lahir') is-invalid @enderror" name="wali_kota_lahir" id="wali_kota_lahir" placeholder="Kota Kelahiran"
                                    value="{{ old('wali_kota_lahir') }}">
                                @error('wali_kota_lahir')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_tanggal_lahir" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Tanggal Lahir</label>
                            <div class="col-md-8 col-xxl-10">
                                <div class="input-group date datepicker" id="datePicker">
                                    <input type="text" class="form-control @error('wali_tanggal_lahir') is-invalid @enderror" name="wali_tanggal_lahir" id="wali_tanggal_lahir"
                                        placeholder="Tanggal Lahir" value="{{ old('wali_tanggal_lahir') }}">
                                    <small class="input-group-text input-group-addon"><i data-feather="calendar"></i></small>
                                </div>
                                @error('wali_tanggal_lahir')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_agama" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Agama</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="wali_agama" id="wali_agama" data-width="100%">
                                    <option value="Katolik" {{ old('wali_agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Kristen Protestan" {{ old('wali_agama') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                    <option value="Islam" {{ old('wali_agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Hindu" {{ old('wali_agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ old('wali_agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Kong Hu Cu" {{ old('wali_agama') == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                                    <option value="Kepercayaan Kepada Tuhan YME" {{ old('wali_agama') == 'Kepercayaan Kepada Tuhan YME' ? 'selected' : '' }}>Kepercayaan Kepada Tuhan YME</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_kewarganegaraan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kewarganegaraan</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="wali_kewarganegaraan" id="wali_kewarganegaraan" data-width="100%">
                                    <option value="WNI" {{ old('wali_kewarganegaraan') == 'WNI' ? 'selected' : '' }}>Warga Negara Indonesia</option>
                                    <option value="WNA" {{ old('wali_kewarganegaraan') == 'WNA' ? 'selected' : '' }}>Warga Negara Asing</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_pendidikan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Pendidikan Terakhir</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="wali_pendidikan" id="wali_pendidikan" data-width="100%">
                                    <option value="SD" {{ old('wali_pendidikan') == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('wali_pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ old('wali_pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="Diploma 1" {{ old('wali_pendidikan') == 'Diploma 1' ? 'selected' : '' }}>Diploma 1</option>
                                    <option value="Diploma 2" {{ old('wali_pendidikan') == 'Diploma 2' ? 'selected' : '' }}>Diploma 2</option>
                                    <option value="Diploma 3" {{ old('wali_pendidikan') == 'Diploma 3' ? 'selected' : '' }}>Diploma 3</option>
                                    <option value="Diploma 4" {{ old('wali_pendidikan') == 'Diploma 4' ? 'selected' : '' }}>Diploma 4</option>
                                    <option value="Sarjana 1" {{ old('wali_pendidikan') == 'Sarjana 1' ? 'selected' : '' }}>Sarjana 1</option>
                                    <option value="Sarjana 2" {{ old('wali_pendidikan') == 'Sarjana 2' ? 'selected' : '' }}>Sarjana 2</option>
                                    <option value="Sarjana 3" {{ old('wali_pendidikan') == 'Sarjana 3' ? 'selected' : '' }}>Sarjana 3</option>
                                    <option value="Lainnya" {{ old('wali_pendidikan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_pekerjaan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Pekerjaan</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="wali_pekerjaan" id="wali_pekerjaan" data-width="100%">
                                    <option value="Tidak Bekerja" {{ old('wali_pekerjaan') == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                    <option value="PNS/TNI/Polri" {{ old('wali_pekerjaan') == 'PNS/TNI/Polri' ? 'selected' : '' }}>PNS/TNI/Polri</option>
                                    <option value="Karyawan Swasta" {{ old('wali_pekerjaan') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                                    <option value="Pedagang Kecil" {{ old('wali_pekerjaan') == 'Pedagang Kecil' ? 'selected' : '' }}>Pedagang Kecil</option>
                                    <option value="Pedagang Besar" {{ old('wali_pekerjaan') == 'Pedagang Besar' ? 'selected' : '' }}>Pedagang Besar</option>
                                    <option value="Wiraswasta" {{ old('wali_pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                    <option value="Wirausaha" {{ old('wali_pekerjaan') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                    <option value="Buruh" {{ old('wali_pekerjaan') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                    <option value="Pensiunan" {{ old('wali_pekerjaan') == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                    <option value="Sudah Meninggal" {{ old('wali_pekerjaan') == 'Sudah Meninggal' ? 'selected' : '' }}>Sudah Meninggal</option>
                                    <option value="Lainnya" {{ old('wali_pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_jabatan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jabatan Pekerjaan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('wali_jabatan') is-invalid @enderror" name="wali_jabatan" id="wali_jabatan" placeholder="Jabatan Pekerjaan"
                                    value="{{ old('wali_jabatan') }}">
                                @error('wali_jabatan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_pendapatan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Pendapatan Per Bulan</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="wali_pendapatan" id="wali_pendapatan" data-width="100%">
                                    <option value="gol1" {{ old('wali_pendapatan') == 'gol1' ? 'selected' : '' }}>Tidak Berpenghasilan</option>
                                    <option value="gol2" {{ old('wali_pendapatan') == 'gol2' ? 'selected' : '' }}>Kurang dari Rp 2.000.000</option>
                                    <option value="gol3" {{ old('wali_pendapatan') == 'gol3' ? 'selected' : '' }}>Rp 2.000.000 - 5.000.000</option>
                                    <option value="gol4" {{ old('wali_pendapatan') == 'gol4' ? 'selected' : '' }}>Rp 5.000.000 - 10.000.000</option>
                                    <option value="gol5" {{ old('wali_pendapatan') == 'gol5' ? 'selected' : '' }}>Lebih Dari Rp 10.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_nama_perusahaan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Perusahaan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('wali_nama_perusahaan') is-invalid @enderror" name="wali_nama_perusahaan" id="wali_nama_perusahaan"
                                    placeholder="Nama Perusahaan" value="{{ old('wali_nama_perusahaan') }}">
                                @error('wali_nama_perusahaan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_alamat_perusahaan" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Alamat Perusahaan</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('wali_alamat_perusahaan') is-invalid @enderror" name="wali_alamat_perusahaan" id="wali_alamat_perusahaan"
                                    placeholder="Alamat Perusahaan" value="{{ old('wali_alamat_perusahaan') }}">
                                @error('wali_alamat_perusahaan')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_kebutuhan_khusus" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Berkebutuhan Khusus</label>
                            <div class="col-md-8 col-xxl-10">
                                <select class="form-select js-select" name="wali_kebutuhan_khusus" id="wali_kebutuhan_khusus" data-width="100%">
                                    <option value="Ya" {{ old('wali_kebutuhan_khusus') == 'Ya' ? 'selected' : '' }}>Ya</option>
                                    <option value="Tidak" {{ old('wali_kebutuhan_khusus') == 'Tidak' ? 'selected' : 'selected' }}>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_jenis_kebutuhan_khusus" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Jenis Kebutuhan Khusus</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('wali_jenis_kebutuhan_khusus') is-invalid @enderror" name="wali_jenis_kebutuhan_khusus"
                                    id="wali_jenis_kebutuhan_khusus" placeholder="Jenis Kebutuhan Khusus" value="{{ old('wali_jenis_kebutuhan_khusus') }}">
                                <small class="text-normal">* Kosongkan Jika Memilih Tidak</small>
                                @error('wali_jenis_kebutuhan_khusus')
                                    <br><small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_telepon" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">No. Handphone</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('wali_telepon') is-invalid @enderror" name="wali_telepon" id="wali_telepon" placeholder="No. Handphone"
                                    value="{{ old('wali_telepon') }}">
                                @error('wali_telepon')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_email" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Alamat Email</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="email" class="form-control @error('wali_email') is-invalid @enderror" name="wali_email" id="wali_email" placeholder="Alamat Email"
                                    value="{{ old('wali_email') }}">
                                @error('wali_email')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="wali_hubungan_anak" class="col-sm-2 col-form-label fw-bolder text-uppercase">Hubungan Dengan Anak</label>
                            <div class="col-sm-10">
                                <select class="form-select js-select" name="wali_hubungan_anak" id="wali_hubungan_anak" data-width="100%">
                                    <option value="Kakek/Nenek" {{ old('wali_hubungan_anak') == 'Kakek/Nenek' ? 'selected' : '' }}>Kakek/Nenek</option>
                                    <option value="Om/Tante" {{ old('wali_hubungan_anak') == 'Om/Tante' ? 'selected' : '' }}>Om/Tante</option>
                                    <option value="Lainnya" {{ old('wali_hubungan_anak') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                            <a href="{{ route('dashboard.' . $page_setting['unit_slug'] . '.student.dapodik.index') }}" class="btn btn-secondary fw-bolder">KEMBALI</a>
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
