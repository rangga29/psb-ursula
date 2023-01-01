@extends('backend.layouts.master')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('vendor/dropify/dist/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">General Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Main Setting</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">MAIN SETTING</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-bolder" id="page-line-tab" data-bs-toggle="tab" href="#page" role="tab" aria-controls="page" aria-selected="true">PAGE SETTING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder" id="psb-line-tab" data-bs-toggle="tab" href="#psb" role="tab" aria-controls="psb" aria-selected="false">PSB SETTING</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="lineTabContent">
                        <div class="tab-pane fade show active" id="page" role="tabpanel" aria-labelledby="page-line-tab">
                            <form action="{{ route('dashboard.general.main.page-setting') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="header_logo_white" class="form-label fw-bolder">[HEADER] LOGO VERSI PUTIH</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="file" class="form-control" name="header_logo_white" id="header_logo_white" data-height="300"
                                                data-allowed-file-extensions="jpg jpeg png bmp tiff" data-min-width="189" data-max-width="191" data-min-height="29" data-max-height="31" />
                                            <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                            <small>* Width -- Height : 190px -- 30px</small>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="oldHeaderLogoWhite" value="{{ $general_setting->header_logo_white }}">
                                            <img src="{{ asset('upload/' . $general_setting->header_logo_white) }}" class="card-img-top w-100" style="border-radius: 0px; background-color: black;"
                                                alt="Header Logo Versi Putih">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label for="header_logo_black" class="form-label fw-bolder">[HEADER] LOGO VERSI HITAM</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="file" class="form-control" name="header_logo_black" id="header_logo_black" data-height="300"
                                                data-allowed-file-extensions="jpg jpeg png bmp tiff" data-min-width="189" data-max-width="191" data-min-height="29" data-max-height="31" />
                                            <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                            <small>* Width -- Height : 190px -- 30px</small>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="oldHeaderLogoBlack" value="{{ $general_setting->header_logo_black }}">
                                            <img src="{{ asset('upload/' . $general_setting->header_logo_black) }}" class="card-img-top w-100" style="border-radius: 0px; background-color: white;"
                                                alt="Header Logo Versi Hitam">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label for="footer_logo" class="form-label fw-bolder">[FOOTER] LOGO</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="file" class="form-control" name="footer_logo" id="footer_logo" data-height="300" data-allowed-file-extensions="jpg jpeg png bmp tiff"
                                                data-max-width="1901" data-max-height="301" />
                                            <small>* Ekstensi : .jpg | .jpeg | .png | .bmp | .tiff</small><br>
                                            <small>* Width -- Height : 1900px -- 300px</small>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="oldFooterLogo" value="{{ $general_setting->footer_logo }}">
                                            <img src="{{ asset('upload/' . $general_setting->footer_logo) }}" class="card-img-top w-100" style="border-radius: 0px; background-color: black;"
                                                alt="Footer Logo">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label for="footer_content" class="form-label fw-bolder">[FOOTER] KONTEN</label>
                                    <div class="row">
                                        <textarea class="form-control @error('footer_content') is-invalid @enderror" name="footer_content" id="footer_content" rows="5">{{ old('footer_content', $general_setting->footer_content) }}</textarea>
                                        @error('footer_content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="youtube_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Youtube</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" id="youtube_link" placeholder="Link Youtube"
                                            value="{{ old('youtube_link', $general_setting->youtube_link) }}">
                                        @error('youtube_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tbtk_instagram_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Instagram TBTK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('tbtk_instagram_link') is-invalid @enderror" name="tbtk_instagram_link" id="tbtk_instagram_link"
                                            placeholder="Link Instagram TBTK" value="{{ old('tbtk_instagram_link', $general_setting->tbtk_instagram_link) }}">
                                        @error('tbtk_instagram_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="sd_instagram_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Instagram SD</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('sd_instagram_link') is-invalid @enderror" name="sd_instagram_link" id="sd_instagram_link"
                                            placeholder="Link Instagram SD" value="{{ old('sd_instagram_link', $general_setting->sd_instagram_link) }}">
                                        @error('sd_instagram_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="smp_instagram_link" class="col-sm-2 col-form-label fw-bolder text-uppercase">Link Instagram SMP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('smp_instagram_link') is-invalid @enderror" name="smp_instagram_link" id="smp_instagram_link"
                                            placeholder="Link Instagram SMP" value="{{ old('smp_instagram_link', $general_setting->smp_instagram_link) }}">
                                        @error('smp_instagram_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <button type="button" id="button-submit" class="btn btn-primary me-2 fw-bolder">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="psb" role="tabpanel" aria-labelledby="psb-line-tab">
                            <form action="{{ route('dashboard.general.main.psb-setting') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row mb-4">
                                    <label for="psb_main_year" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">PSB Tahun Utama</label>
                                    <div class="col-md-8 col-xxl-10">
                                        <input type="text" class="form-control @error('psb_main_year') is-invalid @enderror" name="psb_main_year" id="psb_main_year" placeholder="PSB Tahun Utama"
                                            value="{{ old('psb_main_year', $general_setting->psb_main_year) }}">
                                        @error('psb_main_year')
                                            <small class="text-danger">* {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tbtk_registration_open" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">PSB TBTK</label>
                                    <div class="col-md-8 col-xxl-10">
                                        <select class="form-select js-select" name="tbtk_registration_open" id="tbtk_registration_open" data-width="100%">
                                            <option value="1" {{ old('tbtk_registration_open', $general_setting->tbtk_registration_open) == '1' ? 'selected' : '' }}>DIBUKA</option>
                                            <option value="0" {{ old('tbtk_registration_open', $general_setting->tbtk_registration_open) == '0' ? 'selected' : '' }}>DITUTUP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="sd_internal_registration_open" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">PSB SD JALUR INTERNAL</label>
                                    <div class="col-md-8 col-xxl-10">
                                        <select class="form-select js-select" name="sd_internal_registration_open" id="sd_internal_registration_open" data-width="100%">
                                            <option value="1" {{ old('sd_internal_registration_open', $general_setting->sd_internal_registration_open) == '1' ? 'selected' : '' }}>DIBUKA</option>
                                            <option value="0" {{ old('sd_internal_registration_open', $general_setting->sd_internal_registration_open) == '0' ? 'selected' : '' }}>DITUTUP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="sd_external_registration_open" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">PSB SD JALUR EXTERNAL</label>
                                    <div class="col-md-8 col-xxl-10">
                                        <select class="form-select js-select" name="sd_external_registration_open" id="sd_external_registration_open" data-width="100%">
                                            <option value="1" {{ old('sd_external_registration_open', $general_setting->sd_external_registration_open) == '1' ? 'selected' : '' }}>DIBUKA</option>
                                            <option value="0" {{ old('sd_external_registration_open', $general_setting->sd_external_registration_open) == '0' ? 'selected' : '' }}>DITUTUP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="smp_internal_registration_open" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">PSB SMP JALUR INTERNAL</label>
                                    <div class="col-md-8 col-xxl-10">
                                        <select class="form-select js-select" name="smp_internal_registration_open" id="smp_internal_registration_open" data-width="100%">
                                            <option value="1" {{ old('smp_internal_registration_open', $general_setting->smp_internal_registration_open) == '1' ? 'selected' : '' }}>DIBUKA</option>
                                            <option value="0" {{ old('smp_internal_registration_open', $general_setting->smp_internal_registration_open) == '0' ? 'selected' : '' }}>DITUTUP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="smp_external_registration_open" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">PSB SMP JALUR EXTERNAL</label>
                                    <div class="col-md-8 col-xxl-10">
                                        <select class="form-select js-select" name="smp_external_registration_open" id="smp_external_registration_open" data-width="100%">
                                            <option value="1" {{ old('smp_external_registration_open', $general_setting->smp_external_registration_open) == '1' ? 'selected' : '' }}>DIBUKA</option>
                                            <option value="0" {{ old('smp_external_registration_open', $general_setting->smp_external_registration_open) == '0' ? 'selected' : '' }}>DITUTUP</option>
                                        </select>
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
        </div>
    </div>
@endsection

@push('plugins-js')
    <script src="{{ asset('vendor/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
@endpush

@push('customs-js')
    <script>
        $(function() {
            'use strict';
            $('#header_logo_white').dropify();
            $('#header_logo_black').dropify();
            $('#footer_logo').dropify();

            if ($(".js-select").length) {
                $(".js-select").select2();
            }
        });
    </script>
@endpush
