@php
Theme::layout('homepage')
@endphp
<main class="page-content">
    <section class="hero-section">
        @php
        $block = get_blocks_by_slug("mockup");
        @endphp
        <div class="hero-section-bg">
            <video autoplay loop muted playsinline style="border: none" >
                <source src="storage/{{ @$block->file}}" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-section-main">
            {{-- <img src="{{ RvMedia::getImageUrl($block->image) }}" alt="" srcset="" /> --}}
            {{-- <img src="{{base}}img/mockup-center.png" alt="" srcset="" />
            <div class="wrap-content">
                <h2>Sức khỏe là chìa khoá của cuộc sống thịnh vượng</h2>
                <h1>
                    Thiên Sâm Trường Sinh <br />
                    Cho Cuộc Sống Trường Thọ
                </h1>
                <p class="since">Since 1980</p>
                <p>
                    Xuất phát từ khát vọng đem cuộc sống trường thọ tới gần hơn với tất cả mọi người trên toàn
                    thế giới
                </p>
                <div class="wrap-name">
                    <ul>
                        <li>Jang Seang Farm</li>
                        <li>Jang Seang Pharma</li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </section>
    <section class="certificate-section" >
        <div class="wrap-content">
            <h2 data-aos="fade-right"   data-aos-offset="200" data-aos-delay="50">{{__("certificate")}}</h2>
            <h3>
                <div class="slide-container">
                   {!! __("certificate_1") !!}
                   {!! __("certificate_2") !!}
                </div>
            </h3>
            <p class="since uael-drop-in">Since 1988</p>
            <p>
                {{-- {{__("certificate_3")}} --}}
            </p>
            {{-- <div class="wrap-name">
                <ul>
                    <li>Jang Seang Farm</li>
                    <li>Jang Seang Pharma</li>
                </ul>
            </div> --}}

        </div>
        <div class="container d-flex justify-content-center">
            <img src="{{ RvMedia::getImageUrl($block->image) }}" alt="" srcset="" />
        </div>
    </section>
    <style>
        .slide-container {
            position: relative;
            width: 100%;
            height: auto; /* Thay đổi chiều cao thành auto để nói rằng nó có thể co giãn theo nội dung */
            overflow: hidden;
        }

        .uael-slide-main_ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center; /* Căn giữa các ul */
        }

        .uael-slide-main_ul li {
            display: inline; /* Thay đổi thành inline để nó xuống dòng khi cần thiết */
            opacity: 0;
            margin: 0px 5px; /* Khoảng cách giữa các từ */
        }

    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var items = document.querySelectorAll('.uael-slide-main_ul li');
            var delay = 400; // Delay mỗi từ 1 giây

            function revealWords() {
                items.forEach(function(item, index) {
                    setTimeout(function() {
                        item.style.opacity = '1';
                    }, index * delay);
                });
            }
            revealWords();
            setInterval(() => {
                items.forEach(function(item, index) {
                    item.style.opacity = '';
                });
                revealWords();
                console.log('revealWords');
            }, 9000);

        });
        </script>

    <section class="factory-section">
        @php
        $block = get_blocks_by_slug("factory-section");
        @endphp
        <video autoplay loop muted playsinline style="border: none">
            <source src="storage/{{ @$block->file}}" type="video/mp4" />
            Your browser does not support the video tag.
        </video>
    </section>

    {{-- <section class="brands-section">
        @php
            $brands = get_all_brands();
        @endphp
        <div class="container">
            <h3>{{__("Product brands")}}</h3>
            <div class="brands-section-row">
                @foreach ($brands as $brand)
                <img src="{{ RvMedia::getImageUrl($brand->logo) }}" alt="" srcset="" />
                @endforeach
            </div>
        </div>
    </section> --}}



    @php
        $items = get_featured_products([]);
        $b_product = get_blocks_by_id("15");

    @endphp
    <section class="product-section">

        <h3>{{__("Product")}}</h3>
        <div class="container">
            <div class="product-section-list">
                @if(!empty($items))
                @for($i=0;$i<10;$i++)
                @foreach($items as $product)
                <div>

                    <div class="product-section-list-card">
                        <img src="{{ RvMedia::getImageUrl($product->image) }}" alt="" srcset="" class="zoomImage" />
                        {{-- <h4>{{$product->name}}</h4>
                        <a href="{{$product->url}}">{{__("See more")}}</a> --}}
                    </div>
                </div>
                @endforeach

                @endfor








                @endif
            </div>
            <a href="{{@$b_product->link}}">
                <button class=" animation-float">{{__("All products")}}</button>
            </a>
        </div>
    </section>
    <section class="aboutus-section">
        @php
            $about = get_page_by_id(4);
        @endphp
        <div class="container">
            {{-- <div class="aboutus-section-row">
                <img class="img-aboutus" src="{{ RvMedia::getImageUrl($about->image) }}" alt="" srcset="" />
                <div class="aboutus-section-col">
                    <h3>{{ $about->name }}</h3>
                    <p>
                        {{$about->description}}
                    </p>
                    <a href="{{$about->url}}">
                        <button>{{__("See more")}}</button>
                    </a>
                </div>
            </div> --}}
            <div class="aboutus-section-row">
                @php
                    $agency = get_page_by_id(10);
                @endphp

                <div class="aboutus-section-col" data-aos="fade-right"  data-aos-delay="200">
                    <h3>{{__("Network layout")}}</h3>
                    <div class="aboutus-section-content">
                        <div>
                            {!! $agency->description !!}
                        </div>
                        <div class="aboutus-section-content-list">
                            <img src="{{base}}img/icon-about-1.png" alt="" srcset="" />
                            <div class="aboutus-section-content-list-wrap">
                                <strong>{{__("Headquarters")}}:</strong>
                                <p>
                                    {{get_field($agency,"truc_so_chinh")}}
                                </p>
                            </div>
                        </div>
                        <div class="aboutus-section-content-list">
                            <img src="{{base}}img/icon-about-2.png" alt="" srcset="" />
                            <div class="aboutus-section-content-list-wrap col-flex">
                                <div class="aboutus-section-content-list-col">
                                    <strong>{{__("Distribution")}}:</strong>
                                    <p>
                                        {{get_field($agency,"phan_phoi")}}
                                    </p>
                                </div>
                                <div class="aboutus-section-content-list-col">
                                    <strong>{{__("Distribution 2")}}:</strong>
                                    <p>
                                        {{get_field($agency,"phan_phoi_2")}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{$agency->url}}" ><button class="animation-float">{{__("List of agents")}}</button></a>
                </div>
                <img class="img-aboutus" data-aos="fade-left"   data-aos-offset="200" data-aos-delay="350" src="{{ RvMedia::getImageUrl(get_field($agency,"agency_image")) }}" alt="" srcset="" />
            </div>
        </div>
        <img class="img-bottom-aboutus" src="{{base}}img/bottom-aboutus.png" alt="" srcset="" data-aos="fade-up"  data-aos-duration="1000"/>
    </section>

    <section class="news-section">
        @php
            $posts = get_featured_posts(4);
            $video = get_blocks_by_slug("video");
        @endphp

        <div class="container">
            <div class="news-section-row">

                <div class="aboutus-section-col">
                    <h3>{{__("Video")}}</h3>
                    <div class="video-section-list">
                        {{-- <video autoplay loop muted style="border: none;width:100%">
                            <source src="storage/{{ $block->file}}" type="video/mp4" />
                            Your browser does not support the video tag.
                        </video> --}}
                        {{-- <iframe style="border-radius: 15px;" width="560" height="315" src="https://www.youtube.com/embed/pgnqSEVWyls?si=AnlXD0ULUxugVEvP" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                        {!! @$video->content !!}
                    </div>
                </div>
                <div class="aboutus-section-col" >
                    <h3>{{__("News")}}</h3>
                    <div class="news-section-list">
                        @foreach ($posts as  $post)
                        <a href="{{$post->url}}" class="card-news">
                            <img src="{{ RvMedia::getImageUrl($post->image) }}" alt="" srcset="" class="zoomImage" />
                            <div class="date">{{date("d/m/Y",strtotime($post->created_at))}}</div>
                            <h4>{{$post->name}}</h4>
                            <p data-aos="flip-up"  data-aos-delay="200">
                                {{$post->description}}
                            </p>
                            <button class="mt-1 animation-float">{{__("View more")}}</button>
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="imgs-section">
        <img src="{{base}}img/bottom-imgs.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs2.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs3.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs4.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs5.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs2.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs3.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs4.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs5.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs2.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs3.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs4.jpg" alt="" srcset="" class="zoomImage"/>
        <img src="{{base}}img/bottom-imgs5.jpg" alt="" srcset="" class="zoomImage"/>
    </section>

</main>
