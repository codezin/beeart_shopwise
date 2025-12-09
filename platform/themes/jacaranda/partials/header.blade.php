<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOMEPAGE - JACARANDA</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="geo.region" content="VN">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content="asset/images/thumbs.jpg"/>
    <meta property="og:site_name" content="JACARANDA" />

    @if(!theme_option("alloiw_google_Search"))
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    @endif
    <link rel="canonical" href="{{base}}" />
    <link rel="shortcut icon" href="{{base}}asset/images/favicon.jpg">
    <link rel="stylesheet" href="{{base}}asset/css/animate.min.css">
    <link rel="stylesheet" href="{{base}}asset/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{base}}asset/vendor/bootstrap-icons/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{base}}asset/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{base}}asset/vendor/sweetalert2/sweetalert2.min.css"/>
    <link href="{{base}}asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{base}}asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{base}}asset/vendor/aos/aos.css">
    <link rel="preconnect" href="{{base}}https://fonts.googleapis.com">
    <link rel="preconnect" href="{{base}}https://fonts.gstatic.com" crossorigin>
    <link href="{{base}}https://fonts.googleapis.com/css2?family=Chonburi&display=swap" rel="stylesheet">
    <link href="{{base}}https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{base}}asset/css/css.css">
    <link rel="stylesheet" href="{{base}}asset/css/themes.css?v=1703268762">
    <link rel="stylesheet" href="{{base}}asset/css/style.css?v=1703268762">
    <script type="text/javascript" src="{{base}}asset/js/jquery-3.6.1.min.js"></script>
</head>
<body>
<div id="page">
    <header id="header" class="fixed-menu">
        <span id="icon-menu"><i class="mobile-nav-toggle d-xl-none bi bi-list"></i></span>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-3">
                    <div id="logo"><a href="{{ route('public.index') }}"><img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"></a></div>
                </div>
                <div class="col-md-7">
                    <nav id="navmenu" class="navmenu d-flex justify-content-end">
                        @include(Theme::getThemeNamespace('partials.menus.header-menu'))
                        {{-- <ul>
                            <li><a href="{{ route('public.index') }}" class="active">Home</a></li>
                            <li><a href="{{base}}#">Shop</a></li>
                            <li class="dropdown has-dropdown"><a href="{{base}}products.html"><span>Products</span> <i class="bi bi-chevron-down"></i></a>
                                <ul class="dd-box-shadow">
                                    <li><a href="{{base}}products.html">Product 1</a></li>
                                    <li><a href="{{base}}products.html">Product 2</a></li>
                                    <li><a href="{{base}}products.html">Product 3</a></li>
                                </ul>
                            </li>
                            <li><a href="{{base}}#">Booking</a></li>
                            Menu đa cấp
                             <li class="dropdown has-dropdown"><a href="{{base}}#"><span>Dropdown</span> <i class="bi bi-chevron-down"></i></a>
                                <ul class="dd-box-shadow">
                                    <li><a href="{{base}}#">Dropdown 1</a></li>
                                    <li class="dropdown has-dropdown"><a href="{{base}}#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down"></i></a>
                                        <ul class="dd-box-shadow">
                                            <li><a href="{{base}}#">Deep Dropdown 1</a></li>
                                            <li><a href="{{base}}#">Deep Dropdown 2</a></li>
                                            <li><a href="{{base}}#">Deep Dropdown 3</a></li>
                                            <li><a href="{{base}}#">Deep Dropdown 4</a></li>
                                            <li><a href="{{base}}#">Deep Dropdown 5</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{base}}#">Dropdown 2</a></li>
                                    <li><a href="{{base}}#">Dropdown 3</a></li>
                                    <li><a href="{{base}}#">Dropdown 4</a></li>
                                </ul>
                            </li>

                        </ul> --}}
                    </nav><!-- End Nav Menu -->
                </div>
                <div class="col-md-2 text-center">
                    <div id="right-box">
                        <a href="{{base}}"><img src="{{base}}asset/images/search.png" class="mx-2"></a>
                        <a href="{{base}}"><img src="{{base}}asset/images/shopping-bag.png" class="mx-2"></a>

                        @if (EcommerceHelper::isCompareEnabled())
                        {{-- <li><a href="{{ route('public.compare') }}"><i class="ti-control-shuffle"></i><span>{{ __('Compare') }}</span></a></li> --}}
                        @endif

                        @if (!auth('customer')->check())
                            <a href="{{ route('customer.login') }}"><i class="ti-user"></i><span>{{ __('Login') }}</span></a>
                        @else
                            {{-- <li><a href="{{ route('customer.overview') }}"><i class="ti-user"></i><span>{{ auth('customer')->user()->name }}</span></a></li> --}}
                            <a href="{{ route('customer.logout') }}"><i class="ti-lock"></i><span>{{ __('Logout') }}</span></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
