{!! Menu::renderMenuLocation('main-menu', ['view' => 'menus.main', 'options' => ['class' => '']]) !!}

@if (is_plugin_active('ecommerce'))
{{-- <ul >
    <li><a href="@if (!auth('customer')->check()) {{ route('customer.overview') }} @else {{ route('customer.login') }} @endif" class="nav-link"><i class="linearicons-user"></i></a></li>
    @if (EcommerceHelper::isWishlistEnabled())
        <li><a href="{{ route('public.wishlist') }}" class="nav-link btn-wishlist"><i class="linearicons-heart"></i><span class="wishlist_count">{{ !auth('customer')->check() ? Cart::instance('wishlist')->count() : auth('customer')->user()->wishlist()->count() }}</span></a></li>
    @endif

    @if (EcommerceHelper::isCartEnabled())
        <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger btn-shopping-cart" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">{{ Cart::instance('cart')->count() }}</span></a>
            <div class="cart_box dropdown-menu dropdown-menu-right">
                {!! Theme::partial('cart') !!}
            </div>
        </li>
    @endif
    <li><a href="{{theme_option("booking")}}">Booking</a></li>
</ul> --}}
@endif
