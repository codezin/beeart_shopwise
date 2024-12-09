@php Theme::set('pageName', __('Products')) @endphp
<main class="page-content">
    <section class="title-header">
        <h2>{{__("Product")}}</h2>
        <ul class="breadcrumbs">
            <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
            <li><a href="">{{__("Product")}}</a></li>
        </ul>

    </section>

    <section class="list-products-section">
        <div class="container">
            <div class="d-flex list-products-head" style="height: 80px;    justify-content: space-between;    align-items: center;">
                <h3>
                    <img src="{{base}}img/menu.svg" alt="" srcset="" />
                    Danh mục sản phẩm
                </h3>
                <div class="seach-section">
                    @if(strpos(request()->fullurl(), "keyword")!==false )
                    <form>
                        <input name="keyword" value="{{request('keyword')}}" class="form-control" placeholder="{{__("Search")}}" />
                    </form>
                    @endif
                </div>
            </div>
            <div class="list-products-section-list">
                    @if ($products->count() > 0)
                    @foreach($products as $product)
                    <div class="list-products-section-list-card">
                        <img class="img-product" src="{{ RvMedia::getImageUrl($product->image) }}" alt="" srcset="" />
                        <div class="list-products-section-content">
                            <h4>{!! $product->name !!}</h4>
                            <a href="{{$product->url}}">
                            <button>

                                    <img src="{{base}}img/zalo.png" alt="" srcset="" />{{__("See more")}}

                            </button></a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <br>
                    <div class="col-12 text-center">{{ __('No products!') }}</div>
                @endif

            </div>
        </div>
        @if ($products->count() > 0)
        {!! $products->appends(request()->query())->onEachSide(1)->links() !!}
        @endif
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

</main>

<!-- END SECTION SHOP -->
