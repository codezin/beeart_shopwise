@php
 Theme::layout('blog-sidebar');
    Theme::asset()->remove('app-js');
    Theme::set('pageName', $product->name);
    Theme::asset()->usePath()->add('lightGallery-css', 'plugins/lightGallery/css/lightgallery.min.css');
    Theme::asset()->container('footer')->usePath()
        ->add('lightGallery-js', 'plugins/lightGallery/js/lightgallery.min.js', ['jquery']);
@endphp
<link rel="stylesheet" href="{{base}}assets/css/product-detail.css" />
{{-- <link rel="stylesheet" href="{{base}}asset/css/detail.css?v=1703268762"> --}}


{{-- <script src="{{asset('public/plugins/magnific-popup.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery.elevatezoom.js')}}"></script>

<link rel="stylesheet" href="{{asset('public/plugins/')}}/style.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="{{asset('public/plugins/')}}/slick//slick.css">
<link rel="stylesheet" href="{{asset('public/plugins/')}}/slick/slick-theme.css">
<script src="{{asset('public/plugins/slick/slick.min.js')}}"></script>

<script src="{{asset('public/plugins/parallax.js')}}"></script>
<script src="{{asset('public/plugins/scripts.js')}}"></script> --}}

<div class="main_content">
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="product-image vertical_gallery">
                        <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                            @if(!empty($productImages))
                            @foreach ($productImages as $img)
                            <div class="item">
                                <a href="#" class="product_gallery_item {{$loop->index == 0 ?'active':''}}" data-image="{{ RvMedia::getImageUrl($img) }}" data-zoom-image="{{ RvMedia::getImageUrl($img) }}">
                                    <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" alt="product_small_img1" />
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="product_img_box">
                            @if(!empty($productImages))
                            <img id="product_img" src="{{ RvMedia::getImageUrl($productImages[0]) }}" data-zoom-image="{{ RvMedia::getImageUrl($productImages[0]) }}" alt="product_img1" />
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <form class="add-to-cart-form" method="POST" action="{{ route('public.cart.add-to-cart') }}">
                        <div class="product_description">
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width: 100%"></div>
                                </div>
                            </div>
                            <h3 class="product_title subheading_h3">
                                <a href="#">{{ $product->name }}</a>
                            </h3>
                            <div class="product_price">

                                @if ($product->front_sale_price !== $product->price)
                                <span class="sale-price">{{ format_price($product->price_with_taxes) }}</span>
                                @endif
                                <span class="price">{{ format_price($product->front_sale_price_with_taxes) }}</span>

                            </div>
                            @if ($product->variations()->count() > 0)
                            <div class="pr_switch_wrap">
                                {!! render_product_swatches($product, [
                                'selected' => $selectedAttrs,
                                'view' => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer'
                                ]) !!}
                            </div>
                            @endif
                            {!! render_product_options($product) !!}
                            {{-- <div class="pr_switch_wrap mb-4">
                                <span class="switch_lable">Size</span>
                                <div class="product_size_switch">
                                    <span>Small</span>
                                    <span>Large</span>
                                </div>
                            </div> --}}

                            @if (EcommerceHelper::isCartEnabled())
                            <div class="cart-product-quantity">
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">Quantity:</span>
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus" />
                                        <input type="text" name="qty" {{!empty($product->minium_order)?'value='.$product->minium_order.' min='.$product->minium_order:' value=1'}}   title="Qty" class="qty" size="4" />
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
                        </div>
                        <hr />
                        {!! apply_filters(ECOMMERCE_PRODUCT_DETAIL_EXTRA_HTML, null, $product) !!}
                        <input type="hidden" name="id" id="hidden-product-id" value="{{ ($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id }}"/>
                        <div class="cart_extra">
                            <div class="cart_btn">
                                @if (EcommerceHelper::isCartEnabled())
                                <button class="btn btn-fill-out btn-addtocart subheading_h4 @if ($product->isOutOfStock()) btn-disabled @endif" type="submit"  @if ($product->isOutOfStock()) disabled @endif>
                                    Add to cart
                                </button>

                                @endif
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                            </li>

                            @if (EcommerceHelper::isReviewEnabled())
                            <li class="nav-item">
                                <a class="nav-link" id="Delivery-tab" data-bs-toggle="tab" href="#Delivery" role="tab" aria-controls="Delivery" aria-selected="false">Delivery</a>
                            </li>
                            @endif
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                {!! $product->content !!}
                            </div>
                            <div class="tab-pane fade" id="Delivery" role="tabpanel" aria-labelledby="Delivery-tab">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Capacity</td>
                                        <td>5 Kg</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>Black, Brown, Red,</td>
                                    </tr>
                                    <tr>
                                        <td>Water Resistant</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td>Artificial Leather</td>
                                    </tr>
                                </table>
                            </div>
                            @if (EcommerceHelper::isReviewEnabled())
                            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments">
                                    <h5 class="product_tab_title">
                                        2 Review For <span>Blue Dress For Woman</span>
                                    </h5>
                                    <ul class="list_none comment_list mt-4">
                                        <li>
                                            <div class="comment_img">
                                                <img src="assets/images/user1.jpg" alt="user1" />
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width: 80%"></div>
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author">Alea Brooks</span>
                                                    <span class="comment-date">March 5, 2018</span>
                                                </p>
                                                <div class="description">
                                                    <p>
                                                        Lorem Ipsumin gravida nibh vel velit auctor
                                                        aliquet. Aenean sollicitudin, lorem quis
                                                        bibendum auctor, nisi elit consequat ipsum, nec
                                                        sagittis sem nibh id elit. Duis sed odio sit
                                                        amet nibh vulputate
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment_img">
                                                <img src="assets/images/user2.jpg" alt="user2" />
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width: 60%"></div>
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author">Grace Wong</span>
                                                    <span class="comment-date">June 17, 2018</span>
                                                </p>
                                                <div class="description">
                                                    <p>
                                                        It is a long established fact that a reader will
                                                        be distracted by the readable content of a page
                                                        when looking at its layout. The point of using
                                                        Lorem Ipsum is that it has a more-or-less normal
                                                        distribution of letters
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="review_form field_form">
                                    <h5>Add a review</h5>
                                    <form class="row mt-3">
                                        <div class="form-group col-12 mb-3">
                                            <div class="star_rating">
                                                <span data-value="1"><i class="far fa-star"></i></span>
                                                <span data-value="2"><i class="far fa-star"></i></span>
                                                <span data-value="3"><i class="far fa-star"></i></span>
                                                <span data-value="4"><i class="far fa-star"></i></span>
                                                <span data-value="5"><i class="far fa-star"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text" />
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email" />
                                        </div>

                                        <div class="form-group col-12 mb-3">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">
                                                Submit Review
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            @php
            $crossSellProducts = get_cross_sale_products($product);
            @endphp
            @if (count($crossSellProducts) > 0)
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h2 class="heading_h2">{{__("Our Best seller")}}</h2>
                    </div>
                    <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        @foreach ($crossSellProducts as $crossSellProduct)
                        <div class="item item-box-style">
                            <div class="img">
                                <a href="{{ $crossSellProduct->url }}"> <img src="{{ RvMedia::getImageUrl($crossSellProduct->image) }}" /></a>
                            </div>
                            <div class="desc">
                                <a href="#">
                                    <h5 class="subheading_h5 fw-normal text-capitalize">
                                        {{$crossSellProduct->name}}
                                    </h5>
                                </a>
                                <p class="subheading_h4">
                                    @if ($crossSellProduct->front_sale_price !== $crossSellProduct->price)
                                    <span class="sale-price">{{ format_price($crossSellProduct->price_with_taxes) }}</span>
                                    @endif
                                    <span class="price">{{ format_price($crossSellProduct->front_sale_price_with_taxes) }}</span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @endif
        </div>
    </div>
    <!-- END SECTION SHOP -->
</div>
