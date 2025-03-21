@php
    $brands = get_all_brands(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED], ['slugable'], ['products']);
    $categories = ProductCategoryHelper::getActiveTreeCategories();
    $tags = app(\Botble\Ecommerce\Repositories\Interfaces\ProductTagInterface::class)->advancedGet([
        'condition' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED],
        'with'      => ['slugable'],
        'withCount' => ['products'],
        'order_by'  => ['products_count' => 'desc'],
        'take'      => 10,
    ]);

    Theme::asset()->usePath()->add('jquery-ui-css', 'css/jquery-ui.css');
    Theme::asset()->container('footer')->usePath()->add('jquery-ui-js', 'js/jquery-ui.js', ['jquery']);
    Theme::asset()->container('footer')->usePath()->add('touch-punch', 'js/jquery.ui.touch-punch.min.js', ['jquery-ui-js']);

    $categoriesRequest = (array)request()->input('categories', []);
    $urlCurrent = URL::current();

    Theme::asset()->usePath()
                ->add('custom-scrollbar-css', 'plugins/mcustom-scrollbar/jquery.mCustomScrollbar.css');
    Theme::asset()->container('footer')->usePath()
                ->add('custom-scrollbar-js', 'plugins/mcustom-scrollbar/jquery.mCustomScrollbar.js', ['jquery']);
@endphp

<div class="widget" style="display:none">
    <h5 class="widget_title">{{ __('Product Categories') }}</h5>
    <ul class="ps-list--categories">
        @foreach($categories as $category)
            <li class="@if ($urlCurrent == $category->url || (!empty($categoriesRequest && in_array($category->id, $categoriesRequest)))) current-menu-item @endif @if ($category->activeChildren->count()) menu-item-has-children @endif">
                <a href="{{ $category->url }}">{{ $category->name }}</a>
                @if ($category->activeChildren->count())
                    @include(Theme::getThemeNamespace() . '::views.ecommerce.includes.sub-categories', ['children' => $category->activeChildren])
                @endif
            </li>
        @endforeach
    </ul>
</div>

@if (count($brands) > 0)
    <aside class="widget" style="margin-top:0;padding-top:0;border:0">
        <h5 class="widget_title">{{ __('Filter') }}</h5>
        <ul class="list_brand ps-custom-scrollbar">
            @foreach($brands as $brand)
                <li>
                    <div class="custome-checkbox">
                        <input class="form-check-input submit-form-on-change" type="checkbox" name="brands[]" id="brand-{{ $brand->id }}" value="{{ $brand->id }}" @if (in_array($brand->id, request()->input('brands', []))) checked @endif>
                        <label class="form-check-label" for="brand-{{ $brand->id }}"><span>{{ $brand->name }} <span class="d-inline-block">({{ $brand->products_count }})</span> </span></label>
                    </div>
                </li>
            @endforeach
        </ul>
    </aside>
@endif
<aside class="widget widget--tags" style="display:none">
    <h5 class="widget_title">{{ __('Product Tags') }}</h5>
    <ul class="list_brand ps-custom-scrollbar">
        @foreach($tags as $tag)
            <li>
                <div class="custome-checkbox">
                    <input class="form-check-input submit-form-on-change" type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" @if (in_array($tag->id, request()->input('tags', []))) checked @endif>
                    <label class="form-check-label" for="tag-{{ $tag->id }}"><span>{{ $tag->name }} <span class="d-inline-block">({{ $tag->products_count }})</span> </span></label>
                </div>
            </li>
        @endforeach
    </ul>
</aside>
<aside class="widget" style="display:none">
    <h5 class="widget_title">{{ __('By Price') }}</h5>
    <div class="filter_price">
        <div id="price_filter" data-min="0" data-max="{{ (int)theme_option('max_filter_price', 1000) * get_current_exchange_rate() }}" data-min-value="{{ request()->input('min_price', 0) }}" data-max-value="{{ (int)request()->input('max_price', theme_option('max_filter_price', 1000)) * get_current_exchange_rate() }}" data-price-sign="{{ get_application_currency()->symbol }}"></div>
        <div data-is-prefix-symbol="{{ get_application_currency()->is_prefix_symbol }}"></div>
        <div class="price_range">
            <span>{{ __('Price') }}: <span id="flt_price"></span></span>
            <input class="product-filter-item product-filter-item-price-0" id="price_first" name="min_price" value="{{ request()->input('min_price', 0) }}" type="hidden">
            <input class="product-filter-item product-filter-item-price-1" id="price_second" name="max_price" value="{{ request()->input('max_price', theme_option('max_filter_price', 1000)) }}" type="hidden">
        </div>
    </div>
</aside>

<aside class="widget" style="border: none">
    {!! render_product_swatches_filter([
        'view' => Theme::getThemeNamespace() . '::views.ecommerce.attributes.attributes-filter-renderer'
    ]) !!}
</aside>
