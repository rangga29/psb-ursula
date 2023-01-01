@extends('layouts.master')

@section('content')
    <section class="hero__area hero__height d-flex align-items-center green-bg p-relative" id="home">
        <div class="hero__shape">
            <img class="hero-1-circle" src="{{ asset('asset/images/hero-1-circle.png') }}" alt="">
            <img class="hero-1-circle-2" src="{{ asset('asset/images/hero-1-circle-2.png') }}" alt="">
            <img class="hero-1-dot-2" src="{{ asset('asset/images/hero-1-dot-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="hero__content-wrapper mt-90 mb-100">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="hero__content p-relative z-index-1">
                            <h3 class="hero__title">
                                <span>Penerimaan Siswa Baru</span>
                                KAMPUS SANTA URSULA BANDUNG
                            </h3>
                            <p>Tahun Pelajaran {{ $general_setting->psb_main_year }}</p>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="hero__thumb d-flex p-relative">
                            <div class="hero__thumb-shape">
                                <img class="hero-1-dot" src="{{ asset('asset/images/hero-1-dot.png') }}" alt="">
                                <img class="hero-1-circle-3" src="{{ asset('asset/images/hero-1-circle-3.png') }}" alt="">
                                <img class="hero-1-circle-4" src="{{ asset('asset/images/hero-1-circle-4.png') }}" alt="">
                            </div>
                            <div class="hero__thumb-big">
                                <img src="{{ asset('upload/logoServiam.png') }}" alt="">
                                <div class="hero__quote hero__quote-animation">
                                    <h4><a href="#jalur-penerimaan">PENDAFTARAN PSB {{ $general_setting->psb_main_year }}</a></h4>
                                </div>
                                <div class="hero__quote2 hero__quote-animation">
                                    <h4><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor: pointer;">LOGIN CALON SISWA</a></h4>
                                </div>
                            </div>
                            <div class="hero__thumb-sm mt-50 d-none d-lg-block">
                                <img src="{{ asset('upload/logoEntrepreneurship.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category__area pt-70 pb-50" id="alur-penerimaan">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="section__title-wrapper mb-30">
                        <h2 class="section__title text-uppercase fw-bolder mb-10 text-center">Alur Penerimaan</h2>
                        <h3 class="text-center">
                            Proses <span class="fw-bolder text-uppercase">PSB Kampus Santa Ursula</span> dilakukan secara online mengikuti alur dibawah ini sehingga diharapkan dapat memudahkan calon siswa
                            beserta orangtua dalam mengikuti seluruh proses PSB.
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                    <div class="category__item mb-30 transition-3 d-flex align-items-center">
                        <div class="category__content">
                            <h5 class="category__title mb-2">1 - PENDAFTARAN</h5>
                            <p>
                                Calon siswa mengisi formulir pendaftaran beserta mengupload bukti pembayaran. Calon siswa
                                akan menerima email berisi data pendaftaran beserta username dan password
                                untuk login ke dashboard calon siswa.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                    <div class="category__item mb-30 transition-3 d-flex align-items-center">
                        <div class="category__content">
                            <h5 class="category__title mb-2">2 - OBSERVASI / WAWANCARA</h5>
                            <p>
                                Calon siswa beserta dengan orang tua akan dihubungi melalui email atau nomor handphone yang
                                diberikan saat pendaftaran oleh pihak sekolah untuk penjadwalan dan proses observasi atau wawancara.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                    <div class="category__item mb-30 transition-3 d-flex align-items-center">
                        <div class="category__content">
                            <h5 class="category__title mb-2">3 - PENGUMUMAN PENERIMAAN</h5>
                            <p>
                                Pihak sekolah akan mengumumkan hasil seleksi Penerimaan Siswa Baru. Hasil dari seleksi
                                tersebut dapat dilihat melalui email pribadi masing-masing atau melalui halaman
                                dashboard calon siswa.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                    <div class="category__item mb-30 transition-3 d-flex align-items-center">
                        <div class="category__content">
                            <h5 class="category__title mb-2">4 - KELENGKAPAN DATA SISWA</h5>
                            <p>
                                Calon siswa melengkapi kelengkapan data siswa yang berada di halaman dashboard calon siswa.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                    <div class="category__item mb-30 transition-3 d-flex align-items-center">
                        <div class="category__content">
                            <h5 class="category__title mb-2">5 - KELENGKAPAN DATA ADMINISTRASI</h5>
                            <p>
                                Calon siswa melengkapi kelengkapan data administrasi yang ada di halaman dashboard calon
                                siswa.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12">
                    <div class="category__item mb-30 transition-3 d-flex align-items-center">
                        <div class="category__content">
                            <h5 class="category__title mb-2">6 - KELENGKAPAN DATA PEMBELAJARAN</h5>
                            <p>
                                Calon siswa melengkapi kelengkapan data pembelajaran yang ada di halaman dashboard calon
                                siswa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact__area grey-bg-2 pt-70 pb-50 p-relative fix" id="jalur-penerimaan">
        <div class="contact__shape">
            <img class="contact-shape-5" src="{{ asset('asset/images/contact-shape-5.png') }}" alt="">
            <img class="contact-shape-4" src="{{ asset('asset/images/contact-shape-4.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                    <div class="section__title-wrapper mb-30">
                        <h2 class="section__title text-uppercase fw-bolder mb-10 text-center">Jalur Penerimaan</h2>
                        <h3 class="text-center">
                            Jalur Pendaftaran PSB Kampus Santa Ursula Bandung.
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-12">
                    <div class="contact__item mb-30 transition-3 white-bg text-center">
                        <div class="contact__icon d-flex justify-content-center align-items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#006600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <div class="contact__content mb-5">
                            <h3 class="contact__title text-uppercase mb-3">TBTK Santa Ursula</h3>
                            <div class="row">
                                <a href="#" class="e-btn e-btn-border mb-2" disabled="disabled"></a>
                                @if ($general_setting->tbtk_registration_open == 1)
                                    <a href="{{ route('tbtk.registration.index') }}" class="e-btn e-btn-border mb-2">Pendaftaran</a>
                                @else
                                    <span class="e-btn e-btn-border mb-2" disabled="disabled">Pendaftaran Ditutup</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-12">
                    <div class="contact__item mb-30 transition-3 white-bg text-center">
                        <div class="contact__icon d-flex justify-content-center align-items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#006600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <div class="contact__content">
                            <h3 class="contact__title text-uppercase mb-3">SD Santa Ursula</h3>
                            <div class="row">
                                @if ($general_setting->sd_internal_registration_open == 1)
                                    <a href="{{ route('sd.registration.internal') }}" class="e-btn e-btn-border mb-2">Jalur Internal</a>
                                @else
                                    <span class="e-btn e-btn-border mb-2" disabled="disabled">Jalur Internal Ditutup</span>
                                @endif
                                @if ($general_setting->sd_external_registration_open == 1)
                                    <a href="{{ route('sd.registration.external') }}" class="e-btn e-btn-border mb-2">Jalur External</a>
                                @else
                                    <span class="e-btn e-btn-border mb-2" disabled="disabled">Jalur External Ditutup</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-12">
                    <div class="contact__item mb-30 transition-3 white-bg text-center">
                        <div class="contact__icon d-flex justify-content-center align-items-end">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#006600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-book-open">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                            </svg>
                        </div>
                        <div class="contact__content">
                            <h3 class="contact__title text-uppercase mb-3">SMP Santa Ursula</h3>
                            <div class="row">
                                @if ($general_setting->smp_internal_registration_open == 1)
                                    <a href="{{ route('smp.registration.internal') }}" class="e-btn e-btn-border mb-2">Jalur Internal</a>
                                @else
                                    <span class="e-btn e-btn-border mb-2" disabled="disabled">Jalur Internal Ditutup</span>
                                @endif
                                @if ($general_setting->smp_external_registration_open == 1)
                                    <a href="{{ route('smp.registration.external') }}" class="e-btn e-btn-border mb-2">Jalur External</a>
                                @else
                                    <span class="e-btn e-btn-border mb-2" disabled="disabled">Jalur External Ditutup</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact__area pt-70 pb-70" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-6">
                    <div class="contact__wrapper">
                        <div class="section__title-wrapper mb-40">
                            <h2 class="section__title fw-bolder">KONTAK</h2>
                            <p>Untuk informasi dan pertanyaan lebih lanjut dapat mengisi form atau menghubungi kamu di kontak berikut</p>
                        </div>
                        <div class="contact__form">
                            <form action="{{ route('home.sendMail') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-md-6">
                                        <div class="contact__form-input">
                                            <input type="text" placeholder="Nama Lengkap" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-md-6">
                                        <div class="contact__form-input">
                                            <input type="email" placeholder="Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6">
                                        <div class="contact__form-input">
                                            <select name="target" required>
                                                <option value="">Tujuan Pertanyaan</option>
                                                <option value="tbtk">Unit TBTK</option>
                                                <option value="sd">Unit SD</option>
                                                <option value="smp">Unit SMP</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6">
                                        <div class="contact__form-input">
                                            <input type="number" placeholder="No. Handphone (WA)" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <input type="text" placeholder="Judul" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__form-input">
                                            <textarea placeholder="Tuliskan Pesanmu Disini" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="contact__btn">
                                            <button type="submit" class="e-btn">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1 col-lg-5 offset-lg-1">
                    <div class="contact__info white-bg p-relative z-index-1">
                        <div class="contact__info-inner white-bg">
                            <ul>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-20">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="map" viewBox="0 0 24 24">
                                                <path class="st0" d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z" />
                                                <circle class="st0" cx="12" cy="10" r="3" />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>TBTK Santa Ursula Bandung</h4>
                                            <p>
                                                <a href="https://www.google.com/maps/place/Jl.+Bengawan,+Cihapit,+Kec.+Bandung+Wetan,+Kota+Bandung,+Jawa+Barat+40114/@-6.9130964,107.6333201,18.5z/data=!4m5!3m4!1s0x2e68e7cf5bd8ba8b:0x878f21897823a15e!8m2!3d-6.9128821!4d107.6333238"
                                                    target="_blank">
                                                    Jalan Bengawan No. 2, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa
                                                    Barat 40114
                                                </a>
                                            </p>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-10">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="call" viewBox="0 0 24 24">
                                                <path class="st0"
                                                    d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z" />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Phone</h4>
                                            <p><a href="tel:0227211367">(022) 721 1367</a></p>
                                            <p><a href="tel:082376919151">0823 7691 9151</a></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr>
                            <ul>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-20">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="map" viewBox="0 0 24 24">
                                                <path class="st0" d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z" />
                                                <circle class="st0" cx="12" cy="10" r="3" />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>SD Santa Ursula Bandung</h4>
                                            <p>
                                                <a href="https://www.google.com/maps/place/SD+Santa+Ursula+Bandung/@-6.9132074,107.6313097,17z/data=!3m1!4b1!4m5!3m4!1s0x2e68e738803d000f:0x42b5b5a82676a79a!8m2!3d-6.9132512!4d107.6335219"
                                                    target="_blank">
                                                    Jalan Bengawan No. 2, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa
                                                    Barat 40114
                                                </a>
                                            </p>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-10">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="call" viewBox="0 0 24 24">
                                                <path class="st0"
                                                    d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z" />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Phone</h4>
                                            <p><a href="tel:0227201774">(022) 720 1774</a></p>
                                            <p><a href="tel:081312968910">0813 1296 8910</a></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr>
                            <ul>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-20">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="map" viewBox="0 0 24 24">
                                                <path class="st0" d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z" />
                                                <circle class="st0" cx="12" cy="10" r="3" />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>SMP Santa Ursula Bandung</h4>
                                            <p>
                                                <a href="https://www.google.com/maps/place/Santa+Ursula+Junior+High+School/@-6.9109773,107.6308803,18.25z/data=!4m5!3m4!1s0x2e68e7cebb2dc239:0xd61dd38d552a40c6!8m2!3d-6.9110678!4d107.6309665"
                                                    target="_blank">
                                                    Jalan Taman Anggrek No.1, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114
                                                </a>
                                            </p>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact__info-item d-flex align-items-start mb-10">
                                        <div class="contact__info-icon mr-15">
                                            <svg class="call" viewBox="0 0 24 24">
                                                <path class="st0"
                                                    d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z" />
                                            </svg>
                                        </div>
                                        <div class="contact__info-text">
                                            <h4>Phone</h4>
                                            <p><a href="tel:0227274584">(022) 727 4584</a></p>
                                            <p><a href="tel:081220152429">0812 2015 2429</a></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
