@php
Theme::layout('blog-sidebar');
Theme::asset()->remove('app-js');
Theme::set('pageName', $product->name);
Theme::asset()->usePath()->add('lightGallery-css', 'plugins/lightGallery/css/lightgallery.min.css');
Theme::asset()->container('footer')->usePath()
->add('lightGallery-js', 'plugins/lightGallery/js/lightgallery.min.js', ['jquery']);
@endphp
  <!-- Template Main CSS File -->
  <link href="{{base}}assets/css/main.css" rel="stylesheet">
<main id="main">
    <section id="detail" class="detail">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="slider-products">
                        <!-- Swiper -->
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @if(!empty($productImages))
                                @foreach ($productImages as $img)
                                <div class="swiper-slide">
                                    <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" />
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @if(!empty($productImages))
                                <div class="swiper-slide">
                                    <img src="{{ RvMedia::getImageUrl($productImages[0]) }}" />
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-5 mt-lg-0">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <h2 class="title mt-3">{{$product->name}}</h2>
                        <p class="description">{!! $product->description !!}</p>
                        <form class="add-to-cart-form" method="POST" action="{{ route('public.cart.add-to-cart') }}">
                        @if ($product->variations()->count() > 0)
                        <div class="pr_switch_wrap">
                            {!! render_product_swatches($product, [
                            'selected' => $selectedAttrs,
                            'view' => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer'
                            ]) !!}
                        </div>
                        @endif
                        {!! render_product_options($product) !!}
                        {{-- <div id="size">
                            <div class="title-short">Size:</div>
                            <div class="check-list">
                                <input type="radio" value="small" class="btn-check" name="radbundle" id="radsize1" autocomplete="off" checked>
                                <label class="btnrad" for="radsize1">Small</label>

                                <input type="radio" value="medium" class="btn-check" name="radbundle" id="radsize2" autocomplete="off">
                                <label class="btnrad" for="radsize2">Medium</label>

                                <input type="radio" value="large" class="btn-check" name="radbundle" id="radsize3" autocomplete="off">
                                <label class="btnrad" for="radsize3">Large</label>
                            </div>
                        </div> --}}
                        @if (EcommerceHelper::isCartEnabled())
                        <div class="cart-product-quantity">
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Quantity:</span>
                                <div class="quantity">
                                    <input type="button" value="-" class="minus" />
                                    <input type="text" name="qty" value="1" title="Qty" class="qty" size="4" />
                                    <input type="button" value="+" class="plus" />
                                </div>
                                <div class="float-right number-items-available" style="@if (!$product->isOutOfStock()) display: none; @endif line-height: 45px;">
                                    @if ($product->isOutOfStock())
                                        <span class="text-danger">({{ __('Out of stock') }})</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- <form id="add-to-cart" class="mt-3" action="cart.html" method="post">
                            <div class="title-short">Quantity:</div>
                            <div class="input-group">
                                <span class="input-group-text"><button id="cart-down" type="button" class="btn">-</button></span>
                                <input type="text" id="quantity" style="width: 50px;" class="form-control text-center" value="1" aria-label="Quantity">
                                <span class="input-group-text"><button id="cart-up" type="button" class="btn">+</button></span>
                            </div>
                            <p class="mt-3"><span class="price">$250.10</span> <span class="sale-price">$280.12</span></p>
                            <p> <button type="submit" class="btnaddcart">Take me home</button></p>
                        </form> --}}
                        </form>
                    </div>
                </div>

            </div>

    </section>

    <section id="review-products" class="review">
        <div class="container">
            <div id="title-review-products">
                <h2>Customer Reviews</h2>
                <div class="stars mt-4">
                    <i class="fa-light fa-star"></i> <i class="fa-light fa-star"></i> <i class="fa-light fa-star"></i> <i class="fa-light fa-star"></i> <i class="fa-light fa-star"></i>
                </div>
                <p class="mt-3">Be the first to write a review</p>
                <div class="mt-5"><a class="btn-write" href="">Write a review</a></div>
            </div>

        </div>
    </section>
    @php
    $crossSellProducts = get_cross_sale_products($product);
    @endphp
    @if (count($crossSellProducts) > 0)
    <section id="recent-products" class="recent-products">
        <div class="container">
            <header class="section-header text-center" data-aos="fade-top">
                <h2>More you’ll love</h2>
            </header>

            <div id="recent-products-list" class="product-list">
                <div class="swiper youlikeSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($crossSellProducts as $crossSellProduct)
                        <div class="swiper-slide product-item">
                            <div class="inner">
                                <div class="img"><a href="{{ $crossSellProduct->url }}"><img src="{{ RvMedia::getImageUrl($crossSellProduct->image) }}" alt=""></a></div>
                                <div class="info">
                                    <h4 class="text-truncate"><a href="{{ $crossSellProduct->url }}"> {{$crossSellProduct->name}}</a></h4>
                                    <div><a class="btnaddcart" href="">take me home</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="swiper-button-next-01"><i class="fa-regular fa-arrow-right"></i></div>
                        <div class="swiper-button-prev-01"><i class="fa-regular fa-arrow-left"></i></div>
                    </div>

                </div><!-- End recent products list -->
            </div>
    </section><!-- End Best Seller Section -->
    @endif
</main><!-- End #main -->

 <!-- Template Main JS File -->
 <script src="{{base}}assets/js/main.js"></script>
