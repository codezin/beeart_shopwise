@php Theme::set('pageName', $category->name) @endphp

@php Theme::set('pageName', __('Products')) @endphp
<section class="title-header product-header" style="background-image: url('{{base}}/img/bg-product.png')">
    <h2>{{__("Product")}}</h2>
    <ul class="breadcrumbs" >
        <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
        <li><a href="">{{__("Product")}}</a></li>
        <li><a href="{{$category->url}}">{{$category->name}}</a></li>
    </ul>
    {{-- <style type="text/css">
    .header{
        position: absolute !important;
        /* background: rgba(255, 253, 248, 0.5); */

        background: rgba(5, 30, 29, 0.5);
        backdrop-filter: blur(1px);
    }
    .product-header{
        position: relative;
        top: 0;
        padding-top: 160px;
        background-size: cover;
    }
    </style> --}}
</section>
<main class="page-content">
    <section class="list-products-section">
        <div class="container">
            <div class="d-flex list-products-head" style="height: 80px;    justify-content: space-between;    align-items: center;">
                <h3>
                    <img src="{{base}}img/menu.svg" alt="" srcset="" />
                    {{__("Product Categories")}}
                </h3>
                <div class="seach-section">
                    @if(strpos(request()->fullurl(), "keyword")!==false )
                    <form>
                        <input name="keyword" value="{{request('keyword')}}" class="form-control" placeholder="{{__("Search")}}" />
                    </form>
                    @endif
                </div>
            </div>
            @if (!empty($products) && $products->count() > 0)
            <div class="list-products-section-list"  data-limit="{{theme_option('number_of_products_per_page')}}" data-category="{{$category->id}}" data-total_page="{{$products->appends(request()->query())->onEachSide(1)->lastPage()}}">
                    @if ($products->count() > 0)
                    @foreach($products as $product)
                    <div class="list-products-section-list-card" data-aos="fade-up"  data-aos-duration="1000" >
                        <div class="img-product" data-id="{{$product->id}}">
                            <img  src="{{ RvMedia::getImageUrl($product->image) }}" alt="" srcset=""  class="zoomImage"/>
                        </div>
                        <div class="list-products-section-content">
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width: {{ 5 * 20 }}%"></div>
                                </div>

                            </div>
                            <h4>{!! $product->name !!}</h4>
                            <div class="description">
                                {!! $product->description !!}

                            </div>
                            <div class="content" style="display:none">{!! $product->content !!}</div>


                            {{-- <button>
                        <a href="{{$product->url}}">
                                    <img src="{{base}}img/zalo.png" alt="" srcset="" />{{__("See more")}}

                            </button></a> --}}
                        </div>
                    </div>
                    @endforeach
                @else
                    <br>
                    <div class="col-12 text-center">{{ __('No products!') }}</div>
                @endif

            </div>
            @endif
        </div>
        @if ($products->count() > 0 && false)
        {!! $products->appends(request()->query())->onEachSide(1)->links() !!}
        @endif
        @if ($products->count() > 0)
        <div class="d-flex justify-content-center mt-3">
            <button class="mt-1" id="btn-view-more">{{__("View more")}}</button>
        </div>
        @endif
    </section>
{{--
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
    </section> --}}
</main>
<div class="modal" tabindex="-1" role="dialog" id="product-detail">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="list-products-section-list">
                <div class="list-products-section-list-card">
                    <div class="img-product">
                    <img  src="" alt="" srcset="" />
                    </div>
                    <div class="list-products-section-content">
                        <div class="rating_wrap">
                            <div class="rating">
                                <div class="product_rate" style="width: {{0 * 20 }}%"></div>
                            </div>

                        </div>
                        <h4></h4>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
<!-- END SECTION SHOP -->
