@extends('registration.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center grid-margin flex-wrap">
        <div>
            <h1 class="page-title fw-bolder text-uppercase">Ketentuan Pendaftaran</h1>
        </div>
    </div>
    <div class="row">
        <div class="offset-xl-1 col-xl-9 grid-margin stretch-card">
            @if ($page_setting['unit'] == 'TBTK')
                <div class="card">
                    <div class="card-body main-content text-center">
                        <h4 id="changing-seperator" class="fw-bolder">-- 1 --</h4>
                        <p class="mb-5">
                            Orang tua calon siswa melakukan pembelian formulir pendaftaran sebesar <span class="fw-bolder">Rp.150.000.00 (Seratus Lima Puluh Ribu Rupiah)</span> yang dapat ditransfer
                            melalui rekening <span class="fw-bolder">Bank Mandiri : 13 100 7777 9900 a.n. Yayasan Prasama Bhakti</span>.
                        </p>
                        <hr>
                        <h4 id="changing-seperator" class="fw-bolder">-- 2 --</h4>
                        <p class="mb-5">
                            Orang tua calon siswa diwajibkan mengisi formulir pendaftaran dengan lengkap dan benar.
                        </p>
                        <hr>
                        <h4 id="changing-seperator" class="fw-bolder">-- 3 --</h4>
                        <p class="mb-5">
                            Untuk kenyamanan lebih dalam mengisi formulir pendaftaran, direkomendasikan menggunakan komputer atau laptop.
                        </p>
                        <hr>
                        <h4 id="changing-seperator" class="fw-bolder">-- 4 --</h4>
                        <p class="mb-5">
                            Jika terdapat kesulitan atau pertanyaan silahkan hubungi kami melalui telepon <a href="tel:0227211367">(022) 721 1367</a> atau <a href="tel:082376919151">0823 7691 9151</a>.
                        </p>
                        <hr class="mt-2 mb-2">
                        <div class="d-grid gap2">
                            <a href="{{ route('tbtk.registration.form') }}" class="btn btn-primary me-2 fw-bolder">SUBMIT</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
