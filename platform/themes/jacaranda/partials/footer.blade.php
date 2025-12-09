<footer id="footer">
  <div class="container-fluid">
      <div class="row mb-5">
          <div class="col-md-2">
              <p class="text-center"><a href="index.html"><img src="{{base}}asset/images/blogo.png" class="img-fluid"></a></p>
          </div>
          <div class="col-md-3 mt-5 mt-lg-0">
              <div class="title-footer">
                  <h2>Our store</h2>
              </div>

              <div class="info-item mb-3 d-flex align-items-start justify-content-center">
                  <img src="{{base}}asset/images/icon1.png">
                    {{theme_option("address")}}
              </div>
              <div class="info-item mb-3 d-flex align-items-center">
                  <img src="{{base}}asset/images/icon2.png">
                  {{theme_option("email")}}
              </div>
              <div class="info-item mb-3 d-flex align-items-center">
                  <img src="{{base}}asset/images/icon3.png">
                  {{theme_option("hotline")}}
              </div>
          </div>
          <div class="col-md-3 mt-5 mt-lg-0">
              <div class="title-footer">
                  <h2>Infomation</h2>
              </div>
              <div class="row">

                    {!! Menu::renderMenuLocation('footer-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
                  {{-- <div class="col-md-6 mb-3"><a href="">Shipping Policy</a></div>
                  <div class="col-md-6 mb-3"><a href="">About us</a></div>
                  <div class="col-md-6 mb-3"><a href="">Privacy Policy</a></div>
                  <div class="col-md-6 mb-3"><a href="">Shop</a></div>
                  <div class="col-md-6 mb-3"><a href="">Refund Policy</a></div>
                  <div class="col-md-6 mb-3"><a href="">Track order</a></div>
                  <div class="col-md-6 mb-3"><a href="">Terms of Service</a></div>
                  <div class="col-md-6 mb-3"><a href="">Contact us</a></div>
                  <div class="col-md-6 mb-3"><a href="">FAQs</a></div> --}}
              </div>
          </div>
          <div class="col-md-3 mt-5 mt-lg-0">
                @php
                $block = get_blocks_by_slug("subscribe");
                @endphp
              <div class="title-footer">
                  <h2>{{$block->name}}</h2>
              </div>
              <p>{{$block->description}}</p>
              <form method="post" action="{{ route('public.newsletter.subscribe') }}">
              <div id="newsletter" class="input-group mb-3">
                   
                       
                  <input name="email" type="email" class="form-control" placeholder="Enter email" aria-label="Enter email" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa-light fa-arrow-right"></i></button>
                  @csrf
                
              </div>
            </form>
              <div id="bsocial">  Follow us on:
                  <a href=""><i class="fa-brands fa-facebook"></i></a>
                  <a href=""><i class="fa-brands fa-instagram"></i></a>
                  <a href=""><i class="fa-brands fa-tiktok"></i></a>
              </div>
          </div>
      </div>

      <div class="text-center"><img src="{{base}}asset/images/payment1.png" class="mx-2"> <img src="{{base}}asset/images/payment2.png" class="mx-2"> <img src="{{base}}asset/images/payment3.png" class="mx-2"> <img src="{{base}}asset/images/payment4.png" class="mx-2"> <img src="{{base}}asset/images/payment5.png" class="mx-2"></div>
      <div id="copyright_text" class="text-center mt-3">{{theme_option("copyright")}}</div>
  </div>

</footer>
</div>
{{-- <script type="text/javascript" src="{{base}}asset/js/jquery-3.6.1.min.js"></script> --}}
<script type="text/javascript" src="{{base}}asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{base}}asset/vendor/sweetalert2/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="{{base}}asset/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{base}}asset/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{base}}asset/vendor/aos/aos.js" type="text/javascript"></script>
<script type="text/javascript" src="{{base}}asset/js/js.js?v=1.0"></script>
<script type="text/javascript" src="{{base}}asset/js/nav.js?v=1.1"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        direction: "vertical",
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
</body>
</html>