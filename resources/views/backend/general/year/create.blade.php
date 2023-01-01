@extends('backend.layouts.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">General Setting</li>
            <li class="breadcrumb-item">Year Setting</li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h3 class="mb-md-0 fw-bolder mb-3">TAMBAH DATA</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.general.year.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="row mb-4">
                            <label for="code" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Kode Tahun</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="number" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="Kode Tahun" value="{{ old('code') }}">
                                @error('code')
                                    <small class="text-danger">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-xxl-2 col-form-label fw-bolder text-uppercase">Nama Tahun</label>
                            <div class="col-md-8 col-xxl-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Tahun" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">* {{ $message }}</small>
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
