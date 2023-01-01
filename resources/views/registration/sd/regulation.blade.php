@extends('registration.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h1 class="page-title fw-bolder text-uppercase">Ketentuan Pendaftaran [Jalur {{ $page_setting['path'] }}]</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-xl-1 col-xl-9 grid-margin stretch-card">
            @if ($page_setting['unit'] == 'SD')
                <div class="card">
                    <div class="card-body main-content text-center">
                        @if ($page_setting['path'] == 'Internal')
                            <h4 id="changing-seperator" class="fw-bolder">-- 1 --</h4>
                            <p class="mb-4">
                                <span class="fw-bolder">Jalur Internal</span> dikhususkan untuk calon siswa yang berasal dari TK Santa Ursula Bandung.
                            </p>
                            <hr>
                        @else
                            <h4 id="changing-seperator" class="fw-bolder">-- 1 --</h4>
                            <p class="mb-4">
                                <span class="fw-bolder">Jalur External</span> dikhususkan untuk calon siswa yang tidak berasal dari TK Santa Ursula Bandung atau ketika PSB Jalur Internal tidak dibuka.
                            </p>
                            <hr>
                        @endif
                        <h4 id="changing-seperator" class="fw-bolder">-- 2 --</h4>
                        <p class="mb-4">
                            Orang tua calon siswa melakukan pembelian formulir pendaftaran sebesar <span class="fw-bolder">Rp.150.000.00 (Seratus Lima Puluh Ribu Rupiah)</span> yang dapat ditransfer
                            melalui rekening <span class="fw-bolder">Bank Mandiri : 13 100 7777 9900 a.n. Yayasan Prasama Bhakti</span>.
                        </p>
                        <hr>
                        <h4 id="changing-seperator" class="fw-bolder">-- 3 --</h4>
                        <p class="mb-4">
                            Orang tua calon siswa diwajibkan mengisi formulir pendaftaran dengan lengkap dan benar.
                        </p>
                        <hr>
                        <h4 id="changing-seperator" class="fw-bolder">-- 4 --</h4>
                        <p class="mb-4">
                            Untuk kenyamanan lebih dalam mengisi formulir pendaftaran, direkomendasikan menggunakan komputer atau laptop.
                        </p>
                        <hr>
                        <h4 id="changing-seperator" class="fw-bolder">-- 5 --</h4>
                        <p class="mb-4">
                            Jika terdapat kesulitan atau pertanyaan silahkan hubungi kami melalui telepon <a href="tel:0227201774">(022) 720 1774</a> atau <a href="tel:081312968910">0813 1296 8910</a>.
                        </p>
                        <hr class="mt-2 mb-2">
                        <div class="d-grid gap2">
                            @if ($page_setting['path'] == 'Internal')
                                <a href="{{ route('sd.registration.internalForm') }}" class="btn btn-primary me-2 fw-bolder">SUBMIT</a>
                            @else
                                <a href="{{ route('sd.registration.externalForm') }}" class="btn btn-primary me-2 fw-bolder">SUBMIT</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
