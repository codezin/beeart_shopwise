@php
Theme::layout('homepage')
@endphp
  <!-- START SECTION BANNER -->
  <div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
            $sliders = get_slider('home-slider');
            @endphp
            @foreach($sliders->loadMissing('metadata') as $slider)
            @php
            $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
            $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
            @endphp
            <div class="carousel-item active background_bg" data-img-src="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}">
                <div class="banner_slide_content">
                    <div class="container">
                        <!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <h1 class="staggered-animation heading_h1" data-animation="slideInLeft" data-animation-delay="1s">
                                        {{ $slider->title }}
                                    </h1>
                                    @php
                                    $buttonText = MetaBox::getMetaData($slider, 'button_text', true);
                                    @endphp
                                    <a class="btn btn-fill-out staggered-animation text-uppercase"  href="{{@$slider->link}}" data-animation="slideInLeft" data-animation-delay="1.5s">
                                        {!! BaseHelper::clean($buttonText ?: __('Shop Now')) !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTAINER-->
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i  class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

 <!-- Banner -->
    <div class="banner-container position-relative text-center fade-element" id="bannerContainer">

        <div class="banner-dots" id="bannerDots"></div>
    </div>

    <!-- Sản phẩm -->
    <div class="container my-5 fade-element">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="product-title">SẢN PHẨM / SHOP</h3>
            <a href="products.html" class="view-more">
                Xem thêm sản phẩm <i class='bx bx-right-arrow-alt'></i>
            </a>
        </div>

        <div class="row row-cols-1 row-cols-md-5 g-4" id="homeProductList">
            <div class="col-12 text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Đang tải sản phẩm...</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Hướng dẫn -->
    <div class="container my-5 fade-element">
        <h3 class="text-left mb-4 guide-title">HƯỚNG DẪN / TRỢ GIÚP</h3>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <div class="col">
                <a href="#" class="text-decoration-none">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <a href="guide.html">
                                <p class="card-text">Hướng dẫn mua hàng <img src="../../assets/images/guide1.png"
                                        alt="Guide 1" class="guide-image"></p>
                                <i class='bx bx-down-arrow-alt' style="color: #FFFFFF; font-size: 1.5em;"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="#" class="text-decoration-none">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <a href="guide.html">
                                <p class="card-text">Hướng dẫn chọn size <img src="../../assets/images/guide2.png"
                                        alt="Guide 2" class="guide-image"></p>
                                <i class='bx bx-down-arrow-alt' style="color: #FFFFFF; font-size: 1.5em;"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="#" class="text-decoration-none">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <a href="guide.html">
                                <p class="card-text">Chính sách đổi trả <img src="../../assets/images/guide3.png"
                                        alt="Guide 3" class="guide-image"></p>
                                <i class='bx bx-down-arrow-alt' style="color: #FFFFFF; font-size: 1.5em;"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="#" class="text-decoration-none">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <a href="guide.html">
                                <p class="card-text">Chính sách giao hàng <img src="../../assets/images/guide4.png"
                                        alt="Guide 4" class="guide-image"></p>
                                <i class='bx bx-down-arrow-alt' style="color: #FFFFFF; font-size: 1.5em;"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="#" class="text-decoration-none">
                    <div class="card text-center guide-card">
                        <div class="card-body">
                            <a href="guide.html">
                                <p class="card-text">FAQ (Câu hỏi thường gặp) <img src="../../assets/images/guide5.png"
                                        alt="Guide 5" class="guide-image"></p>
                                <i class='bx bx-down-arrow-alt' style="color: #FFFFFF; font-size: 1.5em;"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Tin tức -->
    <div class="container my-5 fade-element">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="news-title">TIN TỨC</h3>
            <a href="news.html" class="news-view-more">
                Xem thêm tin tức <i class='bx bx-right-arrow-alt'></i>
            </a>
        </div>

        <!-- Container -->
        <div class="row row-cols-1 row-cols-md-3 g-4" id="homeNewsContainer">
            <!-- Loading giống news.html -->
            <div class="col-12 text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Đang tải...</span>
                </div>
                <p class="mt-3">Đang tải tin tức...</p>
            </div>
        </div>
    </div>
