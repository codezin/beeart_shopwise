@php Theme::set('pageName', $category->name) @endphp
<link rel="stylesheet" href="{{base}}assets/css/product.css" />
<div class="section">
    <form action="{{ $category->url }}" method="GET">
        @if (request()->has('q'))
            <input type="hidden" name="q" value="{{ BaseHelper::stringify(request()->query('q')) }}">
        @endif
        @if (request()->has('categories'))
            <input type="hidden" name="categories[]" value="{{ Arr::first(request()->query('categories', [])) }}">
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <h4 class="subheading_h4">{{$category->name}}</h4>
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
                    {{-- <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                @include(Theme::getThemeNamespace() . '::views/ecommerce/includes/sort')
                            </div>
                        </div>
                    </div> --}}
                    <div class="row shop_container">
                        @if ($products->count() > 0)
                        @foreach($products as $product)
                        <div class="col-md-4 col-6">
                            <div class="item item-box-style">
                                <div class="img">
                                    @if(get_ecommerce_setting('product_image_enable') && $product->image=="")
                                    <a href="{{ $product->url }}"> <img src="{{ RvMedia::getImageUrl(get_ecommerce_setting('product_image')) }}" /></a>
                                    @else
                                    <a href="{{ $product->url }}"> <img src="{{ RvMedia::getImageUrl($product->image) }}" /></a>
                                    @endif
                                </div>
                                <div class="desc">
                                    <a href="{{ $product->url }}">
                                        <h5 class="subheading_h5 fw-normal text-capitalize">
                                            {{ $product->name }}
                                        </h5>
                                    </a>
									 @if ($product->variations()->count() > 0)
									 @php
									 		[$productImages, $productVariation, $selectedAttrs] = EcommerceHelper::getProductVariationInfo($product);
									 @endphp
		                            {{-- <div class="pr_switch_wrap">
		                                {!! render_product_swatches($product, [
		                                'selected' =>  $selectedAttrs,
		                                'view' => Theme::getThemeNamespace() . '::views.ecommerce.attributes.dropdown-renderer',
                                        'display_layout' => 'dropdown'
		                                ]) !!}
		                            </div> --}}
                                    {!! render_product_options($product) !!}
									@else
									<div class="d-flex item-box-view">
									    {!! render_product_options($product) !!}
                                        @if( intval($product->front_sale_price_with_taxes)>0)
									    <p class="subheading_h4 price">{{ format_price($product->front_sale_price_with_taxes) }}</p>
                                        @else
                                        @php
                                            $option = current($product->options->toArray());
                                        @endphp
                                        <p class="subheading_h4 price">{{ dd($option) }}</p>
                                        @endif
									</div>
		                            @endif


                                </div>
                                <div class="item-actions">
                                    <div class="choose-quantity">
                                        <p class="btn-minus"></p>
                                        <input value="1" />
                                        <p class="btn-plus"></p>
                                    </div>
                                    <div class="add-to-cart">
                                        <a class="btn btn-fill-out staggered-animation animated slideInLeft add-to-cart-button" data-id="{{ $product->id }}" data-quantity="1" href="#" data-url="{{ route('public.cart.add-to-cart') }}">
                                            {{__("Add to cart")}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        @include(Theme::getThemeNamespace() . '::views/ecommerce/includes/filters')
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- END SECTION SHOP -->
