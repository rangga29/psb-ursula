<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $page_setting['title'] }}</title>

    <link rel="shortcut icon" href="{{ asset('upload/favicon.ico') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/dropify/dist/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/backend.css') }}">

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
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('home.index') }}" class="sidebar-brand">
                    {{ $page_setting['unit'] }}<span>Ursula</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item {{ active_class([$page_setting['unit_slug'] . '/pendaftaran/ketentuan']) }}">
                        <a href="#" class="nav-link" disabled="disabled">
                            <i class="link-icon" data-feather="file-text"></i>
                            <span class="link-title">Ketentuan Pendaftaran</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_class([$page_setting['unit_slug'] . '/pendaftaran/form']) }}">
                        <a href="#" class="nav-link" disabled="disabled">
                            <i class="link-icon" data-feather="file-text"></i>
                            <span class="link-title">Formulir Pendaftaran</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_class([$page_setting['unit_slug'] . '/pendaftaran/finish']) }}">
                        <a href="#" class="nav-link" disabled="disabled">
                            <i class="link-icon" data-feather="file-text"></i>
                            <span class="link-title">Selesai</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <h4>Penerimaan Siswa Baru {{ $page_setting['unit'] }} Santa Ursula Bandung</h4>
                </div>
            </nav>
            <div class="page-content">
                @yield('content')
            </div>
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between border-top small px-4 py-3">
                <p class="text-muted mb-md-0 mb-1">Copyright © {{ date('Y') }} <a href="{{ url('/') }}" target="_blank">{{ $page_setting['unit'] }} SANTA URSULA BANDUNG</a></p>
                <p class="text-muted">Developed By <a href="https://santaursula-bdg.sch.id" target="_blank">IT YPB</a></p>
            </footer>
        </div>
    </div>

    <script src="{{ asset('vendor/core/core.js') }}"></script>
    <script src="{{ asset('vendor/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('vendor/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('asset/js/backend.js') }}"></script>
    @include('layouts.messages')
    @stack('customs-js')
</body>

</html>
