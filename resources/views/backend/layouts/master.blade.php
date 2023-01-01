<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $page_setting['title'] }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('upload/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">

    <!-- Plugins CSS -->
    @stack('plugins-css')

    <!-- Fonts CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/feather-font/css/iconfont.css') }}">

    <!-- Template CSS -->
    {{-- @vite('public/asset/css/backend.css') --}}
    <link rel="stylesheet" href="{{ asset('asset/css/backend.css') }}">

    <!-- Customs CSS -->
    @stack('customs-css')

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
    <div class="main-wrapper">
        @include('backend.layouts.sidebar')
        <div class="page-wrapper">
            @include('backend.layouts.navbar')
            <div class="page-content">
                @yield('content')
            </div>
            @include('backend.layouts.footer')
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('vendor/core/core.js') }}"></script>
    <script src="{{ asset('vendor/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- Plugins JS -->
    @stack('plugins-js')

    <!-- Fonts JS -->
    <script src="{{ asset('vendor/feather-icons/feather.min.js') }}"></script>

    <!-- Template JS -->
    {{-- @vite('public/asset/js/backend.js') --}}
    <script src="{{ asset('asset/js/backend.js') }}"></script>

    <!-- Customs JS -->
    @include('backend.layouts.messages')
    @stack('customs-js')
</body>

</html>
