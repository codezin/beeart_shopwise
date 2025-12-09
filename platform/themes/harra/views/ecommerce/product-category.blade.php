@php Theme::set('pageName', $category->name) @endphp
<section id="page-title" class="page-title">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
        <div class="page-header">
            <h2>{{$category->name}}</h2>
            {!! $category->descripiton !!}
        </div>
    </div>

</section>

<main id="main">

    <section id="product-list" class="product-list">
        <div class="container">

            <div class="d-flex align-items-center justify-content-between">
                <span>Showing 1–18 of 56 results</span>
                <div>
                    <select class="form-select" aria-label="Sort by">
                        <option selected>Sort by</option>
                        <option value="1">Price up</option>
                        <option value="2">Price down</option>
                        <option value="3">Popular</option>
                    </select>
                </div>

            </div>
            <div class="row mt-5" data-aos="fade-up" data-aos-delay="200">
                @if ($products->count() > 0)
                @foreach($products as $product)
                <div class="col-lg-3 col-md-6 product-item">
                    <div class="inner">
                        <div class="img">
                            @if(get_ecommerce_setting('product_image_enable') && $product->image=="")
                            <a href="{{ $product->url }}"> <img src="{{ RvMedia::getImageUrl(get_ecommerce_setting('product_image')) }}" /></a>
                            @else
                            <a href="{{ $product->url }}"> <img src="{{ RvMedia::getImageUrl($product->image) }}" /></a>
                            @endif
                        </div>
                        <div class="info">
                            <h4 class="text-truncate"><a href="{{ $product->url }}">{{$product->name}}</a></h4>
                            <div><a class="btnaddcart btn-fill-out  add-to-cart-button" href="#" data-id="{{ $product->id }}" data-url="{{ route('public.cart.add-to-cart') }}">{{__("Take me home")}}</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <nav class="mt-2" aria-label="Page navigation example">
                {!! $products->appends(request()->query())->links() !!}
            </nav>
        </div>
    </section>

</main><!-- End #main -->

