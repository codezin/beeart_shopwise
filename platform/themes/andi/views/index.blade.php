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

<!-- END MAIN CONTENT -->
<main class="main_content">
    <!-- START SECTION CATEGORY LIST -->
    <div class="section small_pt pb_70 section-category-list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2 class="heading_h2">{{__("Our category")}}</h2>
                    </div>
                </div>
            </div>
            <div class="category-list">
                @php
                    $categories = get_product_categories(['is_featured'=>true]);
                @endphp
                @foreach($categories as $category)
                <div class="category-list-item">
                    <a href="{{$category->url}}">
                        <div class="item-img">
                            <img src="{{ RvMedia::getImageUrl($category->image) }}" />
                        </div>
                        <p class="item-title">{{$category->name}}</p>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- END SECTION CATEGORY LIST -->

    <!-- START SECTION POPULAR COLLECTION -->
    <div class="section small_pt pb_80 section-popular-collection">
        @php
            $collections = get_product_collections([]);
        @endphp
        <div class="container">
            <h2 class="heading_h2">{{__("Explore Popular Collections")}}</h2>
            <div class="carousel-template carousel-1">
                @if(!empty($collections))
                @foreach($collections as $collection)
                <div class="item">
                    <a href="{{$collection->url}}">
                        <div class="img">
                            <img src="{{ RvMedia::getImageUrl($collection->image) }}" />
                        </div>
                        <div class="desc">
                            <h5 class="subheading_h5 fw-medium text-center">{{$collection->name}}</h5>
                        </div>
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- END SECTION POPULAR COLLECTION -->

    <!-- START SECTION BEST SELLER-->
    <div class="section small_pt pb_80 section-best-seller">
        @php
            $block = get_blocks_by_slug("best-seller");
            // $products = get_products_on_sale([]);
            $products = get_featured_products([]);
        @endphp
        <div class="container">
            <h2 class="heading_h2">{{__("Our Best seller")}}</h2>
            <div class="carousel-template carousel-2">
                @foreach($products as $product)
                <div class="item">
                    <a href="{{ $product->url }}">
                        <div class="img">
                            <img src="{{ RvMedia::getImageUrl($product->image) }}" />
                        </div>
                        <div class="desc">
                            <h5 class="subheading_h5 fw-normal text-capitalize">
                                {!! $product->name !!}
                            </h5>
                            <p class="subheading_h4">{{ format_price($product->front_sale_price_with_taxes) }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- END SECTION BEST SELLER-->

    <!-- START SECTION WHY LOVE US -->
    <div class="section section-love-us pb_80 pt_80 f6-bg">
        @php
        $block = get_blocks_by_slug("why-you-love-us");
        $items = get_field($block,"block_why_you_love_us")
        @endphp
        <div class="container">
            <h2 class="heading_h2">{{ $block->name}}</h2>
            <div class="row">
                @foreach(  $items as $item)
                <div class="col-lg-3">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <img src="{{ RvMedia::getImageUrl(get_sub_field($item,"image")) }}" />
                        </div>
                        <div class="icon_box_content">
                            <h4 class="subheading_h4"> {{get_sub_field($item,"name")}}</h4>
                            <p>
                                {{get_sub_field($item,"description")}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- END SECTION WHY LOVE US -->

    <!-- START SECTION BLOG LATEST -->
    <div class="section pb_80 pt_80 section-blog-latest">
        @php
            $posts = get_featured_posts(3);
        @endphp
        <div class="container">
            <h2 class="heading_h2">{{__("Blog")}}</h2>
            <div class="row justify-content-center">
                @foreach ($posts as  $post)
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post blog_style2">

                        <div class="blog_img">
                            <a href="{{ $post->url }}">
                                <img src="{{ RvMedia::getImageUrl($post->image) }}" alt="furniture_blog_img1" />
                            </a>
                        </div>
                        <div class="blog_content">
                            <div class="blog_text">
                                <h5 class="blog_title subheading_h5">
                                    {{$post->name}}
                                </h5>
                                <p>
                                    {{$post->description}}
                                </p>
                                <a class="btn-readmore" href="{{ RvMedia::getImageUrl($post->image) }}">{{__("Read more")}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- END SECTION BLOG LATEST -->
</main>
<!-- END MAIN CONTENT -->
