{!! Theme::partial('header') !!}
@php
    $page = Theme::get('page');
@endphp

<link rel="stylesheet" href="{{ base }}assets/css/guide.css" />
<section class="guide-section">
    <div class="title-section">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="page-title">{{$page->name}}</div>
            <div class="breadcrumb-nav" id="breadcrumb">
                <a href="{{ route('public.index') }}">Trang chủ</a>
                <span class="sep"> &gt; </span>
                <span class="current">Hướng dẫn</span>
            </div>
        </div>
    </div>
    <div class="container my-5 fade-element visible">
        <div class="row row-cols-1 row-cols-md-3  row-cols-xxl-5  g-4">
            <div class="col">
                <a href="javascript:;" class="text-decoration-none guide-card-link" data-target="guide-content-1-1,guide-content-1-2">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <p class="card-text">Hướng dẫn mua hàng <img src="assets/images/guide1.png" alt="Guide 1" class="guide-image"></p>
                            <i class="bx bx-down-arrow-alt" style="color: #FFFFFF; font-size: 1.5em;"></i>
                        </div>
                    </div>
                </a>
                <div class="guide-content-wrapper"></div>
            </div>
            <div class="col">
                <a href="javascript:;" class="text-decoration-none guide-card-link" data-target="guide-content-2-1,guide-content-2-2">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <p class="card-text">Hướng dẫn chọn size <img src="assets/images/guide2.png" alt="Guide 2" class="guide-image"></p>
                            <i class="bx bx-down-arrow-alt" style="color: #FFFFFF; font-size: 1.5em;"></i>
                        </div>
                    </div>
                </a>
                <div class="guide-content-wrapper"></div>
            </div>
            <div class="col">
                <a href="javascript:;" class="text-decoration-none guide-card-link" data-target="guide-content-3-1,guide-content-3-2">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <p class="card-text">Chính sách đổi trả <img src="assets/images/guide3.png" alt="Guide 3" class="guide-image"></p>
                            <i class="bx bx-down-arrow-alt" style="color: #FFFFFF; font-size: 1.5em;"></i>
                        </div>
                    </div>
                </a>
                <div class="guide-content-wrapper"></div>
            </div>
            <div class="col">
                <a href="javascript:;" class="text-decoration-none guide-card-link" data-target="guide-content-4-1,guide-content-4-2">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <p class="card-text">Chính sách giao hàng <img src="assets/images/guide4.png" alt="Guide 4" class="guide-image"></p>
                            <i class="bx bx-down-arrow-alt" style="color: #FFFFFF; font-size: 1.5em;"></i>
                        </div>
                    </div>
                </a>
                <div class="guide-content-wrapper"></div>
            </div>
            <div class="col">
                <a href="javascript:;" class="text-decoration-none guide-card-link" data-target="guide-content-5-1,guide-content-5-2">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <p class="card-text">FAQ (Câu hỏi thường gặp) <img src="assets/images/guide5.png" alt="Guide 5" class="guide-image"></p>
                            <i class="bx bx-down-arrow-alt" style="color: #FFFFFF; font-size: 1.5em;"></i>
                        </div>
                    </div>
                </a>
                <div class="guide-content-wrapper"></div>
            </div>
        </div>

        <div class="guide-content-area mt-5 row row-cols-1 row-cols-md-2 g-4" style="display: none;">
            <div class="col guide-content" id="guide-content-1-1" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Hướng dẫn mua hàng - Bước cơ bản</h4>
                        <p class="card-text">1. Chọn sản phẩm từ danh mục.
                            <br>2. Thêm vào giỏ hàng và kiểm tra.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col guide-content" id="guide-content-1-2" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Hướng dẫn mua hàng - Thanh toán</h4>
                        <p class="card-text">1. Nhập thông tin giao hàng
                            <br>2. Xác nhận đơn hàng và thanh toán.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col guide-content" id="guide-content-2-1" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Hướng dẫn chọn size - So sánh</h4>
                        <p class="card-text">1. So sánh số đo với bảng size.
                            <br>2. Liên hệ tư vấn nếu cần.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col guide-content" id="guide-content-2-2" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Hướng dẫn chọn size - Đo cơ thể</h4>
                        <p class="card-text">1. Đo kích thước ngực, eo, hông.
                            <br>2. Ghi lại số đo chính xác.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col guide-content" id="guide-content-3-1" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Chính sách đổi trả - Quy trình</h4>
                        <p class="card-text">1. Liên hệ hotline.
                            <br>2. Gửi sản phẩm về cửa hàng.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col guide-content" id="guide-content-3-2" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Chính sách đổi trả - Điều kiện</h4>
                        <p class="card-text"> 1. Đổi trả trong 7 ngày.
                            <br>2. Sản phẩm chưa sử dụng.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col guide-content" id="guide-content-4-1" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Chính sách giao hàng - Chi phí</h4>
                        <p class="card-text">1. Miễn phí cho đơn từ 500.000 VNĐ.
                            <br>2. Kiểm tra hàng trước thanh toán.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col guide-content" id="guide-content-4-2" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Chính sách giao hàng - Thời gian</h4>
                        <p class="card-text">1. Giao hàng trong 3-5 ngày.
                            <br>2. Toàn quốc.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col guide-content" id="guide-content-5-1" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">FAQ - Theo dõi đơn hàng</h4>
                        <p class="card-text">1. Kiểm tra trạng thái đơn hàng.
                            <br>2. Liên hệ hotline để hỗ trợ.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col guide-content" id="guide-content-5-2" style="display: none;">
                <div class="card about-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">FAQ - Đặt hàng</h4>
                        <p class="card-text"> 1. Làm thế nào để đặt hàng?
                            <br>2. Có thể tùy chỉnh thiết kế không?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{!! Theme::content() !!}
{!! Theme::partial('footer') !!}
