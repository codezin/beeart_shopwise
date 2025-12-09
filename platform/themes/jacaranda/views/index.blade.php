@php
Theme::layout('homepage')
@endphp
<main id="main">
    <section id="banner" class="banner-home">
        <div id="carouselBanner" class="carousel carousel-dark slide" data-bs-ride="carousel">
            {{-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div> --}}
            <div class="carousel-inner">
                @php
                $sliders = get_slider('home-slider');
                @endphp
                @foreach($sliders->loadMissing('metadata') as $slider)
                @php
                $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
                $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
                @endphp
                <div class="carousel-item {{!$loop->index?'active':''}}">
                    <img src="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}" class="d-block w-100" alt="Professional wholesale suppliers">
                    <div class="carousel-caption">
                        <h5>{{ $slider->title }}</h5>
                        <p> {!! $slider->description !!}</p>
                        <div class="mt-0 mt-lg-5">
                            @php
                            $buttonText = MetaBox::getMetaData($slider, 'button_text', true);
                            @endphp
                            <a href="{{@$slider->link}}" class="btn-themes text-uppercase"> {!! BaseHelper::clean($buttonText ?: __('Shop Now')) !!}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="carousel-item">
                    <img src="asset/images/banner.jpg" class="d-block w-100" alt="Professional wholesale suppliers">
                    <div class="carousel-caption">
                        <h5>Professional wholesale suppliers</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore...</p>
                        <div class="mt-0 mt-lg-5"><a href="" class="btn-themes text-uppercase">Buy now</a></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="asset/images/banner.jpg" class="d-block w-100" alt="Professional wholesale suppliers">
                    <div class="carousel-caption">
                        <h5>Professional wholesale suppliers</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore...</p>
                        <div class="mt-0 mt-lg-5"><a href="" class="btn-themes text-uppercase">Buy now</a></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="asset/images/banner.jpg" class="d-block w-100" alt="Professional wholesale suppliers">
                    <div class="carousel-caption">
                        <h5>Professional wholesale suppliers</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore...</p>
                        <div class="mt-0 mt-lg-5"><a href="" class="btn-themes text-uppercase">Buy now</a></div>
                    </div>
                </div> --}}
            </div>
            <button class="carousel-control-prev d-none d-md-block" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next d-none d-md-block" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section id="about-us">
        @php
        $b_service = get_blocks_by_slug("our-service");
        $b_link = get_field($b_service,"block_our_services_link");
        @endphp
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                <div class="col-md-4" data-aos="fade-down">
                    <div id="header-about">
                        <header class="section-header">
                            <h2>{{$b_service->name}}</h2>
                        </header>
                        <div class="mt-4"><a href="{{$b_link!=""?$b_link:theme_option("booking")}}" class="btn-themes text-uppercase">{!! get_field($b_service,"block_our_services_button") !!}</a></div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 mt-lg-0 text-center" data-aos="fade-down"><img src="{{ RvMedia::getImageUrl($b_service->image)}}" alt="{{$b_service->name}}" class="img-fluid zoomImage" /></div>
                <div class="col-md-4 mt-3 mt-lg-0 text-center" data-aos="fade-down"><img src="{{ RvMedia::getImageUrl($b_service->banner)}}" alt="{{$b_service->name}}" class="img-fluid zoomImage" /></div>
            </div>
        </div>
    </section>
    <section id="feature-collection" class="feature-collection">
        @php
            $block = get_blocks_by_slug("featured-collection");
            $products_featured = get_featured_products([]);
        @endphp
        <div class="container">
            <header class="section-header text-center w-75 mx-auto" data-aos="fade-top">
                <div class="mb-3"><img src="{{base}}asset/images/title_flower.png" /></div>
                <h2>{{$block->name}}</h2>
                <p>{{$block->description}}</p>
            </header>
            <div class="swiper featureSwiper mt-5">
                <div class="swiper-wrapper">
                    @foreach($products_featured as $product)
                    <div class="swiper-slide">
                        <div class="box-product">
                            <a href="{{ $product->url }}"><img src="{{ RvMedia::getImageUrl($product->image) }}" class="img-fluid" alt=""></a>
                            <h4 class="title-product text-truncate"><a href="{{ $product->url }}">{!! $product->name !!}</a></h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next-01"><i class="fa-solid fa-chevron-right"></i></div>
                <div class="swiper-button-prev-01"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- ======= Feature Section ======= -->

    <section id="best-seller" class="best-seller mt-5 mb-5">
        <div class="container">
            @php
                $block = get_blocks_by_slug("best-seller");
                $products = get_products_on_sale([]);
            @endphp
            <header class="section-header text-center w-75 mx-auto" data-aos="fade-top">
                <div class="mb-3"><img src="{{base}}asset/images/title_flower.png" /></div>
                <h2>{{$block->name}}</h2>
                <p>{{$block->description}}</p>
            </header>

            <div id="products-home-list" class="products-list row gy-4 mt-4">
                @foreach($products as $product)
                <div class="col-xl-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="inner">
                        <article>
                            <div class="item-img">
                                <a href="{{ $product->url }}"><img src="{{ RvMedia::getImageUrl($product->image) }}" alt="" class="img-fluid"></a>
                            </div>
                            <h2 class="title">
                                <a href="{{ $product->url }}">{!! $product->name !!}</a>
                            </h2>
                            <div class="stars mt-3">
                                <i class="bi bi-star{{ ($product->reviews_avg * 20) >= 20?'-fill':''}}"></i>
                                <i class="bi bi-star{{ ($product->reviews_avg * 20) >= 40?'-fill':''}}"></i>
                                <i class="bi bi-star{{ ($product->reviews_avg * 20) >= 60?'-fill':''}}"></i>
                                <i class="bi bi-star{{ ($product->reviews_avg * 20) >= 80?'-fill':''}}"></i>
                                <i class="bi bi-star{{ ($product->reviews_avg * 20) == 100?'-fill':''}}"></i>
                                <span>{{ $product->reviews_count }} reviews</span>
                            </div>
                            <p class="mt-3">
                                @if ($product->front_sale_price !== $product->price)
                                <span class="sale-price">{{ format_price($product->price_with_taxes) }}</span>
                                @endif
                                <span class="price">{{ format_price($product->front_sale_price_with_taxes) }}</span></p>
                        </article>
                    </div>
                </div><!-- End item -->
                @endforeach


            </div><!-- End recent posts list -->

            <div class="mt-5 text-center"><a class="btn-more" href="">Show more product</a></div>

        </div>
    </section><!-- End Best Seller Section -->

    <section id="special-offers">
        @php
        $block = get_blocks_by_slug("special-offer");
        @endphp
        <div class="container text-center">
            <a href="{{$block->link}}"><img src="{{ RvMedia::getImageUrl($block->banner) }}" class="img-fluid"></a>
        </div>
    </section>

    <!-- Testimonials Section - Home Page -->
    <section id="testimonials" class="testimonials mt-5">
        @php
        $block = get_blocks_by_slug("why-customers-love-us");
        $testimonials = get_testimonials();
        @endphp
        <div class="container">
            <header class="section-header text-center w-75 mx-auto" data-aos="fade-top">
                <div class="mb-3"><img src="{{base}}asset/images/title_flower.png" /></div>
                <h2>{{$block->name}}</h2>
                <p>{{$block->description}}</p>
            </header>
            <div class="mt-0 mt-md-5">
                <div class="swiper reviewSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials  as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star{{ ($testimonial->star * 20) >= 20?'-fill':''}}"></i>
                                    <i class="bi bi-star{{ ($testimonial->star * 20) >= 40?'-fill':''}}"></i>
                                    <i class="bi bi-star{{ ($testimonial->star * 20) >= 60?'-fill':''}}"></i>
                                    <i class="bi bi-star{{ ($testimonial->star * 20) >= 80?'-fill':''}}"></i>
                                    <i class="bi bi-star{{ ($testimonial->star * 20) == 100?'-fill':''}}"></i>
                                </div>
                                <h3 class="testimonial-title">{!! $testimonial->name !!}</h3>
                                <p class="testimonial-comment">{!! $testimonial->content !!}</p>
                                <div class="d-flex align-items-center justify-content-center  align-items-md-start justify-content-md-start">
                                    <img src="{{ RvMedia::getImageUrl($testimonial->image) }}" class="testimonial-img flex-shrink-0" alt="">
                                    <div class="ms-3">
                                        <h4 class="user-title">{!! $testimonial->position !!}</h4>
                                        <div>{!! $testimonial->company !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-button-next-01"><i class="fa-solid fa-chevron-right"></i></div>
                    <div class="swiper-button-prev-01"><i class="fa-solid fa-chevron-left"></i></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery mt-5">
        @php
        $block = get_blocks_by_slug("gallery");
        $gallery = get_field($block, "gallery");
        @endphp
        <div class="container">
            <header class="section-header text-center w-75 mx-auto" data-aos="fade-top">
                <div class="mb-3"><img src="{{base}}asset/images/title_flower.png" /></div>
                <h2>{{$block->name}}</h2>
                <p>{{$block->description}}</p>
            </header>

            <div class="row mt-5">
                @if(!empty($gallery[0]))
                <div class="col-md-6">
                    <div class="gallery-item text-center" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ RvMedia::getImageUrl(get_sub_field($gallery[0],"image")) }}" class="glightbox">
                            <img src="{{ RvMedia::getImageUrl(get_sub_field($gallery[0],"image")) }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                @php unset($gallery[0]) @endphp
                @endif

                <div class="col-md-6 mt-4 mt-lg-0">
                    <div class="row">
                        @foreach($gallery as $g)
                        <div class="col-md-6  {{ $loop->index > 1?' mt-4 ':'' }} {{ $loop->index == "1" ?'mt-lg-0':''}}">
                            <div class="gallery-item text-center" data-aos="zoom-in" data-aos-delay="100">
                                <a href="{{ RvMedia::getImageUrl(get_sub_field($g,"image")) }}" class="glightbox">
                                    <img src="{{ RvMedia::getImageUrl(get_sub_field($g,"image")) }}" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-md-6 mt-4 mt-lg-0">
                            <div class="gallery-item text-center" data-aos="zoom-in" data-aos-delay="100">
                                <a href="asset/images/gallery3.png" class="glightbox">
                                    <img src="asset/images/gallery3.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="gallery-item text-center" data-aos="zoom-in" data-aos-delay="100">
                                <a href="asset/images/gallery4.png" class="glightbox">
                                    <img src="asset/images/gallery4.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="gallery-item text-center" data-aos="zoom-in" data-aos-delay="100">
                                <a href="asset/images/gallery5.png" class="glightbox">
                                    <img src="asset/images/gallery5.png" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Gallery Section -->

    <section id="follow-us" class="mt-5">
        <div class="container">
            <header class="section-header text-center">
                <div class="mb-3"><img src="{{base}}asset/images/title_flower.png" /></div>
                <h2>Follow Us</h2>
            </header>
            <div class="row mt-5">
                <div class="col-md-3 mt-3 mt-lg-0 text-center" data-aos="fade-down"><img src="{{base}}asset/images/follow1.png" alt="Follow Us" class="img-fluid zoomImage" /></div>
                <div class="col-md-3 mt-3 mt-lg-0 text-center" data-aos="fade-down"><img src="{{base}}asset/images/follow2.png" alt="Follow Us" class="img-fluid zoomImage" /></div>
                <div class="col-md-3 mt-3 mt-lg-0 text-center" data-aos="fade-down"><img src="{{base}}asset/images/follow3.png" alt="Follow Us" class="img-fluid zoomImage" /></div>
                <div class="col-md-3 mt-3 mt-lg-0 text-center" data-aos="fade-down"><img src="{{base}}asset/images/follow4.png" alt="Follow Us" class="img-fluid zoomImage" /></div>
            </div>
            {{-- <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0&appId=191997158795121" nonce="NpML3DmH"></script>

            <div class="fb-save" data-uri="https://www.instagram.com/facebook/" data-size=""></div> --}}
            <div id="follow_on"> Follow us on:
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-tiktok"></i></a>
            </div>

        </div>
    </section>

</main>
