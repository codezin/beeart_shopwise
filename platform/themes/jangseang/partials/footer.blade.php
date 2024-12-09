<footer>
    <div class="container">
        <div class="footer-columns">
            <div class="footer-column info">
                <div class="info-logo">
                    <img src="{{base}}img/logo-ft.png" alt="Jang Seang Korea" srcset="" />
                    <img src="{{base}}img/logo_footer.png" alt="Jang Seang Korea" srcset="" />
                </div>
                <div class="info-company">
                    <p><strong>{{__("Company name")}}:</strong> Công ty Cổ phần Thương mại Jang Seang Korea</p>
                    <p><strong>{{__("International name")}}:</strong> JANGSEANG KOREA TRADE JOINT STOCK COMPANY</p>
                    <p><strong>{{__("Tax code")}}:</strong> 0110156049</p>
                </div>
                <div class="footer-hotline">
                    <div class="footer-hotline-wrapper">
                        <h3>JangSeang <br />Farm Hotline:</h3>
                        <a href="tel:+82 10 7514 6777">+(82)10.7514.6777</a>
                    </div>
                    <div class="footer-hotline-wrapper">
                        <h3>
                            JangSeang
                            <br />
                            Pharma Hotline:
                        </h3>
                        <span>
                            <a href="tel:+82 10 6287 6886">+(82)10.6287.6886</a>
                            <br />
                            <a href="tel:+82 10 9226 3888">+(82)10.9226.3888</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="footer-column">
                <h3>{{__("Ecosystem")}}</h3>
                {!! Menu::renderMenuLocation('categories-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}

            </div>

            <div class="footer-column">
                <h3>{{(__("Link"))}}</h3>
                {!! Menu::renderMenuLocation('footer-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
            </div>

            <div class="footer-column">
                <h3>{{__("Customer support")}}</h3>
                {!! Menu::renderMenuLocation('links-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
            </div>

            <div class="footer-column">
                <h3>{{__("Connect with us")}}</h3>
                <ul class="social-links">
                    <li>
                        <a href="facebook_link"><img src="{{base}}img/facebook.svg" alt="Facebook" /></a>
                    </li>
                    <li>
                        <a href="tiktok_link"><img src="{{base}}img/tiktok.svg" alt="TikTok" /></a>
                    </li>
                    <li>
                        <a href="instagram_link"><img src="{{base}}img/instagram.svg" alt="Instagram" /></a>
                    </li>
                </ul>
                <div class="map">
                    {!! theme_option("google_map") !!}
                </div>
            </div>
        </div>
    </div>
    <div class="footer-brand">
        <p>{{theme_option("copyright")}}</p>
    </div>
</footer>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/pdf.worker.js"></script> --}}
<script src="{{base}}js/libs/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/three.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/js/pdf.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/3d-flip-book@1.9.9/dist/flip-book.min.js"></script> --}}

<script type="text/javascript" src="{{base}}slick/slick.min.js"></script>
<script type="text/javascript" src="{{base}}js/select2.min.js"></script>
<script type="text/javascript" src="{{base}}js/main.js"></script>
</body>

</html>
