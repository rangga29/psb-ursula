<header>
    <div id="header-sticky" class="header__area header__transparent header__padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="header__left d-flex">
                        <div class="logo">
                            <a href="{{ route('home.index') }}">
                                <img class="logo-white" src={{ asset('upload/' . $general_setting->header_logo_white) }} alt="logo">
                                <img class="logo-black" src={{ asset('upload/' . $general_setting->header_logo_black) }} alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 d-none d-xl-block">
                    <div class="main-menu main-menu-3 d-flex justify-content-end">
                        <nav id="mobile-menu">
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#alur-penerimaan">Alur Penerimaan</a></li>
                                <li><a href="#jalur-penerimaan">Jalur Penerimaan</a></li>
                                <li><a href="#kontak">Kontak</a></li>
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor: pointer;">Login Calon Siswa</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-1 col-xl-1 col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="header__right d-flex justify-content-end align-items-center">
                        <div class="sidebar__menu d-xl-none">
                            <div class="sidebar-toggle-btn sidebar-toggle-btn-white ml-30" id="sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="sidebar__area">
    <div class="sidebar__wrapper">
        <div class="sidebar__close">
            <button class="sidebar__close-btn" id="sidebar__close-btn">
                <span><i class="fal fa-times"></i></span>
                <span>Close</span>
            </button>
        </div>
        <div class="sidebar__content">
            <div class="mobile-menu fix mt-50"></div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
