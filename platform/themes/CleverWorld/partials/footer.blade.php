<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class="text-center">
                    <a href="{{ route('public.index') }}">
                        <img src="{{ RvMedia::getImageUrl(theme_option('logo_footer')) }}"
                            style="max-height:140px;width:auto"></a>
                </p>
                <h4 class="mt-5">{{ theme_option('site_title') }} </h4>
                <div class="mt-3"> {{ theme_option('address') }}
                </div>
            </div>

            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-5 mt-5 mt-lg-0">
                        <div class="title-footer">
                            <h2>{{ __('Contact') }}</h2>
                        </div>
                        <div class="info-item mb-3 d-flex align-items-center">
                            <a href="tel: {{ theme_option('hotline') }}">
                                <img src="{{ base }}asset/images/icon3.svg">
                                {{ theme_option('hotline') }}
                            </a>
                        </div>
                        <div class="info-item mb-3 d-flex align-items-center">
                            <a href="mailto: {{ theme_option('email') }}">
                                <img src="{{ base }}asset/images/icon2.svg">
                                {{ theme_option('email') }}
                            </a>
                        </div>
                        <div class="info-item mb-3">
                            <a href="https://{{ theme_option('website') }}">
                                <img src="{{ base }}asset/images/world-wide.svg" style="height: 24px">
                                {{ theme_option('website') }}
                            </a>
                        </div>

                    </div>
                    <div class="col-md-7 mt-5 mt-lg-0">
                        <div class="title-footer">
                            <h2>{{ __('About Us') }}</h2>
                        </div>
                        <div class="d-flex justify-content-between sm-flex-direction-column ">
                            <div class="">
                                {!! Menu::renderMenuLocation('footer-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
                            </div>
                            <div class="">
                                {!! Menu::renderMenuLocation('categories-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row footer-parter">

                    <h4 class="text-left mb-3">{{ __('Corporate membership website') }}</h4>
                    <div class="text-left">
                        <a href="{{ theme_option('cleverbox') }}" target="_blank" class="logo_cb">
                            <img src="{{ RvMedia::getImageUrl('Logo%20Cb.svg') }}" class="mx-2">
                        </a>
                        <a href="{{ theme_option('peektoy') }}" target="_blank" class="logo_peektoy">
                            <img src="{{ RvMedia::getImageUrl('PEEKTOY LOGO.svg') }}" class="mx-2">
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>

</footer>
</div>
<script type="text/javascript" src="{{ base }}asset/js/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="{{ base }}asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ base }}asset/vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="{{ base }}asset/vendor/glightbox/js/glightbox.min.js"></script>
<script type="text/javascript" src="{{ base }}asset/vendor/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="{{ base }}asset/vendor/aos/aos.js"></script>
<script type="text/javascript" src="{{ base }}asset/js/js.js?v=1.0"></script>
<script type="text/javascript" src="{{ base }}asset/js/nav.js?v=1.1"></script>
</body>

</html>
