<footer>
    <div class="footer__area footer-bg">
        <div class="footer__top pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <div class="footer__logo">
                                    <a href="{{ route('home.index') }}">
                                        <img src="{{ asset('upload/' . $general_setting->footer_logo) }}" alt="Logo Footer">
                                    </a>
                                </div>
                            </div>
                            <div class="footer__widget-body">
                                <p>
                                    {{ $general_setting->footer_content }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title">Tentang Sekolah</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link">
                                    <ul>
                                        <li><a href="{{ $general_setting->youtube_link }}" class="youtube" target="__blank">Youtube Sekolah</a></li>
                                        <li><a href="{{ $general_setting->tbtk_instagram_link }}" class="instagram" target="__blank">Instagram TBTK</a></li>
                                        <li><a href="{{ $general_setting->tbtk_instagram_link }}" class="instagram" target="__blank">Instagram SD</a></li>
                                        <li><a href="{{ $general_setting->tbtk_instagram_link }}" class="instagram" target="__blank">Instagram SMP</a></li>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-0 col-md-5 offset-sm-1 col-sm-5 col-xs-12">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title">Link Terkait</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link">
                                    <ul>
                                        <li><a href="https://www.santaursula-bdg.sch.id/" target="__blank">Yayasan Prasama Bhakti</a></li>
                                        <li><a href="#" target="__blank">TBTK Santa Ursula</a></li>
                                        <li><a href="#" target="__blank">SD Santa Ursula</a></li>
                                        <li><a href="#" target="__blank">SMP Santa Ursula</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="footer__copyright text-center">
                            <p>
                                © {{ date('Y') }} Kampus Santa Ursula Bandung. Developed By <a href="https://www.santaursula-bdg.sch.id/" target="__blank">IT YPB</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
