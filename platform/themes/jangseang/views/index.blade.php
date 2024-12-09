@php
Theme::layout('homepage')
@endphp
<main class="page-content">
    <section class="hero-section">
        @php
        $block = get_blocks_by_slug("mockup");
        @endphp
        <div class="hero-section-bg">
            <video autoplay loop muted style="border: none" >
                <source src="storage/{{ $block->file}}" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hero-section-main">
            <img src="{{ RvMedia::getImageUrl($block->image) }}" alt="" srcset="" />
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

    @php
        $items = get_featured_products([]);
    @endphp
    <section class="product-section">

        <h3>{{__("Product category")}}</h3>
        <div class="container">
            <div class="product-section-list">
                @if(!empty($items))
                @foreach($items as $product)
                <div>

                    <div class="product-section-list-card">
                        <img src="{{ RvMedia::getImageUrl($product->image) }}" alt="" srcset="" />
                        <h4>{{$product->name}}</h4>
                        <a href="{{$product->url}}">{{__("See more")}}</a>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
            <a href="{{url('products')}}">
            <button>{{__("All products")}}</button>
            </a>
        </div>
    </section>

    <section class="factory-section">
        @php
        $block = get_blocks_by_slug("factory-section");
        @endphp
        <video autoplay loop muted style="border: none">
            <source src="storage/{{ $block->file}}" type="video/mp4" />
            Your browser does not support the video tag.
        </video>
    </section>

    <section class="brands-section">
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
    </section>

    <section class="aboutus-section">
        @php
            $about = get_page_by_id(4);
        @endphp
        <div class="container">
            <div class="aboutus-section-row">
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
            </div>
            <div class="aboutus-section-row">
                @php
                    $agency = get_page_by_id(10);
                @endphp
                <img class="img-aboutus" src="{{ RvMedia::getImageUrl($agency->image) }}" alt="" srcset="" />
                <div class="aboutus-section-col">
                    <h3>{{$agency->name}}</h3>
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
                            <div class="aboutus-section-content-list-wrap">
                                <strong>{{__("Distribution")}}:</strong>
                                <p>
                                    {{get_field($agency,"phan_phoi")}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="{{$agency->url}}"><button>{{__("List of agents")}}</button></a>
                </div>
            </div>
        </div>
        <img class="img-bottom-aboutus" src="{{base}}img/bottom-aboutus.png" alt="" srcset="" />
    </section>

    <section class="news-section">
        @php
            $posts = get_featured_posts(3);
        @endphp
        <h3>{{__("News")}}</h3>
        <div class="container">
            <div class="news-section-list">
                @foreach ($posts as  $post)
                <a href="{{$post->url}}" class="card-news">
                    <img src="{{ RvMedia::getImageUrl($post->image) }}" alt="" srcset="" />
                    <div class="date">{{date("d/m/Y",strtotime($post->created_at))}}</div>
                    <h4>{{$post->name}}</h4>
                    <p>
                        {{$post->description}}
                    </p>
                </a>
                @endforeach

            </div>
        </div>
    </section>

    <section class="imgs-section">
        <img src="{{base}}img/bottom-imgs.jpg" alt="" srcset="" />
        <img src="{{base}}img/bottom-imgs2.jpg" alt="" srcset="" />
        <img src="{{base}}img/bottom-imgs3.jpg" alt="" srcset="" />
        <img src="{{base}}img/bottom-imgs4.jpg" alt="" srcset="" />
        <img src="{{base}}img/bottom-imgs5.jpg" alt="" srcset="" />
    </section>

</main>
