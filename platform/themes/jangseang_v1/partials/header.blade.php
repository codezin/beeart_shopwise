<!DOCTYPE html>
<html lang="{{Language::getCurrentLocale()}}">

<head>
    <title>{{theme_option('site_title')}}</title>

    <meta charset="utf-8" />
    <meta name="author" content="github.com/zakandaiev" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta property="og:image" content="{{ RvMedia::getImageUrl(theme_option('seo_og_image')) }}"/>
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:url" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:keywords" content="" />
    <meta property="og:image" content="" />
    @php $version = "?v=".time(); @endphp
    @if(!theme_option("alloiw_google_Search") && false)
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    @endif
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:url" content="" />
    <meta property="twitter:title" content="" />
    <meta property="twitter:description" content="" />
    <meta property="twitter:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <link rel="canonical" href="" />

    <link rel="image_src" href="{{ RvMedia::getImageUrl(theme_option('seo_og_image')) }}" />

    <link rel="icon" type="image/x-icon" sizes="any" href="{{base}}favicon.ico" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{base}}slick/slick.css{{@$version}}" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{base}}slick/slick-theme.css{{@$version}}" />
    <link href="{{base}}css/select2.min.css{{@$version}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.11.1/css/flag-icons.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/toosick/dflip@1.0.1/css/dflip.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/toosick/dflip@1.0.1/css/themify-icons.css" />
    <link rel="stylesheet" href="{{base}}css/main.css{{@$version}}" />
</head>


<body>
    <header id="header" class="header">
        <div class="header-top">
            <div class="container">
                <div class="logo">
                    <a href="/"><img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="" srcset="" /></a>
                </div>
                <div class="nav-wrapper">
                    @include(Theme::getThemeNamespace('partials.menus.header-menu'))
                </div>
                <div class="nav-btns">
                    <a href="{{url("products")}}?keyword=">
                        {{-- <img src="{{base}}img/search.svg" alt="" srcset="" class="search-icon" /> --}}
                        <i class="fa fa-search search-icon" ></i>
                    </a>
                    <select name="country"></select>
                </div>
            </div>
        </div>
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu" />
        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
        </label>
        <div id="sidebarMenu">
            {!! Menu::renderMenuLocation('main-menu', ['view' => 'menus.main', 'options' => ['class' => 'sidebarMenuInner']]) !!}
        </div>
    </header>


