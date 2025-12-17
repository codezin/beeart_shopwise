<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="Anil z" name="author" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"content="{{theme_option('seo_description')}}" />
    <meta name="keywords" content="{{theme_option('seo_description')}}" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="geo.region" content="VN">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{ RvMedia::getImageUrl(theme_option('seo_og_image')) }}" />
    <meta property="og:site_name" content="{{theme_option('site_title')}}" />
    <base href="{{base}}" />
    <!-- SITE TITLE -->
    <title>{{theme_option('site_title')}}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ RvMedia::getImageUrl(theme_option('favicon')) }}" />
    @if (!theme_option('alloiw_google_Search'))
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ base }}assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ base }}assets/css/style.css">
    <link rel="stylesheet" href="{{ base }}assets/css/custom.css?v=1">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    {!! Theme::partial('meta') !!}
</head>

<body>
  <!-- Top Header -->
    <div class="top-header bg-white border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="dropdown me-4">
                        <button class="btn btn-sm p-0 text-muted d-flex align-items-center" type="button"
                            aria-expanded="false">

                            <img src="assets/images/vietnam-flag.png" id="currentFlag"
                                style="width: 20px; height: 20px; object-fit: cover; border-radius: 3px;">
                            <span id="currentLang" class="ms-1">VN</span>
                        </button>

                        <!-- <ul class="dropdown-menu" aria-labelledby="languageDropdown" style="min-width: 120px;">
                            <li>
                                <a class="dropdown-item d-flex align-items-center choose-lang" data-lang="VN"
                                    data-flag="asset/images/vietnam-flag.png" href="#">
                                    <img src="asset/images/vietnam-flag.png"
                                        style="width: 22px; height: 22px; object-fit: cover; border-radius: 3px;">
                                    <span class="ms-2">VN</span>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center choose-lang" data-lang="EN"
                                    data-flag="asset/images/us-flag.png" href="#">
                                    <img src="asset/images/us-flag.png"
                                        style="width: 22px; height: 22px; object-fit: cover; border-radius: 3px;">
                                    <span class="ms-2">EN</span>
                                </a>
                            </li>
                        </ul> -->
                    </div>
                    <span class="text-muted me-3"></span>
                    <!-- <a href="tel:+0783157988" class="text-muted me-4">
                        <i class="bx bx-phone-call me-1"></i> 0783 157 988
                    </a> -->
                    <span class="text-muted me-4">
                        <i class="bx bx-phone-call me-1"></i> {{theme_option('hotline')}}
                    </span>
                </div>
                <!-- <a href="#" class="text-muted">
                    <i class="bx bx-git-compare me-1"></i> So sánh
                </a> -->
                <!--<span class="text-muted">-->
                <!--    <i class="bx bx-git-compare me-1"></i> So sánh-->
                <!--</span>-->
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-bar bg-white py-2 bottom_header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                <a href="{{ route('public.index') }}">
                    <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="Logo" height="60" class="me-32">
                </a>
                <form action="{{ route('public.products') }}" data-ajax-url="{{ route('public.ajax.search-products') }}" method="GET">

                <div class="d-flex align-items-center bg-white border rounded px-2"
                    style="height: 45px; position: relative;">
                        <div class="search-dropdown-wrap h-100 d-flex align-items-center position-relative">
                            <input type="hidden" id="categorySelectValue" value="">

                            <div class="search-trigger d-flex align-items-center cursor-pointer pe-3 border-end"
                                style="cursor: pointer; min-width: 130px; justify-content: space-between; height: 100%;">
                                <span id="categoryDisplayText" class="fw-bold text-dark" style="font-size: 14px;">Tất
                                    cả</span>
                                <i class='bx bx-chevron-down ms-2 text-muted'></i>
                            </div>
                            {!! Menu::renderMenuLocation('categories-menu', [
                                'view' => 'menus.sub-menu',
                                'options' => ['id'=>'searchCategoryUl', 'class' => 'search-dropdown-list'],
                            ]) !!}

                        </div>

                        <div class="search-container flex-grow-1 ms-2 d-flex align-items-center">
                            <input type="text" class="form-control border-0 shadow-none search-input"  name="q" id="searchInput"
                                placeholder="Tìm kiếm sản phẩm..." aria-label="Search" style="font-size: 14px;">
                            <button class="btn border-0" type="button" id="btnSearch">
                                <i class='bx bx-search fs-5 text-primary'></i>
                            </button>
                        </div>

                </div>
            </form>
                <a href="tel_3A+0783157988" class="btn btn-outline-primary px-4">
                    <i class="bx bx-phone-call me-1"></i> {{theme_option("hotline")}}
                </a>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto align-items-center">
                    <li class="nav-item dropdown-custom me-4">
                        <a href="#" class="nav-link text-warning d-flex align-items-center">
                            <i class="bx bx-menu me-2"></i> TẤT CẢ DANH MỤC
                        </a>
                         {!! Menu::renderMenuLocation('categories-menu', ['view' => 'menus.sub-menu', 'options' => ['class' => 'dropdown-menu-custom']]) !!}

                    </li>

                    {!! Menu::renderMenuLocation('main-menu', ['view' => 'menus.main', 'options' => ['class' => '']]) !!}

                </ul>

                <!-- Icon bên phải -->
               <ul class="navbar-nav ms-3">
                    <li class="nav-item" style="margin-right: 90px;">
                        {{-- <a class="nav-link" href="cart.html" style="display: flex; align-items: center; justify-content: center;"> --}}

                            <div
                                style="position: relative; width: 24px !important; height: 24px !important; line-height: 24px;">



                                  @if (is_plugin_active('ecommerce'))
                                        <ul class="navbar-nav attr-nav align-items-center">
                                            <li><a href="@if (!auth('customer')->check()) {{ route('customer.overview') }} @else {{ route('customer.login') }} @endif" class="nav-link"><i class="linearicons-user"></i></a></li>
                                            @if (EcommerceHelper::isWishlistEnabled())
                                                {{-- <li><a href="{{ route('public.wishlist') }}" class="nav-link btn-wishlist"><i class="linearicons-heart"></i><span class="wishlist_count">{{ !auth('customer')->check() ? Cart::instance('wishlist')->count() : auth('customer')->user()->wishlist()->count() }}</span></a></li> --}}
                                            @endif

                                            @if (EcommerceHelper::isCartEnabled())
                                                <li class="dropdown cart_dropdown">
                                                    <a class="nav-link cart_trigger btn-shopping-cart" href="javascript:;" data-toggle="dropdown">
                                                        <i class="bx bx-cart" style="font-size: 24px; position: absolute; top: 0; left: 0;"></i>
                                                        <span class="cart_count">{{ Cart::instance('cart')->count() }}</span>
                                                    </a>
                                                    <div class="cart_box dropdown-menu dropdown-menu-right">
                                                        {!! Theme::partial('cart') !!}
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif

                                {{-- <span id="cartCount" class="badge rounded-pill bg-danger"
                                    style="position: absolute; top: -6px; right: -8px; font-size: 9px; padding: 2px 4px; border: 2px solid #fff; display: none;">
                                    0
                                    <span class="visually-hidden">sản phẩm</span>
                                </span> --}}
                            </div>

                        {{-- </a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
