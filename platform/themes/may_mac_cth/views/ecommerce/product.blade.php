@php
Theme::layout('blog-sidebar');
Theme::asset()->remove('app-js');
Theme::set('pageName', $product->name);
Theme::asset()->usePath()->add('lightGallery-css', 'plugins/lightGallery/css/lightgallery.min.css');
Theme::asset()
->container('footer')
->usePath()
->add('lightGallery-js', 'plugins/lightGallery/js/lightgallery.min.js', ['jquery']);
@endphp
<link rel="stylesheet" href="{{ base }}assets/css/product-detail.css" />

<section class="product-detail">
    {{-- <div class="title-section">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="page-title" id="categoryTitle">Áo mùa đông</div>
            <div class="breadcrumb-nav" id="breadcrumb">
                <a href="index.html">Trang chủ</a>
                <span class="sep"> &gt; </span>
                <a href="products.html">Sản phẩm</a>
                <span class="sep"> &gt; </span>
                <span class="current">Áo len</span>
            </div>
        </div>
    </div> --}}

    <div class="container">
        <div class="row align-items-start">
            <!-- Ảnh sản phẩm -->
            <div class="col-12 col-md-6 mb-4 mb-md-0">
                <div class="product-image">
                    <img src="{{ RvMedia::getImageUrl($product->image, 'thumb') }}" alt="Áo len" id="main-product-image" class="w-100" style="min-height:400px; object-fit:contain;">
                    <div class="thumbnail-images mt-3 d-flex gap-2 flex-wrap" id="thumbnailContainer">

                        @if (!empty($productImages))
                        <img src="{{ RvMedia::getImageUrl($productImages[0]) }}" data-zoom-image="{{ RvMedia::getImageUrl($productImages[0]) }}" class="thumbnail active" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer; border: 2px solid rgb(238, 238, 238); border-radius: 8px;" />
                        @endif
                    </div>
                </div>

                <div class="accordion product-info-accordion mt-4">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDetails">
                                Chi tiết sản phẩm
                            </button>
                        </h2>
                        <div id="collapseDetails" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                {!! $product->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFaqs">
                                Câu hỏi thường gặp
                            </button>
                        </h2>
                        <div id="collapseFaqs" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                @if (is_plugin_active('faq'))
                                @if (count($product->faq_items) > 0)
                                @foreach ($product->faq_items as $faq)
                                <div class="item">
                                    <div class="card-header" id="heading-faq-{{ $loop->index }}">
                                        <h5 class="mb-0">
                                            {!! BaseHelper::clean($faq[0]['value']) !!}
                                        </h5>
                                    </div>

                                    <div id="collapse-faq-{{ $loop->index }}" class="collapse pt-1 @if ($loop->first) show @endif" aria-labelledby="heading-faq-{{ $loop->index }}" data-parent="#faq-accordion">
                                        <div class="card-body" style="color: #757575">
                                            {!! BaseHelper::clean($faq[1]['value']) !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-12 col-md-6">
                <div class="product-info">
                    <form class="add-to-cart-form" method="POST" action="{{ route('public.cart.add-to-cart') }}">
                        @csrf
                        <h1 class="product-title mb-0 text-start">{{ $product->name }}</h1>
                        <style>
.start_rating {
    display: inline-flex;
    align-items: center;
    font-size: 18px;
    font-family: Arial, sans-serif;
    position: absolute;
    top: 5%;
    right: 5%;
}

.star {
    color: #ffc107; /* sao vàng */
    margin-right: 2px;
}

.star.empty {
    color: #ddd; /* sao rỗng */
}

.rating-count {
    margin-left: 6px;
    font-size: 14px;
    color: #555;
}
</style>
</head>
<body>

<div class="start_rating">
    <span class="star">★</span>
    <span class="star">★</span>
    <span class="star">★</span>
    <span class="star">★</span>
    <span class="star empty">★</span>
    <span class="rating-count">(1)</span>
</div>

                        <div class="price-range mb-4 text-start">
                            <span class="price h3 fw-bold">
                                @if ($product->front_sale_price !== $product->price)
                                <span class="sale-price">{{ format_price($product->price_with_taxes) }}</span>
                                @endif
                                <span class="price">{{ format_price($product->front_sale_price_with_taxes) }}</span>

                            </span>
                        </div>
                        @if ($product->variations()->count() > 0)
                        <div class="pr_switch_wrap">
                            {!! render_product_swatches($product, [
                            'selected' => $selectedAttrs,
                            'view' => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer',
                            ]) !!}
                        </div>
                        @endif
                        {{-- {!! render_product_options($product) !!} --}}
                        {{-- <div class="color-options mb-4 text-start" id="colorOptions" style="display: block;">
                            <h6 class="fw-bold mb-2">Màu sắc</h6>

                            <div class="color-swatches d-inline-flex flex-wrap gap-2 p-2 rounded" id="colorSwatches" style="background-color: #fffaf0;">
                                <button type="button" class="btn btn-color-circle position-relative active" title="Trắng" style="background-color: rgb(255, 255, 255);"></button><button type="button" class="btn btn-color-circle position-relative" title="Đen" style="background-color: rgb(0, 0, 0);"></button>
                            </div>
                        </div> --}}
                        <!-- KÍCH THƯỚC -->
                        {{-- <div class="size-options mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">Kích thước</h6>
                                <a href="#" class="size-guide text-primary small" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">Hướng dẫn chọn size</a>
                            </div>
                            <div class="size-buttons d-flex gap-2 flex-wrap" id="sizeButtons">
                                <button type="button" class="btn btn-outline-secondary btn-size active">S</button>
                            </div>
                        </div> --}}
                        {!! apply_filters(ECOMMERCE_PRODUCT_DETAIL_EXTRA_HTML, null, $product) !!}
                        <input type="hidden" name="id" id="hidden-product-id" value="{{ ($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id }}" />
                        {{-- <div class="size-options mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">

                                <a href="#" class="size-guide text-primary small" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">Hướng dẫn chọn size</a>
                            </div>

                        </div> --}}
                        <style type="text/css">
                            .size-options{
                                position: absolute;
    top: 127px;
    right: 0;
}

                            </style>
                        @if (EcommerceHelper::isCartEnabled())
                        <div class="quantity mb-4">
                            <h6 class="fw-bold mb-2 text-start">Số lượng</h6>
                            <div class="input-group quantity-group quantity">

                                {{-- <div class="quantity"> --}}
                                    <input type="button" value="-" class="minus btn btn-outline-secondary" />
                                    <input type="text" name="qty" {{ !empty($product->minium_order) ? 'value=' . $product->minium_order . ' min=' . $product->minium_order : ' value=1' }} title="Qty" class="qty form-control fw-bold" size="4" />
                                    <input type="button" value="+" class="plus btn btn-outline-secondary" />
                                    {{--
                                </div> --}}
                                {{-- <button class="btn btn-outline-secondary" type="button" id="decrease">-</button>
                                <input type="text" class="form-control fw-bold" value="1" readonly="" id="quantityInput">
                                <button class="btn btn-outline-secondary" type="button" id="increase">+</button> --}}
                            </div>
                        </div>

                        <div class="action-buttons mb-3">
                            <button class="btn btn-add-cart btn-fill-out btn-addtocart " id="addToCartBtn" type="submit">Thêm vào giỏ hàng</button>
                            <button class="btn btn-buy cart-buy-now-button" id="orderBtn" type="submit">Mua ngay</button>
                        </div>
                        @endif
                        <div class="product-meta mb-4 text-muted small text-start">
                            <div><strong>Mã sản phẩm:</strong> {{ $product->sku }}</div>
                            <div><strong>{{ __('Category') }}:</strong>
                                @if ($product->categories()->exists())
                                <span>
                                    @foreach ($product->categories()->get() as $category)
                                    <a href="{{ $category->url }}" style="color: inherit">{{ $category->name }}</a>
                                    @if (!$loop->last)
                                    ,
                                    @endif
                                    @endforeach
                                </span>
                                @endif
                            </div>
                        </div>
                    </form>

                    <!-- Dịch vụ -->
                    <div class="product-description-wrapper mt-4 ">
                        <h2 class="section-title text-start line-hr">Dịch vụ của chúng tôi</h2>

                    </div>

                    <div class="policy-wrapper mt-3">
                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <div class="policy-item">
                                    <div class="policy-icon-box text-box">
                                        <span>FREE</span>
                                        <span>SHIP</span>
                                    </div>
                                    <div class="policy-content">
                                        <span class="policy-title">Free ship cho đơn trên 200k</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="policy-item">
                                    <div class="policy-icon-box">
                                        <i class="bx bx-sync"></i>
                                    </div>
                                    <div class="policy-content">
                                        <span class="policy-title">30 ngày đổi trả cho bất kì thứ gì</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="policy-item">
                                    <div class="policy-icon-box">
                                        <i class="bx bx-phone-call"></i>
                                    </div>
                                    <div class="policy-content">
                                        <span class="policy-title">Hotline hỗ trợ 0783159798</span>
                                        <span class="policy-sub">hỗ trợ từ 8h30 - 22h</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="policy-item">
                                    <div class="policy-icon-box">
                                        <i class="bx bx-map-pin"></i>
                                    </div>
                                    <div class="policy-content">
                                        <span class="policy-title">Đến tận nơi nhận trả hàng</span>
                                        <span class="policy-sub">hoàn tiền trong 24h</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="sizeGuideModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sizeGuideLabel">HƯỚNG DẪN CHỌN SIZE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="text-center">
                <img src="assets/images/size-table.png" alt="Bảng size" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>
<section class="product-reviews-section">
    <div class="container">

        <div class="reviews-header">
            <h2 class="reviews-main-title">Đánh giá sản phẩm</h2>
            <div class="overall-rating">
                <span class="rating-score" id="avgRating">0.0</span>
                <div class="rating-stars text-warning" id="avgStars"><i class="bx bxs-star" style="font-size:1.5rem;"></i></div>
                <span class="review-count-text" id="reviewCountText">Chưa có đánh giá</span>
            </div>
            <div class="my-4" style="display: none">
                <button class="btn btn-review px-4" data-bs-toggle="collapse" data-bs-target="#writeReviewCollapse">
                    <i class="bx bxs-edit-alt"></i> Viết đánh giá
                </button>
            </div>
        </div>
        <div class="collapse mt-4" id="writeReviewCollapse" style="display: none">
            <div class="p-4 border rounded bg-light">
                <h5 class="fw-bold mb-3">Viết đánh giá của bạn</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Số điện thoại</label>
                    <input type="text" class="form-control" id="reviewPhone" placeholder="Nhập số điện thoại">
                    <small id="phoneReviewHelp" class="text-muted d-block mt-1"></small>
                </div>
                <!-- Tên khách -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Họ tên</label>
                    <input type="text" class="form-control" id="reviewName" placeholder="Họ tên" disabled="">
                </div>

                <!-- Số sao -->
                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Xếp hạng</label>
                    <div class="rating-stars-input" id="ratingStars">
                        <i class="bx bx-star" data-value="1"></i>
                        <i class="bx bx-star" data-value="2"></i>
                        <i class="bx bx-star" data-value="3"></i>
                        <i class="bx bx-star" data-value="4"></i>
                        <i class="bx bx-star" data-value="5"></i>
                    </div>
                </div>

                <!-- Size -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kích thước bạn đã mua</label>
                    <select class="form-select" id="reviewSize">
                        <option value="">Chọn size</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>

                <!-- Màu -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Màu sắc</label>
                    <input type="text" class="form-control" id="reviewColor" placeholder="VD: Đen, Trắng, Đỏ,...">
                </div>

                <!-- Nội dung -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nội dung đánh giá</label>
                    <textarea class="form-control" rows="4" id="reviewContent" placeholder="Chia sẻ trải nghiệm của bạn..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Chọn tag phù hợp với trải nghiệm của bạn <small class="text-muted">(có thể chọn nhiều)</small></label>
                    <div class="review-tag-selection d-flex flex-wrap gap-2" id="reviewTagContainer">
                        <div class="tag-select" data-tag-id="1">Sản phẩm đẹp</div>
                        <div class="tag-select" data-tag-id="2">Chất vải tốt</div>
                        <div class="tag-select" data-tag-id="3">Size chuẩn</div>
                        <div class="tag-select" data-tag-id="4">Giá tốt</div>
                        <div class="tag-select" data-tag-id="5">Giao hàng nhanh</div>
                        <div class="tag-select" data-tag-id="6">Đóng gói đẹp</div>
                        <div class="tag-select" data-tag-id="7">Đáng tiền</div>
                        <div class="tag-select" data-tag-id="8">Form dáng đẹp</div>
                        <div class="tag-select" data-tag-id="9">Mặc thoải mái</div>
                        <div class="tag-select" data-tag-id="10">Màu sắc chuẩn</div>
                    </div>
                </div>

                <!-- Upload ảnh -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Thêm hình ảnh (tối đa 5)</label>
                    <input type="file" class="form-control" id="reviewImages" accept="image/*" multiple="">
                    <div id="previewImages" class="d-flex gap-2 mt-2 flex-wrap"></div>
                </div>

                <!-- Nút gửi + nút hủy -->
                <div class="d-flex gap-2">
                    <button class="btn btn-primary px-4" id="submitReview" disabled="">Gửi đánh giá</button>
                    <button class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#writeReviewCollapse">Hủy</button>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 col-lg-4">
                <div class="review-filters">
                    <h6 class="filter-title">Lọc đánh giá</h6>
                    <div class="input-group search-reviews mb-4">
                        <span class="input-group-text"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" id="searchReviewInput" placeholder="Tìm kiếm đánh giá">
                    </div>

                    <h6 class="filter-title">Phân loại xếp hạng</h6>
                    <ul class="filter-list star-filter-list">
                        <li><button class="btn btn-filter-star" data-rating="5">5 <i class="bx bxs-star"></i></button></li>
                        <li><button class="btn btn-filter-star" data-rating="4">4 <i class="bx bxs-star"></i></button></li>
                        <li><button class="btn btn-filter-star" data-rating="3">3 <i class="bx bxs-star"></i></button></li>
                        <li><button class="btn btn-filter-star" data-rating="2">2 <i class="bx bxs-star"></i></button></li>
                        <li><button class="btn btn-filter-star" data-rating="1">1 <i class="bx bxs-star"></i></button></li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-lg-8 mt-4 mt-lg-0">
                <div class="review-list" id="reviewList">
                    @if (EcommerceHelper::isReviewEnabled())
                    <div id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div id="list-reviews">
                            @if (count($product->review_images))
                            <div class="my-3">
                                <h5>{{ __('Images from customer (:count)', ['count' => count($product->review_images)]) }}</h5>
                                <div class="block--review">
                                    <div class="block__images row m-0 block__images_total">
                                        @foreach ($product->review_images as $img)
                                        <a href="{{ RvMedia::getImageUrl($img) }}" class="col-lg-1 col-sm-2 col-3 more-review-images @if ($loop->iteration > 12) d-none @endif">
                                            <div class="border position-relative rounded">
                                                <img src="{{ RvMedia::getImageUrl($img, 'thumb') }}" alt="{{ $product->name }}" class="img-responsive rounded h-100" loading="lazy" />
                                                @if ($loop->iteration == 12 && count($product->review_images) - $loop->iteration > 0)
                                                <span>+{{ count($product->review_images) - $loop->iteration }}</span>
                                                @endif
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="comments block--product-reviews">
                                <h5 class="product_tab_title">{{ __(':count Reviews For :product', ['count' => $product->reviews_count, 'product' => $product->name]) }}</h5>
                                <product-reviews-component url="{{ route('public.ajax.product-reviews', $product->id) }}"></product-reviews-component>
                            </div>
                        </div>
                        <div class="review_form field_form mt-3">
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
                                                    <input type="file" name="images[]" data-max-files="{{ EcommerceHelper::reviewMaxFileNumber() }}" class="image-upload__file-input" accept="image/png,image/jpeg,image/jpg" multiple="multiple" data-max-size="{{ EcommerceHelper::reviewMaxFileSize(true) }}" data-max-size-message="{{ trans('validation.max.file', ['attribute' => '__attribute__', 'max' => '__max__']) }}">
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
                                        'max' => EcommerceHelper::reviewMaxFileSize(true),
                                        ]) }}
                                    </span>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-fill-out @if (!auth('customer')->check()) btn-disabled @endif" @if (!auth('customer')->check()) disabled @endif name="submit" value="Submit">Submit Review</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @endif
                    {{-- <div class="text-center text-muted py-5">Không tìm thấy đánh giá nào phù hợp.</div> --}}
                </div>

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center" id="reviewPagination"></ul>
                </nav>
            </div>
        </div>
    </div>
</section>
