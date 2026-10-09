@php
Theme::layout('homepage');
@endphp

<div class="container fade-element">
    <div class="banner-container position-relative text-center fade-element visible carousel slide" id="bannerContainer" data-bs-ride="carousel">
        @php
        $sliders = get_slider('home-slider');
        @endphp

        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach ($sliders->loadMissing('metadata') as $slider)
            <button type="button" data-bs-target="#bannerContainer" data-bs-slide-to="{{ $loop->index}}" class=" {{ $loop->index == 0 ? 'active' : '' }}" title="banner"></button>
            @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            @foreach ($sliders->loadMissing('metadata') as $slider)
            @php
            $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
            $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
            @endphp
            <div class="carousel-item  {{ $loop->index == 0 ? 'active' : '' }}">
                <img src="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}" class="d-block w-100" alt="">
            </div>

            {{-- <img src="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}" class="banner-image {{ $loop->index == 0 ? 'active' : '' }}" alt="{{ $slider->title }}"> --}}
            @endforeach

        </div>

    </div>

    @php
    $products = get_featured_products();
    @endphp
    <div class="d-flex justify-content-between align-items-center my-5  mb-4">
        <h3 class="product-title">SẢN PHẨM / SHOP</h3>
        <a href="{{ url('products') }}" class="view-more">
            Xem thêm sản phẩm <i class='bx bx-right-arrow-alt'></i>
        </a>
    </div>

    <div id="homeProductList">
        {{-- @foreach ($products as $product)
        <div class="col flex-col-1 max-w-50">
            <div class="card h-100 product-card border-0 shadow-sm overflow-hidden">
                <a href="{{ $product->url }}" class="text-decoration-none text-dark">
                    <div class="product-image-container position-relative">
                        <img src="{{ RvMedia::getImageUrl($product->image, null, false, RvMedia::getDefaultImage()) }}" class="card-img-top" alt="Áo len" style="object-fit: cover;" onerror="this.src='assets/images/no-image.jpg'">
                    </div>
                </a>
                <div class="card-body text-center p-2">
                    <p class="card-text mb-2 text-truncate fw-medium" title="Áo len">
                        {{ $product->name }}
                    </p>
                    <div class="price fw-bold fs-5 mb-2" style="color: #174DAF;">{{ format_price($product->front_sale_price_with_taxes) }}</div>
                </div>
            </div>
        </div>
        @endforeach --}}

        <trending-products-component class="row row-cols-1 row-cols-md-5 g-4" url="{{ route('public.ajax.home-products') }}"></trending-products-component>
        <script>

            $(function () {
                const components = $("trending-products-component");
                const loadedComponents = new WeakSet();

                function loadProducts(component) {
                    if (loadedComponents.has(component[0])) return;

                    loadedComponents.add(component[0]);

                    const url = component.attr("url");

                    if (!url) return;

                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        headers: {
                            "Accept": "application/json"
                        }
                    })
                    .done(function (response) {
                        if (response.data) {
                            component.html(response.data.join(""));
                        }
                    })
                    .fail(function (xhr) {
                        console.error(
                            "Không tải được sản phẩm:",
                            xhr.status,
                            xhr.responseText
                        );

                        // Cho phép thử tải lại nếu request thất bại
                        loadedComponents.delete(component[0]);
                    });
                }

                // Trình duyệt cũ không hỗ trợ IntersectionObserver
                if (!("IntersectionObserver" in window)) {
                    components.each(function () {
                        loadProducts($(this));
                    });
                    return;
                }

                const observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            observer.unobserve(entry.target);
                            loadProducts($(entry.target));
                        }
                    });
                }, {
                    rootMargin: "400px 0px",
                    threshold: 0
                });

                components.each(function () {
                    observer.observe(this);
                });
            });
        </script>
    </div>
</div>

<!-- Hướng dẫn -->
<div class="container my-5 fade-element">
    <h3 class="text-left mb-4 guide-title">HƯỚNG DẪN / TRỢ GIÚP</h3>
    <div class="row row-cols-1 row-cols-md-5 g-4 xs-gap-0">
        @php
        $faqs = get_list_faqs_categories([]);
        @endphp
        @foreach ($faqs as $faq)
        <div class="col flex-col-1  {{$loop->last?'':'max-w-50'}}">
            <a href="javascript:;" class="text-decoration-none" title="{{ $faq->name }} ">
                <div class="card text-center guide-card">
                    <div class="card-body">
                        <a href="{{ url('guide') }}">
                            <p class="card-text">{{ $faq->name }} <img src="{{ RvMedia::getImageUrl($faq->icon, null, false, RvMedia::getDefaultImage()) }}" alt="Guide 1" class="guide-image"></p>
                            <i class='bx bx-down-arrow-alt' style="color: #FFFFFF; font-size: 1.5em;"></i>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
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
        @php
        $posts = get_featured_posts(3);
        @endphp
        @foreach ($posts as $post)
        <div class="col news-item">
            <div class="card h-100 news-card shadow-sm border-0">
                <div style="overflow: hidden; height: 220px;">
                    <img src="{{ RvMedia::getImageUrl($post->image, 'medium') }}" class="card-img-top" alt=" {{ $post->name }}" style="height: 100%; width: 100%; object-fit: cover;">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-2">
                        <a href="{{$post->url}}" class="news-title-link fw-bold text-decoration-none">
                            {{ $post->name }}
                        </a>
                    </h5>
                    <p class="text-muted small mb-3">
                        <i class="bi bi-calendar3"></i>
                        {{ date('d/m/Y', strtotime($post->created_at)) }}

                    </p>
                    <p class="card-text text-muted flex-grow-1">
                        {{ $post->description }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
