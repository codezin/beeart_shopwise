@if ($product)
<div class="list-products-section-list-card " data-aos="fade-up"  data-aos-duration="1000">
    <div class="img-product"  data-id="{{$product->id}}">
    <img  src="{{ RvMedia::getImageUrl($product->image) }}" alt="" srcset="" class="zoomImage" />
    </div>
    <div class="list-products-section-content">
        <div class="rating_wrap">
            <div class="rating">
                <div class="product_rate" style="width: {{ 5 * 20 }}%"></div>
            </div>

        </div>
        <h4>{!! $product->name !!}</h4>
        <div class="description">{!! $product->description !!}

        </div>
        <div class="content" style="display:none">{!! $product->content !!}</div>


    </div>
</div>
@endif
