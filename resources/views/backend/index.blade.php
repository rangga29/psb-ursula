@extends('backend.layouts.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">HOME</h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="fw-bolder text-uppercase mt-3 mb-4 text-center">TBTK</h3>
                                <i data-feather="book-open" class="text-success icon-xxl d-block mx-auto my-3"></i>
                                <h1 class="text-center">{{ count($page_setting['tbtk_registrations']) }} Siswa</h1>
                                <p class="fw-light fw-bolder mt-3 mb-2 text-center">RINCIAN</p>
                                <table class="mx-auto">
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Kelas TB : {{ count($page_setting['tb_data']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Kelas TK : {{ count($page_setting['tk_data']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Diterima : {{ count($page_setting['tbtk_diterima']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Tidak Diterima : {{ count($page_setting['tbtk_tidak_diterima']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="fw-bolder text-uppercase mt-3 mb-4 text-center">SD</h3>
                                <i data-feather="book-open" class="text-success icon-xxl d-block mx-auto my-3"></i>
                                <h1 class="text-center">{{ count($page_setting['sd_registrations']) }} Siswa</h1>
                                <p class="fw-light fw-bolder mt-3 mb-1 text-center">RINCIAN</p>
                                <table class="mx-auto">
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Internal : {{ count($page_setting['sd_internal_data']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>External : {{ count($page_setting['sd_external_data']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Diterima : {{ count($page_setting['sd_diterima']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Tidak Diterima : {{ count($page_setting['sd_tidak_diterima']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="fw-bolder text-uppercase mt-3 mb-4 text-center">SMP</h3>
                                <i data-feather="book-open" class="text-success icon-xxl d-block mx-auto my-3"></i>
                                <h1 class="text-center">{{ count($page_setting['smp_registrations']) }} Siswa</h1>
                                <p class="fw-light fw-bolder mt-3 mb-1 text-center">RINCIAN</p>
                                <table class="mx-auto">
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Internal : {{ count($page_setting['smp_internal_data']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>External : {{ count($page_setting['smp_external_data']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Diterima : {{ count($page_setting['smp_diterima']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><i data-feather="check" class="icon-md text-success me-2"></i></td>
                                        <td>
                                            <h4>Tidak Diterima : {{ count($page_setting['smp_tidak_diterima']) }} Siswa</h4>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
