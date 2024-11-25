
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-2">
                <div class="title">Get in touch</div>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{base}}assets/img/icon-livechat.svg" alt="">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        Livechat 24/7
                    </div>
                </div>
                <div class="mt-3 d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{base}}assets/img/icon-tel.svg" alt="">
                    </div>
                    <div class="flex-grow-1 ms-lg-3">
                        <a href="">{{theme_option('hotline')}}</a>
                    </div>
                </div>
                <div class="mt-3 d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{base}}assets/img/icon-tel.svg" alt="">
                    </div>
                    <div class="flex-grow-1 ms-lg-3">
                        <a href="">{{ theme_option('hotline_2') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2 mt-3 mt-lg-0">
                <div class="title">Information</div>
                {!! Menu::renderMenuLocation('footer-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
                {{-- <ul>
                    <li><a href="products.html">Our Products</a></li>
                    <li><a href="blogs.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul> --}}
            </div>
            <div class="col-12 col-md-2 mt-3 mt-lg-0">
                <div class="title">Policies</div>
                {!! Menu::renderMenuLocation('links-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
                {{-- <ul>
                    <li><a href="policy.html">Privacy Policy</a></li>
                    <li><a href="policy.html">Shipping Policy</a></li>
                    <li><a href="policy.html">Refund Policy</a></li>
                    <li><a href="policy.html">Payment Methods</a></li>
                    <li><a href="policy.html">Terms of Service</a></li>
                </ul> --}}
            </div>
            <div class="col-12 col-md-2 mt-3 mt-lg-0">
                <div class="title">Help</div>
                {!! Menu::renderMenuLocation('categories-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}
            </div>
            <div class="col-md-4 mt-3 mt-lg-0">
                <div class="title">Payment methods</div>
                <div class="payment-logo"><img src="{{base}}assets/img/logo-visa.png" alt=""> <img src="assets/img/logo-master-card.png" alt=""> <img src="assets/img/logo-apple-pay.png" alt=""> <img src="assets/img/paypal.png" alt=""></div>

                <div class="title mt-4">Follow us on</div>
                <div class="social-links d-flex">
                    <a href="#" class="twitter"><img src="{{base}}assets/img/icon-facebook.svg" alt=""></a>
                    <a href="#" class="facebook"><img src="{{base}}assets/img/icon-youtube.svg" alt=""></a>
                    <a href="#" class="instagram"><img src="{{base}}assets/img/icon-instagram.svg" alt=""></a>
                    <a href="#" class="linkedin"><img src="{{base}}assets/img/icon-tiktok.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
      <div class="copyright">
        <div class="container">{{theme_option("copyright")}}</div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader1"></div>

{{-- <div id="popupNewletter" class="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">JOIN US</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Enter our giveaway twice a month and stay updated on our hand crafted items</p>
                <form id="frmNewletter">
                    <div><input type="email" class="form-control input-basic" id="txtemail" placeholder="Email*"></div>
                    <div class="input-group phone-group">
                        <div style="border: none;" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="assets/img/usa.png" alt=""></div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><img src="assets/img/usa.png" alt=""> English</a></li>
                            <li><a class="dropdown-item" href="#"><img src="assets/img/usa.png" alt=""> Viet Nam</a></li>
                            <li><a class="dropdown-item" href="#"><img src="assets/img/usa.png" alt=""> Canada</a></li>
                            <li><a class="dropdown-item" href="#"><img src="assets/img/usa.png" alt=""> Japan</a></li>
                            <li><a class="dropdown-item" href="#"><img src="assets/img/usa.png" alt=""> China</a></li>
                        </ul>
                        <input type="text" class="form-control input-basic" id="txtphone" placeholder="Phone*">
                    </div>
                    <div><button id="btnsigup">Sign up</button></div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div id="popupVoucher" class="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div><img src="assets/img/welcome.png" class="img-fluid" alt=""></div>
                <h2 class="mt-4">Hi! I'm Ayaan Berry, I Love your smile.</h2>
                <p class="mt-4"><a href="" id="btnokay">Okay!</a></p>
            </div>
        </div>
    </div>
</div>

  <!-- Vendor JS Files -->
<script type="text/javascript" src="{{base}}assets/js/jquery-3.6.1.min.js"></script>
<script src="{{base}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{base}}assets/vendor/aos/aos.js"></script>
<script src="{{base}}assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{base}}assets/vendor/leaves/js/jquery.rotate.js"></script>
<script src="{{base}}assets/vendor/leaves/js/jquery.classyleaves.js"></script>
<script type="text/javascript">
    /*$(document).ready(function(){
        $('#popupNewletter').modal('show');
    });*/

    var tree = new ClassyLeaves({
        leaves: 8,
        infinite: false,
        speed: 4000
    });

    $(document).ready(function(){
        $(document).on("click","#tree", function (e){
            var totalLeaves = $(".ClassyLeaf").length;
            if(totalLeaves>0){
           //     var tx = -3;
                var  zag =setInterval(function () {
                    var remainLeaves = $(".ClassyLeaf").length;
                    var isdrop = _random(0,1);
                    if(remainLeaves>0){
                     //   $("#tree").rotate({angle:tx, duration: 1000});
                //        if(tx<0) tx = Math.abs(tx);
                //        else tx = tx - (2 * tx) + 1;
                        var no = _random(0, remainLeaves - 1);
                        var obj = $(".ClassyLeaf").eq(no).attr("id");
                        if(isdrop==1)
                        tree._drop(obj);
                        console.log(obj + "-" + no+ "-" + remainLeaves);
                        if(tx==0) clearInterval(zag);
                    }
                    else clearInterval(zag);
                }, 200);
            }
         });

         $(document).on("click",".ClassyLeafFalling", function (e){
             $('#popupVoucher').modal('show');
         });
    });
</script>
  <!-- Template Main JS File -->
<script src="{{base}}assets/js/main.js"></script>

</body>

</html>
