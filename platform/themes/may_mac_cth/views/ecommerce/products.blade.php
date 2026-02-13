@php Theme::set('pageName', __('Products')) @endphp
<link rel="stylesheet" href="{{ base }}assets/css/products.css" />
<section class="products-section pt-4">
    {{-- <div class="title-section">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="page-title">{{ __('Product') }}</div>
            <div class="breadcrumb-nav" id="breadcrumb"></div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row">
            <!-- Sidebar (Filter) -->

            <div class="col-12 col-md-3">
                <div class="sidebar fade-elementt">
                    <h5 class="sidebar-title">BỘ LỌC</h5>
                    <form action="{{ URL::current() }}" method="GET">
                    @include(Theme::getThemeNamespace() . '::views/ecommerce/includes/filters')
                    </form>
                    <!-- Danh mục với checkbox -->
                    {{-- <div class="filter-group">
                        <h6>Danh mục</h6>
                        <div class="category-options" id="categoryOptions">
                            <!-- Danh mục sẽ được load tự động từ database -->
                            <div class="text-center py-3">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden">Đang tải danh mục...</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Thanh trượt giá (khoảng từ - đến) -->
                    {{-- <div class="filter-group">
                        <h6>Mức giá</h6>
                        <div class="price-slider">
                            <div class="range-input">
                                <input type="range" class="form-range" min="0" max="1000000" step="10000" id="priceRangeMin" value="0">
                                <input type="range" class="form-range" min="0" max="1000000" step="10000" id="priceRangeMax" value="1000000">
                            </div>
                            <p>Giá: <span id="priceRangeValue">Từ 0 VNĐ đến 1.000.000 VNĐ</span></p>
                        </div>
                    </div> --}}
                    <!-- Chọn kích thước (hiển thị ngang) -->
                    {{-- <div class="filter-group">
                        <h6>Kích thước</h6>
                        <div class="size-options d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="S" id="sizeS">
                                <label class="form-check-label" for="sizeS">S</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="M" id="sizeM">
                                <label class="form-check-label" for="sizeM">M</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="L" id="sizeL">
                                <label class="form-check-label" for="sizeL">L</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="XL" id="sizeXL">
                                <label class="form-check-label" for="sizeXL">XL</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">Áp dụng</button> --}}
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-12 col-md-9">
                <div class="product-grid">
                    <div class="row fade-elementt" id="productList">
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <div class="col-12 col-sm-6 col-md-6 col-xxl-4 mb-4 product-item" style="display: block;">
                                    <div class="card product-card h-100 border-0 shadow-sm">
                                        <div class="image-container position-relative">
                                            <a href="{{ url($product->url) }}">
                                                <img src="{{ RvMedia::getImageUrl($product->image) }}" class="card-img-top product-main-img" alt="{{ $product->name }}" onerror="this.src='{{ RvMedia::getImageUrl($product->image) }}}'">
                                            </a>
                                        </div>
                                        <div class="card-body d-flex justify-content-between pt-3 pb-3 px-3">
                                            <div class="product-info-left text-start">
                                                <a href="{{ url($product->url) }}" class="text-decoration-none text-dark">
                                                    <h6 class="card-title fw-bold mb-1"> {{ $product->name }}</h6>
                                                </a>
                                                <div class="rating-stars text-warning mb-2" style="font-size: 0.85rem;">
                                                    <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i>
                                                    <i class="bx bxs-star"></i><i class="bx bxs-star"></i>
                                                    <span class="text-muted ms-1" style="font-size: 0.75rem">(0)</span>
                                                </div>
                                                <div class="color-options d-flex flex-wrap">
                                                    <span class="color-dot me-1" style="background-color: #ffffff;" title="Trắng"></span>
                                                    <span class="color-dot me-1" style="background-color: #000000;" title="Đen"></span>
                                                </div>
                                            </div>
                                            <div class="product-info-right">
                                                <div class="product-price">
                                                    <span class="price-badge">{{ format_price($product->front_sale_price_with_taxes) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        @if ($products->count() > 0)
                            <div class="mt-3 justify-content-center pagination_style1">
                                {!! $products->appends(request()->query())->onEachSide(1)->links() !!}
                            </div>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">

.list_brand, .ps-list--categories, ul.text-swatch{
    list-style: none;
    padding: 0;
}
.list_brand, .ps-list--categories a{
    font-size: 0.95rem;
    color: #333;
    margin-left: 0.5rem;
}
.ui-button, .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, html .ui-button.ui-state-disabled:active,
 html .ui-button.ui-state-disabled:hover {
    border: 0;
    background: #1c67a9  !important;
    font-weight: 400;
    color: #454545;
    border-radius: 50%;
}
.price_range{
    font-size: 0.9rem;
    color: #555;
        padding-top: 10px;
}
</style>
@push("js")
<script type="text/javascript" src="{{ asset('themes/assets/js/product.js') }}"></script>
@endpush
