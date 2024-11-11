<!-- START SECTION BEST SELLER-->
<div class="section small_pt pb_80 section-best-seller">
    @php
        $block = get_blocks_by_slug('best-seller');
        // $products = get_products_on_sale([]);
        $products = get_featured_products([]);
    @endphp
    <div class="container">
        <h2 class="heading_h2">{{ __('Our Best seller') }}</h2>
        <div class="carousel-template carousel-2">
            @foreach ($products as $product)
                <div class="item">
                    <a href="{{ $product->url }}">
                        <div class="img">
                            <img src="{{ RvMedia::getImageUrl($product->image) }}" />
                        </div>
                        <div class="desc">
                            <h5 class="subheading_h5 fw-normal text-capitalize">
                                {!! $product->name !!}
                            </h5>
                            <p class="subheading_h4">{{ format_price($product->front_sale_price_with_taxes) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- END SECTION BEST SELLER-->
