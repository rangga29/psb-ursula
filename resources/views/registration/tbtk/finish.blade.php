<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $page_setting['title'] }}</title>

    <link rel="shortcut icon" type="image/x-icon" href={{ asset('upload/favicon.ico') }}>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-5/fontAwesome5Pro.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/registration-finish.css') }}">

    <script type="text/javascript">
        var titleText = document.title + " - ";

        function titleMarquee() {
            titleText = titleText.substring(1, titleText.length) + titleText.substring(0, 1);
            document.title = titleText;
            setTimeout("titleMarquee()", 500);
        }
    </script>
</head>

<body onload="titleMarquee()">
    <section id="thank-you" class="thank-you-section">
        <div class="container">
            <div class="thank-you-wrapper position-relative thank-wrapper-style-one">
                <div class="thank-txt text-center">
                    <div class="thank-icon">
                        <img src="{{ asset('upload/logoServiam.png') }}" alt="" width="150px">
                    </div>
                    <h1>Pendaftaran Telah Sukses Dilakukan</h1>
                    <p>
                        Silahkan cek email untuk melihat rangkuman data pendaftaran beserta password untuk melakukan login ke dashboard calon siswa. Jika email tidak masuk ke inbox silahkan lihat di
                        spam email.
                    </p>
                    <div class="row">
                        <div class="col-sm-6 mb-2">
                            <a class="d-block text-uppercase text-center" href="{{ route('home.index') }}">Keluar</a>
                        </div>
                        <div class="col-sm-6">
                            <a class="d-block text-uppercase text-center" href="{{ route('home.index') }}">Login Calon Siswa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
