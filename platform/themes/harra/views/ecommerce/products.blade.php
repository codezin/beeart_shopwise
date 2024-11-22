@php Theme::set('pageName', __('Products')) @endphp
<link rel="stylesheet" href="{{base}}assets/css/product.css" />
<div class="main_content">
    <!-- START SECTION SHOP -->
    <div class="section pt_52">
        <div class="container">
            <div class="row product-wrapper">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <h4 class="subheading_h4">{{__("Product")}}</h4>
                                </div>
                                <div class="product_header_right">
                                    <div class="custom_select">
                                        <select class="submit-form-on-change" aria-label="Sort by" name="sort-by" id="sort-by">
                                            <option selected>Sort by</option>
                                            @foreach (EcommerceHelper::getSortParams() as $key => $name)
                                            <option value="{{ $key }}" @if (request()->input('sort-by') == $key) selected @endif>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container">
                        @if ($products->count() > 0)
                        @foreach($products as $product)
                        <div class="col-md-4 col-6">
                            <div class="item item-box-style">
                                <div class="img">
                                    <a href="{{ $product->url }}"> <img src="{{ RvMedia::getImageUrl($product->image) }}" /></a>
                                </div>
                                <div class="desc">
                                    <a href="{{ $product->url }}">
                                        <h5 class="subheading_h5 fw-normal text-capitalize">
                                            {{ $product->name }}
                                        </h5>
                                    </a>
                                    <p class="subheading_h4">{{ format_price($product->front_sale_price_with_taxes) }}</p>
                                </div>
                                <div class="item-actions">
                                    <div class="choose-quantity">
                                        <p class="btn-minus"></p>
                                        <input value="1" />
                                        <p class="btn-plus"></p>
                                    </div>
                                    <div class="add-to-cart">
                                        <a class="btn btn-fill-out staggered-animation animated slideInLeft" data-id="{{ $product->id }}" href="#" data-url="{{ route('public.cart.add-to-cart') }}">
                                            {{__("Add to cart")}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if ($products->count() > 0)
                            <div class="mt-3 justify-content-center pagination_style1">
                                {!! $products->appends(request()->query())->onEachSide(1)->links() !!}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <h4 class="subheading_h4">Filter</h4>
                        <div class="widget">
                            {{-- <h6 class="widget_title subheading_h6">Category</h6>
                            <ul class="list_brand">
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Breakfast" value="" />
                                        <label class="form-check-label" for="Breakfast"><span>Breakfast</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Morning tea" value="" />
                                        <label class="form-check-label" for="Morning tea"><span>Morning tea</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Lunch" value="" />
                                        <label class="form-check-label" for="Lunch"><span>Lunch</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Afternoon tea" value="" />
                                        <label class="form-check-label" for="Afternoon tea"><span>Afternoon tea</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Dinner" value="" />
                                        <label class="form-check-label" for="Dinner"><span>Dinner</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Beverages" value="" />
                                        <label class="form-check-label" for="Beverages"><span>Beverages</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Dietaries" value="" />
                                        <label class="form-check-label" for="Dietaries"><span>Dietaries</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Events" value="" />
                                        <label class="form-check-label" for="Events"><span>Events</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Family pack" value="" />
                                        <label class="form-check-label" for="Family pack"><span>Family pack</span></label>
                                    </div>
                                </li>
                            </ul> --}}
                            @include(Theme::getThemeNamespace() . '::views/ecommerce/includes/filters')
                            <style type="text/css">
                                .ps-list--categories li {
                                    list-style: none;
                                    margin-bottom: 16px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
</div>
<!-- END SECTION SHOP -->
