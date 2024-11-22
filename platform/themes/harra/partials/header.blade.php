<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ theme_option('site_title') }}</title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="Anil z" name="author" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"content="{{ theme_option('seo_description') }}" />
    <meta name="keywords" content="{{ theme_option('seo_description') }}" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="geo.region" content="VN">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{ RvMedia::getImageUrl(theme_option('seo_og_image')) }}" />
    <meta property="og:site_name" content="{{ theme_option('site_title') }}" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- SITE TITLE -->
    @if (!theme_option('alloiw_google_Search'))
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
    @endif
    <link rel="shortcut icon" type="image/x-icon" href="{{ RvMedia::getImageUrl(theme_option('favicon')) }}" />
    <link href="{{ RvMedia::getImageUrl(theme_option('favicon')) }}" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Forum&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ base }}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ base }}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ base }}assets/vendor/font-awesome/css/all.min.css">
    <link href="{{ base }}assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ base }}assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ base }}assets/vendor/leaves/css/jquery.classyleaves.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ base }}assets/css/main.css" rel="stylesheet">
    {!! Theme::partial('meta') !!}
</head>

<body>

    <div id="top-bar">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between text-center w-100 py-2">
                <a href="index.html"><i class="fa-sharp fa-thin fa-arrow-left-long"></i></a>
                $13.50 SHIPPING OR FREE OVER $125 IN CANADA* + USA!
                <i class="fa-sharp fa-thin fa-arrow-right-long"></i>
            </div>
        </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <nav id="navbar" class="navbar">
                @include(Theme::getThemeNamespace('partials.menus.header-menu'))
            </nav><!-- .navbar -->
            <div class="d-flex justify-content-center align-items-center right-header">
                <form id="frmsearch" action="">
                    <div class="input-group">
                        <input type="text" class="form-control txtsearch" placeholder="Search" aria-label="Search"
                            aria-describedby="btnsearch">
                        <button class="input-group-text btnsearch" id="btnsearch"><i
                                class="fa-light fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <a href="" class="mx-2 mx-lg-5"><img src="{{base}}assets/img/user-account.svg" alt="" /></a>
                <a href="cart.html"><img src="{{base}}assets/img/shopping-bag.svg" alt="" /></a>
            </div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header><!-- End Header -->
