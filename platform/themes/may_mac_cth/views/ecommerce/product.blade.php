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

                          @if(!empty($productImages))
                            <img  src="{{ RvMedia::getImageUrl($productImages[0]) }}" data-zoom-image="{{ RvMedia::getImageUrl($productImages[0]) }}"
                                 class="thumbnail active" style="width: 80px; height: 80px; object-fit: cover; cursor: pointer; border: 2px solid rgb(238, 238, 238); border-radius: 8px;"/>
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
                                Áo len cho mùa đông
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-12 col-md-6">
                <div class="product-info">
                    <h1 class="product-title mb-0 text-start">{{ $product->name }}</h1>
                    <div class="price-range mb-4 text-start">
                        <span class="price h3 fw-bold">
                            @if ($product->front_sale_price !== $product->price)
                                <span class="sale-price">{{ format_price($product->price_with_taxes) }}</span>
                            @endif
                            <span class="price">{{ format_price($product->front_sale_price_with_taxes) }}</span>

                        </span>
                    </div>
                    <div class="color-options mb-4 text-start" id="colorOptions" style="display: block;">
                        <h6 class="fw-bold mb-2">Màu sắc</h6>

                        <div class="color-swatches d-inline-flex flex-wrap gap-2 p-2 rounded" id="colorSwatches" style="background-color: #fffaf0;">
                            <button type="button" class="btn btn-color-circle position-relative active" title="Trắng" style="background-color: rgb(255, 255, 255);"></button><button type="button" class="btn btn-color-circle position-relative" title="Đen" style="background-color: rgb(0, 0, 0);"></button>
                        </div>
                    </div>
                    <!-- KÍCH THƯỚC -->
                    <div class="size-options mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Kích thước</h6>
                            <a href="#" class="size-guide text-primary small">Hướng dẫn chọn size</a>
                        </div>
                        <div class="size-buttons d-flex gap-2 flex-wrap" id="sizeButtons">
                            <button type="button" class="btn btn-outline-secondary btn-size active">S</button>
                        </div>
                    </div>

                    <div class="quantity mb-4">
                        <h6 class="fw-bold mb-2 text-start">Số lượng</h6>
                        <div class="input-group quantity-group">
                            <button class="btn btn-outline-secondary" type="button" id="decrease">-</button>
                            <input type="text" class="form-control fw-bold" value="1" readonly="" id="quantityInput">
                            <button class="btn btn-outline-secondary" type="button" id="increase">+</button>
                        </div>
                    </div>

                    <div class="action-buttons mb-3">
                        <button class="btn btn-add-cart" id="addToCartBtn">Thêm vào giỏ hàng</button>
                        <button class="btn btn-buy" id="orderBtn">Mua ngay</button>
                    </div>

                    <div class="product-meta mb-4 text-muted small text-start">
                        <div><strong>Mã sản phẩm:</strong> SP0021</div>
                        <div><strong>Danh mục:</strong> Áo mùa đông</div>
                    </div>

                    <!-- Dịch vụ -->
                    <div class="product-description-wrapper mt-4 pt-3 border-bottom">
                        <h2 class="section-title text-start">Dịch vụ của chúng tôi</h2>
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
<div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideLabel" aria-hidden="true">
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
            <div class="my-4">
                <button class="btn btn-review px-4" data-bs-toggle="collapse" data-bs-target="#writeReviewCollapse">
                    <i class="bx bxs-edit-alt"></i> Viết đánh giá
                </button>
            </div>
        </div>
        <div class="collapse mt-4" id="writeReviewCollapse">
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
                    <div class="text-center text-muted py-5">Không tìm thấy đánh giá nào phù hợp.</div>
                </div>

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center" id="reviewPagination"></ul>
                </nav>
            </div>
        </div>
    </div>
</section>
