<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('upload/favicon.ico') }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/preloader/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/meanmenu/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper-bundle/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/back-to-top/backToTop.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fancy-box/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-5/fontAwesome5Pro.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/elegant-font/elegantFont.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/frontend-default.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/frontend.css') }}">
    {{-- @vite('public/asset/css/frontend-default.css') --}}
    {{-- @vite('public/asset/css/frontend.css') --}}

    <title>PSB Kampus Santa Ursula Bandung</title>

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
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two" style="left:20px;"></div>
                <div class="object" id="object_three" style="left:40px;"></div>
                <div class="object" id="object_four" style="left:60px;"></div>
                <div class="object" id="object_five" style="left:80px;"></div>
            </div>
        </div>
    </div>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <main>
        @yield('content')
    </main>

    <!-- Core JS -->
    <script src="{{ asset('vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('vendor/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/meanmenu/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('vendor/swiper-bundle/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/fancy-box/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('vendor/back-to-top/backToTop.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/ajax-form/ajax-form.js') }}"></script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/images-loaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('asset/js/frontend.js') }}"></script>
    {{-- @vite('public/asset/js/frontend.js') --}}

    <!-- Customs JS -->
    @include('layouts.messages')
    @stack('customs-js')
</body>

</html>
