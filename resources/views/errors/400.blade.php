@extends('errors.master')

@section('content')
    <section class="error__area pt-200 pb-200">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="error__item text-center">
                        <div class="error__thumb mb-45">
                            <img src="{{ asset('asset/images/error.png') }}" alt="">
                        </div>
                        <div class="error__content">
                            <h3 class="error__title">Bad Request</h3>
                            <p>Terjadi Error di Browser Anda</p>
                            <a href="{{ route('home.index') }}" class="e-btn e-btn-3 e-btn-4">Kembali Ke Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
