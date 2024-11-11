@php
    Theme::layout('homepage');
@endphp
<main id="main">
    <section id="banner" class="banner-home">
		@php
        	$sliders = get_slider('home-slider');
        @endphp
        <div id="carouselBanner" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders->loadMissing('metadata') as $slider)
                <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="{{$loop->index}}" class="{{!$loop->index?'active':''}}"
                    aria-current="true" aria-label="Slide 1"></button>
                @endforeach
            </div>
            <div class="carousel-inner">

                @foreach ($sliders->loadMissing('metadata') as $slider)
                    @php
                        $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
                        $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
                    @endphp
                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                        <img src="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}"
                            class="d-block w-100" alt="Professional wholesale suppliers">
                        <div class="carousel-caption">
                            <h5>{{$slider->title}}</h5>
                            <h1>{{$slider->caption}}</h1>
                            <h5>{{$slider->caption_2}}</h5>
                            <p class="mt-0 mt-lg-3"> {{ $slider->description }}</p>
                            <div class="mt-3 mt-lg-5"><a href="{{@$slider->link}}" class="btn-themes">{{__("View more")}}</a></div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <section id="core-values" class="core-values">
        @php
        $block = get_blocks_by_slug("corevalue");
        $items = get_field($block,"block_why_you_love_us");
        @endphp
        <div class="container">
            <header class="section-header text-center swidth" data-aos="fade-top">
                <h2>{{$block->name}}</h2>
            </header>
            <div class="row d-flex align-items-center justify-content-center">
                @if(!empty( $items))
                @foreach(  $items as $item)
                <div class="col-4 col-lg text-center" data-aos="fade-down">
                    <div class="box-values">
                        <div class="img d-flex align-items-end"><img src="{{ RvMedia::getImageUrl(get_sub_field($item,"image")) }}" alt="{{get_sub_field($item,"name")}}"
                                class="img-fluid zoomImage" /></div>
                        <h4>{{get_sub_field($item,"name")}}</h4>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

    <section id="about-us-home" class="about-us-home">
        @php
            $block = get_page_by_id(4);
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="about-us-text">
                        <h3>{{  $block->name}}</h3>
                        <h2>CLEVER WORLD</h2>
                       {!! $block->description !!}
                        <div class="mt-5"><a href="{{$block->url}}" class="btn-themes">{{__("See more")}} <img
                                    src="{{base}}asset/images/right-arrow.svg" /></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ======= Aboutus Section ======= -->

    <section id="projects-home" class="projects">
        @php
        $cleverbox = get_page_by_id("16");
        $peektoy = get_page_by_id("17");
        $block = get_blocks_by_slug("project");
        @endphp
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center mt-3 mt-lg-0">
                <div class="col-md-6 col-lg-4 mt-5 mt-lg-0 text-center" data-aos="fade-down">
                    <img src="{{ RvMedia::getImageUrl($cleverbox->image) }}" alt="Project 1" class="img-fluid zoomImage" />
                    <h3><a href="{{@$cleverbox->url}}">{{@$cleverbox->name}}</a></h3>
                </div>
                <div class="col-md-6 col-lg-4 mt-3 mt-lg-0 text-center" data-aos="fade-down">
                    <img src="{{ RvMedia::getImageUrl($peektoy->image) }}" alt="Project 2" class="img-fluid zoomImage" />
                    <h3><a href="{{@$peektoy->url}}">{{@$peektoy->name}}</a></h3>
                </div>
                <div class="col-md-12 col-lg-4 mt-5 mt-lg-0" data-aos="fade-down">
                    <div class="ms-3">
                        <header class="section-header">
                            <h2>{{ $block->name }}</h2>
                        </header>
                        <p style="    text-align: justify;">{!! $block->description !!}</p>
                        <div class="mt-4">
                            <a href="{{ $block->link }}" class="btn-themes">{{__("See more") }}
                                <img src="{{base}}asset/images/right-arrow-white.svg" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="partner" class="partner">
        @php
               $block = get_blocks_by_slug("partner");
               $gallery = get_field($block,"gallery");
        @endphp
        <div id="box_partner" class=" ">
            <header class="section-header text-center" data-aos="fade-top">
                <h2>{{ $block->name }}</h2>
                <p>{!! $block->description !!}</p>
            </header>
            <div class="swiper featureSwiper">
                <div class="swiper-wrapper">
                    @foreach ($gallery  as $r)
                    <div class="swiper-slide d-flex align-items-center justify-content-center">
                        <div class="box-item d-flex align-items-center justify-content-center">
                            <img src="{{ RvMedia::getImageUrl(get_sub_field($r,"image")) }}" class="img-fluid-w" alt="">
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-button-next-01"><i class="fa-solid fa-chevron-right"></i></div>
                <div class="swiper-button-prev-01"><i class="fa-solid fa-chevron-left"></i></div>
            </div>
        </div>
	<style type="text/css">
	.img-fluid-w {
	    max-width: 100%;
	    height: 100%;
	    width: auto;
	    max-height: 60px;
	}
    @media screen and (max-width: 1200px) {
        .img-fluid-w {

            max-height: 43px;
        }
    }
	</style>
	    </section>

    <!-- Testimonials Section - Home Page -->
    <section id="testimonials" class="testimonials">
        @php
                $block = get_blocks_by_slug("testimonials");
        @endphp
        <div id="panel_testimonials">
            <header class="section-header text-center swidth" data-aos="fade-top" style="margin-bottom:130px;display:none">
                <h2>{{ $block->name }}</h2>
                <p>{!! $block->description !!}</p>
            </header>
            <div class="mt-0 mt-md-5" style="display:none">
                <div class="swiper reviewSwiper">
                    <div class="swiper-wrapper">
                        @foreach (get_testimonials() as $r)
                        <div class="swiper-slide">

                            <div class="testimonial-item">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="{{base}}asset/images/user.png" class="testimonial-img flex-shrink-0"
                                        alt="">
                                    <div class="ms-3">
                                        <h4 class="user-title">{{$r->name}}</h4>
                                        <div class="position">CEO</div>
                                        <div class="stars">
                                            <i class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i><i
                                                class="fa-solid fa-heart"></i><i class="fa-solid fa-heart"></i><i
                                                class="fa-solid fa-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="testimonial-comment d-flex justify-content-between">
                                    <span class="comma-start"><img src="{{base}}asset/images/comma-start.png" /></span>
                                    <span class="comma-content">I’ve tried a lot of glues but this is my holy
                                        grail! The retention I get is insane and my clients are always so happy
                                        with how long their lashes last!</span>
                                    <span class="comma-end"><img src="{{base}}asset/images/comma-end.png" /></span>
                                </p>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next-01"><i class="fa-solid fa-chevron-right"></i></div>
                    <div class="swiper-button-prev-01"><i class="fa-solid fa-chevron-left"></i></div>
                </div>
            </div>
        </div>
    </section><!-- End Testimonials Section -->

    <section id="news-home" class="news-home mb-5">
        <div class="container">
            @php
                $news = get_featured_posts(4);
            @endphp
            <header class="section-header d-flex justify-content-between" data-aos="fade-top">
                <h2>{{__("News")}}</h2>
                <div>
                    <a href="{{url(Language::getCurrentLocale()=="en"?"en/news":"news")}}" class="btn-viewall">{{__("All articles")}}
                        <img src="{{base}}asset/images/right-arrow.svg" />
                    </a>
                </div>
            </header>
            <div class="row gy-4">
                @foreach( $news as $r)
                <div class="col-xl-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <article>
                        <div class="img imgbox">
                            <a href="{{$r->url}}"><img src="{{ RvMedia::getImageUrl($r->image) }}" alt=""></a>
                        </div>
                        <div class="description">
                            <p class="post-date">
                                <time>Clever World | {{date("d.m.Y",strtotime($r->created_at))}}</time>
                            </p>
                            <h2 class="title">
                                <a href="{{$r->url}}">{{ $r->name }}</a>
                            </h2>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End News Home Section -->
    {!! Theme::partial('section.contact') !!}
</main>
