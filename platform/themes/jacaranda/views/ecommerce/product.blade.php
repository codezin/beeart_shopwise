@php
    Theme::asset()->remove('app-js');
    Theme::set('pageName', $product->name);
    Theme::asset()->usePath()->add('lightGallery-css', 'plugins/lightGallery/css/lightgallery.min.css');
    Theme::asset()->container('footer')->usePath()
        ->add('lightGallery-js', 'plugins/lightGallery/js/lightgallery.min.js', ['jquery']);
@endphp
<link rel="stylesheet" href="{{base}}asset/css/detail.css?v=1703268762">
<main id="main">
    <section id="detail" class="detail">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6">

                    <div class="slider-products">
                        <!-- Swiper -->
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach ($productImages as $img)
                                <div class="swiper-slide">
                                    <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" alt="{{ $product->name }}" loading="lazy"/>
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($productImages as $img)
                                <div class="swiper-slide">
                                    <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" />
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <h2 class="mt-5 mt-lg-0">{{ $product->name }}</h2>
                    <div class="stars mt-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> <span>73 reviews</span>
                    </div>
                    <p class="mt-3">
                        @if ($product->front_sale_price == $product->price)
                        <span class="sale-price">{{ format_price($product->price_with_taxes) }}</span>
                        @endif
                        <span class="price">{{ format_price($product->front_sale_price_with_taxes) }}</span></p>
                    <p>Tax included. Shipping calculated at checkout</p>
                    <form class="add-to-cart-form" method="POST" action="{{ route('public.cart.add-to-cart') }}">
                        @csrf

                        @if ($product->variations()->count() > 0)
                            <div class="pr_switch_wrap">
                                {!! render_product_swatches($product, [
                                    'selected' => $selectedAttrs,
                                    'view'     => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer'
                                ]) !!}
                            </div>
                        @endif

                       {!! render_product_options($product) !!}



                    {{-- <div id="bundle">
                        <div class="mb-3">Bundle:</div>
                        <div class="check-list">
                            <input type="radio" value="3000" class="btn-check" name="radbundle" id="radbundle1" autocomplete="off" checked>
                            <label class="btnrad" for="radbundle1">3000 fans</label>

                            <input type="radio" value="5000" class="btn-check" name="radbundle" id="radbundle2" autocomplete="off">
                            <label class="btnrad" for="radbundle2">5000 fans</label>
                        </div>

                    </div>

                    <div id="curl" class="mt-3">
                        <div class="mb-3">Curl:</div>
                        <div class="check-list">
                            <input type="radio" value="D Curl" class="btn-check" name="radcurl" id="radcurl1" autocomplete="off" checked>
                            <label class="btnrad" for="radcurl1">D Curl</label>

                            <input type="radio" value="CC Curl" class="btn-check" name="radcurl" id="radcurl2" autocomplete="off">
                            <label class="btnrad" for="radcurl2">CC Curl</label>

                        </div>

                    </div>

                    <div id="sizes" class="mt-3">
                        <div class="mb-3">Sizes:</div>
                        <div class="check-list d-flex flex-wrap">
                            <div class="check-group p-1">
                                <input type="radio" value="8" class="btn-check" name="radsizes" id="radsizes1" autocomplete="off" checked>
                                <label class="btnrad" for="radsizes1">Bundle 8mm</label>
                            </div>

                            <div class="check-group p-1">
                                <input type="radio" value="9" class="btn-check" name="radsizes" id="radsizes2" autocomplete="off">
                                <label class="btnrad" for="radsizes2">Bundle 9mm</label>
                            </div>

                            <div class="check-group p-1">
                                <input type="radio" value="10" class="btn-check" name="radsizes" id="radsizes3" autocomplete="off">
                                <label class="btnrad" for="radsizes3">Bundle 10mm</label>
                            </div>

                            <div class="check-group p-1">
                                <input type="radio" value="11" class="btn-check" name="radsizes" id="radsizes4" autocomplete="off">
                                <label class="btnrad" for="radsizes4">Bundle 11mm</label>
                            </div>

                            <div class="check-group p-1">
                                <input type="radio" value="12" class="btn-check" name="radsizes" id="radsizes5" autocomplete="off">
                                <label class="btnrad" for="radsizes5">Bundle 12mm</label>
                            </div>

                            <div class="check-group p-1">
                                <input type="radio" value="13" class="btn-check" name="radsizes" id="radsizes6" autocomplete="off">
                                <label class="btnrad" for="radsizes6">Bundle 13mm</label>
                            </div>

                        </div>

                    </div> --}}
                        {!! apply_filters(ECOMMERCE_PRODUCT_DETAIL_EXTRA_HTML, null, $product) !!}
                        <input type="hidden" name="id" id="hidden-product-id" value="{{ ($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id }}"/>
                        @if (EcommerceHelper::isCartEnabled())
                        <div class="row">
                            {{-- @if (EcommerceHelper::isQuickBuyButtonEnabled())
                                &nbsp;
                                <button class="btn btn-dark @if ($product->isOutOfStock()) btn-disabled @endif" type="submit" @if ($product->isOutOfStock()) disabled @endif name="checkout">{{ __('Quick Buy') }}</button>
                            @endif
                            @if (EcommerceHelper::isCompareEnabled())
                                <a class="add_compare js-add-to-compare-button" data-url="{{ route('public.compare.add', $product->id) }}" href="#"><i class="icon-shuffle"></i></a>
                            @endif
                            @if (EcommerceHelper::isWishlistEnabled())
                                <a class="add_wishlist js-add-to-wishlist-button" href="#" data-url="{{ route('public.wishlist.add', $product->id) }}"><i class="icon-heart"></i></a>
                            @endif --}}
                            <div class="col-6 col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <button type="button" class="btn minus">-</button>
                                    </span>
                                    <input type="text" name="qty" value="1" title="{{ __('Qty') }}" size="4"  style="width: 50px;" class="form-control text-center qty"  aria-label="Quantity">
                                    <span class="input-group-text"><button type="button" class="btn plus">+</button></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-8">
                                @if (EcommerceHelper::isCartEnabled())
                                    <button class="  btn-themes w-100 border-0 btn-fill-out @if ($product->isOutOfStock()) btn-disabled @endif" type="submit" @if ($product->isOutOfStock()) disabled @endif><i class="icon-basket-loaded"></i> {{ __('Add to cart') }}</button>
                                @endif
                            </div>
                        </div>
                        @endif
                    </form>

                </div>
            </div>

        </div>

    </section>

    @if (EcommerceHelper::isReviewEnabled())
    <section id="review-products" class="review mt-5">
        <div class="container">
            <div id="title-review-products">
                <h2>Reviews</h2>
                <div class="stars mt-5">
                    <i class="bi bi-star{{ ($product->star * 20) >= 20?'-fill':''}}"></i>
                    <i class="bi bi-star{{ ($product->star * 20) >= 40?'-fill':''}}"></i>
                    <i class="bi bi-star{{ ($product->star * 20) >= 60?'-fill':''}}"></i>
                    <i class="bi bi-star{{ ($product->star * 20) >= 80?'-fill':''}}"></i>
                    <i class="bi bi-star{{ ($product->star * 20) == 100?'-fill':''}}"></i>
                </div>
                <p>Based on  {{ $product->reviews_count }} reviews</p>
                <div class="mt-5"><a class="btn-write" href="#">WRITE A REVIEW</a></div>
            </div>

            <div id="list-review" class="mt-5">
                {{-- <div class="row border-1 border-bottom border-secondary mb-4">
                    <div class="col-md-3">
                        <h4>Nguyen Hai Yen</h4>
                        <div>17 ngày</div>
                    </div>
                    <div class="col-md-9">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></span>
                        </div>
                        <h3 class="mt-3">Excellent!</h3>
                        <p>I was skeptical at first and wasn’t sure when it didn’t foam like I thought. However after a few uses I figured out just how much water to have on my toothbrush for the right foam and it always leaves my teeth feeling glossy. I love it. Definitely better than the tube toothpaste.</p>
                    </div>
                </div> --}}
                <script>
                    $(document).ready(function(){
                        $(document).on("click",".btn-write",function(){
                            $(".review_form").show();
                        });
                    });

                </script>
                <div class="review_form field_form mt-3" style="display: none">
                    <h5>{{ __('Add a review') }}</h5>
                    @if (!auth('customer')->check())
                        <p class="text-danger">{{ __('Please') }} <a href="{{ route('customer.login') }}">{{ __('login') }}</a> {{ __('to write review!') }}</p>
                    @endif
                    {!! Form::open(['route' => 'public.reviews.create', 'method' => 'post', 'class' => 'row form-review-product', 'files' => true]) !!}
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="star" value="1">
                        <div class="form-group col-12">
                            <div class="star_rating">
                                <span data-value="1"><i class="ion-star"></i></span>
                                <span data-value="2"><i class="ion-star"></i></span>
                                <span data-value="3"><i class="ion-star"></i></span>
                                <span data-value="4"><i class="ion-star"></i></span>
                                <span data-value="5"><i class="ion-star"></i></span>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <textarea class="form-control" name="comment" id="txt-comment" rows="4" placeholder="{{ __('Write your review') }}" @if (!auth('customer')->check()) disabled @endif></textarea>
                        </div>
                        <div class="form-group col-12">
                            <script type="text/x-custom-template" id="review-image-template">
                                <span class="image-viewer__item" data-id="__id__">
                                <img src="{{ RvMedia::getDefaultImage() }}" alt="Preview" class="img-responsive d-block" loading="lazy" />
                                <span class="image-viewer__icon-remove">
                                    <i class="ion-close"></i>
                                </span>
                            </span>
                            </script>
                            <div class="image-upload__viewer d-flex">
                                <div class="image-viewer__list position-relative">
                                    <div class="image-upload__uploader-container">
                                        <div class="d-table">
                                            <div class="image-upload__uploader">
                                                <i class="ion-image image-upload__icon"></i>
                                                <div class="image-upload__text">{{ __('Upload photos') }}</div>
                                                <input type="file"
                                                       name="images[]"
                                                       data-max-files="{{ EcommerceHelper::reviewMaxFileNumber() }}"
                                                       class="image-upload__file-input"
                                                       accept="image/png,image/jpeg,image/jpg"
                                                       multiple="multiple"
                                                       data-max-size="{{ EcommerceHelper::reviewMaxFileSize(true) }}"
                                                       data-max-size-message="{{ trans('validation.max.file', ['attribute' => '__attribute__', 'max' => '__max__']) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="loading">
                                        <div class="half-circle-spinner">
                                            <div class="circle circle-1"></div>
                                            <div class="circle circle-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="help-block d-inline-block">
                                    {{ __('You can upload up to :total photos, each photo maximum size is :max kilobytes', [
                                        'total' => EcommerceHelper::reviewMaxFileNumber(),
                                        'max'   => EcommerceHelper::reviewMaxFileSize(true),
                                    ]) }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-fill-out @if (!auth('customer')->check()) btn-disabled @endif" @if (!auth('customer')->check()) disabled @endif name="submit" value="Submit">Submit Review</button>
                        </div>
                    {!! Form::close() !!}
                </div>
                <product-reviews-component url="{{ route('public.ajax.product-reviews', $product->id) }}"></product-reviews-component>

            </div>


        </div>
    </section>
    @endif
    <section id="recent-products" class="recent-products mt-5">
        <div class="container">
            <header class="section-header text-center" data-aos="fade-top">
                <h2>You may also like</h2>
            </header>

            <div id="recent-products-list" class="products-list">
                <div class="swiper youlikeSwiper mt-5">
                    <div class="swiper-wrapper">

                        @php
                        $crossSellProducts = get_cross_sale_products($product);
                        @endphp
                        @if (count($crossSellProducts) > 0)
                        @foreach ($crossSellProducts as $crossSellProduct)
                        <div class="swiper-slide">
                            <article>
                                <div class="item-img">
                                    <a href="{{ $crossSellProduct->url }}">
                                    <img src="{{ RvMedia::getImageUrl($crossSellProduct->image) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <h2 class="title">
                                    <a href="{{ $crossSellProduct->url }}">{{$crossSellProduct->name}}</a>
                                </h2>
                                <div class="stars mt-3">
                                    <i class="bi bi-star{{ ($crossSellProduct->reviews_avg * 20) >= 20?'-fill':''}}"></i>
                                    <i class="bi bi-star{{ ($crossSellProduct->reviews_avg * 20) >= 40?'-fill':''}}"></i>
                                    <i class="bi bi-star{{ ($crossSellProduct->reviews_avg * 20) >= 60?'-fill':''}}"></i>
                                    <i class="bi bi-star{{ ($crossSellProduct->reviews_avg * 20) >= 80?'-fill':''}}"></i>
                                    <i class="bi bi-star{{ ($crossSellProduct->reviews_avg * 20) == 100?'-fill':''}}"></i>
                                    <span>{{ $crossSellProduct->reviews_count }} reviews</span>
                                </div>
                                <p class="mt-3">
                                    @if ($crossSellProduct->front_sale_price !== $crossSellProduct->price)
                                    <span class="sale-price">{{ format_price($crossSellProduct->price_with_taxes) }}</span>
                                    @endif
                                    <span class="price">{{ format_price($crossSellProduct->front_sale_price_with_taxes) }}</span></p>
                                </p>
                            </article>
                        </div>
                        @endforeach
                        @endif

                    </div>

                    <div class="swiper-button-next-01"><i class="fa-regular fa-arrow-right"></i></div>
                    <div class="swiper-button-prev-01"><i class="fa-regular fa-arrow-left"></i></div>
                </div>

            </div><!-- End recent products list -->
        </div>
    </section><!-- End Best Seller Section -->

</main>
