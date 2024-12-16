@php
    Theme::layout('homepage');
@endphp
<!-- ======= Banner Section ======= -->
<section id="banner" class="banner-home">
    {{-- <div id="banner-home-1"></div> --}}

    @php
    $block = get_blocks_by_slug("the-true-meaning");
    @endphp
    @if(!empty($block))
    <div id="banner-home-2" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="300" class="d-flex justify-content-center align-items-center">
        <img src="{{ RvMedia::getImageUrl($block->image) }}" data-aos="fade-up" data-aos-offset="300" data-aos-duration="3000" alt="" />
    </div>
    <div id="banner-home-3">
        <div class="container">
            <div class="box-desc" data-aos="fade-up">
                <h2>{{ $block->name }}</h2>
                <div>{!! $block->description !!}</div>
            </div>
        </div>
    </div>
    @endif
    <div id="banner-home-4">
        <div id="tree-panel">
            <img id="tree" src="{{base}}assets/img/tree.gif" alt="">
        </div>
    </div>
</section>

<main id="main">
    <section id="services" class="services_home">
        @php
        $block = get_blocks_by_slug("our-service");
        $items =get_field($block,"our_service");
        @endphp
        <div class="container service-container" data-aos="fade-up">
            <div class="section-header swidth">
                <h3>{!! $block->name !!}</h3>
                <h2>{!! $block->description !!}</h2>
                <p class="mt-2">{!! $block->contact !!}</p>
            </div>
            @if(!empty($items))
            <div id="services-grid" class="row mt-3">
                @foreach( $items as $item)
                <div class="col-md-3 service-item">
                    <a href="{{get_sub_field($item,"link")??'#'}}">
                        <div class="row box-service">
                            <div class="col-12 img imgbox">
                                <img src="{{ RvMedia::getImageUrl(get_sub_field($item,"image")) }}" alt="">
                            </div>
                            <h4 class="col-12">{{get_sub_field($item,"name")}} <i class="fa-light fa-arrow-right-long"></i></h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @endif
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section id="your-items" class="your-items">
        @php
        $block = get_blocks_by_slug("for-you-items");
        @endphp

        <div class="container" data-aos="fade-up">
            <div class="section-header swidth">
                <h3>{!! $block->name !!}</h3>
                <h2>{!! $block->description !!}</h2>
                <p>{!! $block->contact !!}</p>
            </div>
            <img id="your-time" src="{{base}}assets/img/your-time.png" alt="">
        </div>
    </section>

    <section id="occasions" class="occasions d-none d-md-block">
        @php
        $block = get_blocks_by_slug("occasions");
        @endphp
        <img id="occasions_left" src="{{base}}assets/img/occasions_left.png" alt="">
        <img id="occasions_right" src="{{base}}assets/img/occasions_right.png" alt="">
        <div class="container" data-aos="fade-up">
            <div class="section-header swidth">
                <h3>{!! $block->name !!}</h3>
                <h2>{!! $block->description !!}</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Anniversary <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Graduation <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Corporation Gift <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">House warning <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Condderces / Sympathy <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Funerals <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Birthday <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                    </ul>
                </div>
                <div class="col-md-4 px-lg-5">
                    <ul class="list-group">
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Get well <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">New Year - 1st Jan <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Womens day - 8th March <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Easter - 10th April <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Mothers day - 12th May <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Friendship Day - 30th July
                                <img src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">National girlfriend’s day-
                                1st Aug <img src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">National boyfriend’s day- 3rd
                                Oct <img src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Boss Day - 16th Oct <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Halloween - 31st Oct <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Thanks giving - 23rd Nov <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                        <li class="list-group-item"><a href=""
                                class="d-flex align-items-center justify-content-between">Christmas - 25th Dec <img
                                    src="{{base}}assets/img/arrow.svg" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="favourite-month" class="favourite-month">
        <img id="favourite_right" src="{{base}}assets/img/favourite_right.png" alt="">
        <img id="favourite_left" src="{{base}}assets/img/favourite_left.png" alt="">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3>Favourite month of the year</h3>
                <h2>A week of romance</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @php
                    $collections = get_product_collections();
                    @endphp
                    <h3 class="d-block d-md-none text-center">{{ date("F",strtotime( $collections->first()->date)) }} </h3>
                    <ul class="list-group">

                        @if(!empty($collections))
                        @foreach($collections as $col)
                        <li class="list-group-item">
                            <a href=""
                                class="d-flex align-items-center justify-content-between">
                                <span class="d-flex flex-wrap-sm">
                                    {{$col->name}}&nbsp;
                                    <span class="d-block d-md-none">{{date("jS",strtotime($col->date))}}</span>
                                    <span class="d-none d-md-block">{{ date(" - jS M",strtotime($col->date)) }}</span>
                                </span>
                                <img src="{{base}}assets/img/arrow.svg" alt="">

                            </a>
                        </li>
                        @endforeach
                        @endif

                    </ul>
                </div>
                <div class="col-md-6 mt-5 mt-lg-0">
                    <img src="{{base}}assets/img/favourite-month.png" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </section>

    <section id="send-email" class="send-email">
        <div class="container" data-aos="fade-up">
            <div id="sendmail-panel" class="d-flex align-items-center justify-content-between">
                <div class="inner">
                    <div class="section-header">
                        <h3>Say Hi</h3>
                        <h2>IT'S OUR PLEASURE TO ASSIST YOU</h2>
                    </div>
                    <div id="btn-send"><a href="https://www.instagram.com/lilharra.blooms/"><i
                                class="fa-brands fa-instagram"></i> Send message</a></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Testimonial Section ======= -->
    <section id="testimonial" class="testimonial">
        <img id="testimonial_left" src="{{base}}assets/img/testimonial_left.png" alt="">
        <img id="testimonial_right" src="{{base}}assets/img/testimonial_right.png" alt="">
        <div class="container" data-aos="fade-up">
            <div id="testimonial-panel">
                <div class="section-header">
                    <h3>Testimonial</h3>
                    <h2>What Our Customers Say About Us</h2>
                </div>
                <div class="testimonial-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach (get_testimonials() as $r)
                        <div class="swiper-slide">
                            <div class="testimonial-item d-lg-flex justify-content-center align-items-center">
                                <div class="img">
                                    <img src="{{base}}assets/img/testimoial-user-1.png" class="img-fluid" alt="" />
                                </div>
                                <div class="info">
                                    <h3>{{$r->name}}</h3>
                                    <div class="year-old">{{$r->company}}</div>
                                    <div class="star"><i class="fa-solid fa-star"></i> <i
                                            class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i
                                            class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i></div>
                                    <p class="description">
                                        {!! $r->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section><!-- End Testimonial Section -->

    <section id="upcoming" class="upcoming">
        <div class="container" data-aos="fade-up">
            <div class="inner">
                <div class="section-header">
                    <h2>Upcoming event</h2>
                    <p>Excited to meet you at future market places Stay tuned here for updates on where we'll be next.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <section id="special-days" class="special-days">
        <div class="container" data-aos="fade-up">
            <div class="section-header swidth">
                <h2>Let us remember your special days, Never miss a special moment again!</h2>
                <p>We’ll send you a reminder 7 days in advance to ensure you have plenty of time to. prepare the perfect
                    gift for your family loved ones, and friends</p>
            </div>

            <form id="frmSpecialDay" action="">

                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <label for="sloccasions" class="col-form-label">Type of Occasions:</label>
                    </div>
                    <div class="col-auto flex-fill">
                        <select id="sloccasions" class="form-select form-basic"
                            aria-label="e.g, Birthday,Anniversary, Holiday">
                            <option selected>e.g, Birthday,Anniversary, Holiday</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <label for="sldate" class="col-form-label">Date of Occasion:</label>
                    </div>
                    <div class="col-auto flex-fill">
                        <select id="sldate" class="form-select form-basic"
                            aria-label="e.g, Birthday,Anniversary, Holiday">
                            <option selected>(mm/dd/yyyy)</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-md-4">
                        <label for="txtReceiver" class="col-form-label">Receiver name:</label>
                    </div>
                    <div class="col-auto flex-fill">
                        <input type="text" id="txtReceiver" class="form-control form-basic"
                            placeholder="Receiver name">
                    </div>
                </div>

                <div class="row mt-4 align-items-center">
                    <div class="col-md-4"></div>
                    <div class="col-lg-auto col-12 text-center">
                        <button id="btnsend">Send <i class="fa-sharp fa-thin fa-arrow-right-long"></i></button>
                    </div>
                </div>

            </form>


        </div>
    </section>

</main><!-- End #main -->
