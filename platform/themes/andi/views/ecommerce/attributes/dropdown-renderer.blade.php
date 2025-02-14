@php
    $key = mt_rand();
@endphp
<div class="product-attributes"
     data-target="{{ route('public.web.get-variation-by-attributes', ['id' => $product->id]) }}">
    @php
        $variationInfo = $productVariationsInfo;
        $variationNextIds = [];
    @endphp
    @foreach($attributeSets as $set)
        @if (!$loop->first)
            @php
                $variationInfo = $productVariationsInfo->where('attribute_set_id', $set->id)->whereIn('variation_id', $variationNextIds);
            @endphp
        @endif
        @include(Theme::getThemeNamespace(). '::views.ecommerce.attributes._layouts.dropdown_mini', compact('selected'))
        @php
            [$variationNextIds] = handle_next_attributes_in_product(
                $attributes->where('attribute_set_id', $set->id),
                $productVariationsInfo,
                $set->id,
                $selected->pluck('id')->toArray(),
                $loop->index,
                $variationNextIds);
        @endphp
    @endforeach
</div>
