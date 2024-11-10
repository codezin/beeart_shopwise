<footer class="footer_dark">
    <div class="footer-icons">
        <div class="container">
            <div class="footer-icons-list">
                @if (theme_option('social_links'))
                <div class="social-links">
                    @foreach(json_decode(theme_option('social_links'), true) as $socialLink)
                    @if(strtolower($socialLink[0]['value'])=="facebook")
                    <a href="{{ $socialLink[2]['value'] }}"><img src="{{base}}assets/images/icons/fb-color.svg" /></a>
                    @elseif(strtolower($socialLink[0]['value'])=="instagram")
                    <a href="{{ $socialLink[2]['value'] }}"><img src="{{base}}assets/images/icons/instagram-color.svg" /></a>
                    @else
                    <li>
                        <a href="{{ $socialLink[2]['value'] }}"
                            title="{{ $socialLink[0]['value'] }}" style="background-color: {{ $socialLink[3]['value'] }}; border: 1px solid {{ $socialLink[3]['value'] }};" target="_blank">
                            <i class="{{ $socialLink[1]['value'] }}"></i>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </div>
                @endif
                <div class="payment-methods">
                    <img src="{{base}}assets/images/icons/visa.svg" />
                    <img src="{{base}}assets/images/icons/mastercard.svg" />
                    <img src="{{base}}assets/images/icons/americanexpress.svg" />
                    <img src="{{base}}assets/images/icons/jcb.svg" />
                    <img src="{{base}}assets/images/icons/applepay.svg" />
                    <img src="{{base}}assets/images/icons/ggpay.svg" />
                </div>
            </div>
        </div>
    </div>
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="{{ route('public.index') }}"><img src="{{ RvMedia::getImageUrl(theme_option('logo_footer')) }}" alt="logo" /></a>
                        </div>
                        <p>ABN: {{theme_option("abn")}}</p>
                        {{-- <p>{{theme_option('address')}}8</p> --}}
                        <p><a href="tel:{{theme_option('hotline')}}">{{__("Call")}}: {{theme_option('hotline')}}</a></p>
                        <p>
                            <a href="mailto:{{theme_option('email')}}">Email: {{theme_option('email')}}</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">About Us</h6>
                        {!! Menu::renderMenuLocation('footer-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Infomation</h6>
                        {!! Menu::renderMenuLocation('links-menu', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}

                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    @php
                        $block = get_blocks_by_slug('newsletter');
                    @endphp
                    <div class="widget">
                        <h6 class="widget_title">{{$block ->name}}</h6>
                        <p>{{$block ->description}}</p>
                        <form action="{{ route('public.newsletter.subscribe') }}" method="post">
                            <div>
                                <input placeholder="Enter your email" name="" class="input-footer" />
                                <small id="footer-email" class="text-muted"></small>
                            </div>
                            @csrf
                            <button type="submit"
                                class="btn btn-fill-out staggered-animation text-uppercase animated slideInLeft" data-animation="slideInLeft" data-animation-delay="1.5s" style="animation-delay: 1.5s; opacity: 1">
                                {{__("Subcribe")}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <p class="mb-md-0 text-center">
                {{theme_option("copyright")}}
            </p>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
@if (is_plugin_active('ecommerce') && EcommerceHelper::isCartEnabled())
<div id="remove-item-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Warning') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Are you sure you want to remove this product from cart?') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-fill-out" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="button" class="btn btn-fill-line confirm-remove-item-cart">{{ __('Yes, remove it!') }}</button>
            </div>
        </div>
    </div>
</div>
@endif
<a href="#" class="scrollup" style="display: none"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="{{ base }}assets/js/jquery-3.7.1.min.js"></script>
<!-- popper min js -->
<script src="{{ base }}assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{ base }}assets/bootstrap/js/bootstrap.min.js"></script>
<!-- owl-carousel min js  -->
<script src="{{ base }}assets/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup min js  -->
<script src="{{ base }}assets/js/magnific-popup.min.js"></script>
<!-- waypoints min js  -->
<script src="{{ base }}assets/js/waypoints.min.js"></script>
<!-- parallax js  -->
<script src="{{ base }}assets/js/parallax.js"></script>
<!-- countdown js  -->
<script src="{{ base }}assets/js/jquery.countdown.min.js"></script>
<!-- imagesloaded js -->
<script src="{{ base }}assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js -->
<script src="{{ base }}assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="{{ base }}assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="{{ base }}assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="{{ base }}assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js -->
<script src="{{ base }}assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript" src="{{ asset('public/themes/assets/js/product_cart.js') }}"></script>

</body>

</html>
