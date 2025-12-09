@php Theme::set('pageName', __('Products')) @endphp
<main id="main">
    <section id="title-page" class="title-page">
        <div class="container">
            <div id="breadcrumbs">
                <span>Home</span>
                <span><i class="fa-light fa-angle-right"></i></span>
                <span>Shop</span>
            </div>
            <h2>Shop</h2>
        </div>
    </section>

    <section id="products" class="products mt-5">
        <div class="container">

            <form class="row g-3">
                <div class="col-auto">
                    <select class="form-select" aria-label="Filter by">
                        <option selected>Filter by</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select class="form-select" aria-label="Sort by">
                        <option selected>Sort by</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </form>


            <div id="products-list" class="products-list row gy-4 mt-4">
                @if ($products->count() > 0)
                    @foreach($products as $product)
                    <div class="col-xl-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="inner">
                            <article>
                                <div class="item-img">
                                    <img src="{{ RvMedia::getImageUrl($product->image) }}" alt="" class="img-fluid">
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
                                </p>
                            </article>
                        </div>
                    </div><!-- End item -->
                    @endforeach

                    <div class="mt-3 justify-content-center pagination_style1">
                        {!! $products->appends(request()->query())->onEachSide(1)->links() !!}
                    </div>
                @else
                    <br>
                    <div class="col-12 text-center">{{ __('No products!') }}</div>
                @endif
                


            </div>

            <nav aria-label="Page navigation example" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </section><!-- End Best Seller Section -->

    <section id="recent-products" class="recent-products mt-5">
        <div class="container">
            <header class="section-header text-center" data-aos="fade-top">
                <h2>Recently Viewed Products</h2>
            </header>

            <div id="recent-products-list" class="products-list row gy-4 mt-4">

                <div class="col-xl-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="inner">
                        <article>
                            <div class="item-img">
                                <a href="detail.html"><img src="asset/images/best-seller1.png" alt="" class="img-fluid"></a>
                            </div>
                            <h2 class="title">
                                <a href="detail.html">Premade Fans Starter Pack — 7x Mixed Trays</a>
                            </h2>
                            <div class="stars mt-3">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> <span>73 reviews</span>
                            </div>
                            <p class="mt-3"><span class="sale-price">$280.12</span><span class="price">$250.10</span></p>
                        </article>
                    </div>
                </div><!-- End item -->

                <div class="col-xl-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="inner">
                        <article>
                            <div class="item-img">
                                <a href="detail.html"><img src="asset/images/best-seller1.png" alt="" class="img-fluid"></a>
                            </div>
                            <h2 class="title">
                                <a href="detail.html">Premade Fans Starter Pack — 7x Mixed Trays</a>
                            </h2>
                            <div class="stars mt-3">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> <span>73 reviews</span>
                            </div>
                            <p class="mt-3"><span class="sale-price">$280.12</span><span class="price">$250.10</span></p>
                        </article>
                    </div>
                </div><!-- End item -->

                <div class="col-xl-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="inner">
                        <article>
                            <div class="item-img">
                                <a href="detail.html"><img src="asset/images/best-seller1.png" alt="" class="img-fluid"></a>
                            </div>
                            <h2 class="title">
                                <a href="detail.html">Premade Fans Starter Pack — 7x Mixed Trays</a>
                            </h2>
                            <div class="stars mt-3">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> <span>73 reviews</span>
                            </div>
                            <p class="mt-3"><span class="sale-price">$280.12</span><span class="price">$250.10</span></p>
                        </article>
                    </div>
                </div><!-- End item -->

                <div class="col-xl-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="inner">
                        <article>
                            <div class="item-img">
                                <a href="detail.html"><img src="asset/images/best-seller1.png" alt="" class="img-fluid"></a>
                            </div>
                            <h2 class="title">
                                <a href="detail.html">Premade Fans Starter Pack — 7x Mixed Trays</a>
                            </h2>
                            <div class="stars mt-3">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> <span>73 reviews</span>
                            </div>
                            <p class="mt-3"><span class="sale-price">$280.12</span><span class="price">$250.10</span></p>
                        </article>
                    </div>
                </div><!-- End item -->


            </div><!-- End recent posts list -->
        </div>
    </section><!-- End Best Seller Section -->

</main>

<!-- END SECTION SHOP -->
