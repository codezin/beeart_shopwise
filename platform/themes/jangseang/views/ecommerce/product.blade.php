@php
    Theme::asset()->remove('app-js');
    Theme::set('pageName', $product->name);
    Theme::asset()->usePath()->add('lightGallery-css', 'plugins/lightGallery/css/lightgallery.min.css');
    Theme::asset()->container('footer')->usePath()
        ->add('lightGallery-js', 'plugins/lightGallery/js/lightgallery.min.js', ['jquery']);
@endphp
<main class="page-content">
    <section class="product-detail-section">
        <section class="title-header">
            <div class="container">
                <h2>{{__("Product")}}</h2>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
                    <li><a href="">{{__("Product")}}</a></li>
                </ul>
            </div>
        </section>
        <div class="container">
            <div class="product-detail-section-wrap">
                <div class="product-detail-section-wrap-content">
                    <img class="img-product" src="{{ RvMedia::getImageUrl($product->image) }}" alt="" srcset="" />
                </div>
                <div class="product-detail-section-wrap-content">
                    <h4>{{ $product->name }}</h4>
                    <div class="product-detail-section-rate">
                        <div class="starts">
                            <img src="{{base}}img/start.svg" alt="" srcset="" />
                            <img src="{{base}}img/start.svg" alt="" srcset="" />
                            <img src="{{base}}img/start.svg" alt="" srcset="" />
                            <img src="{{base}}img/start.svg" alt="" srcset="" />
                            <img src="{{base}}img/start.svg" alt="" srcset="" />
                        </div>
                        <p> {{ $product->reviews_count }} reviews</p>
                    </div>
                    <p>
                        {!! $product->content !!}
                    </p>
                    <a href="{{theme_option("product_social_link")}}">
                    <button>
                        <img src="{{base}}img/zalo.png" alt="" srcset="" />{{__("Contact")}}
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="QA-section">
        <h3>{{__("Frequently asked questions")}}</h3>
        <div class="container">
            <div class="QA-section-wrap">
                @php
                    $faqs = get_list_faqs([]);
                @endphp
                @foreach ($faqs as $faq)
                <div class="QA-section-wrap-content">
                    <strong>{{$faq->question}}</strong>
                    {!! $faq->answer !!}
                </div>
                @endforeach

            </div>
        </div>
    </section>

</main>
