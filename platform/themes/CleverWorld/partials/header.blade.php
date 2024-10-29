<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ theme_option('site_title') }}</title>
    <meta name="description" content="{{ theme_option('seo_description') }}" />
    <meta name="keywords" content="{{ theme_option('seo_description') }}" />
    <meta name="geo.region" content="VN">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="{{ RvMedia::getImageUrl(theme_option('seo_og_image')) }}" />
    <meta property="og:site_name" content="Clever World" />
    @if (!theme_option('alloiw_google_Search'))
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
    @endif
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{ RvMedia::getImageUrl(theme_option('favicon')) }}">
    <link rel="stylesheet" href="{{ base }}asset/css/animate.min.css">
    <link rel="stylesheet" href="{{ base }}asset/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ base }}asset/vendor/bootstrap-icons/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ base }}asset/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ base }}asset/vendor/sweetalert2/sweetalert2.min.css" />
    <link href="{{ base }}asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ base }}asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ base }}asset/vendor/aos/aos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ base }}asset/css/css.css">
    <link rel="stylesheet" href="{{ base }}asset/css/themes.css?v=1703268762">
</head>

<body>
    <div id="page">
        <header id="header" class="fixed-menu">
            <span id="icon-menu"><i class="mobile-nav-toggle d-xl-none bi bi-list"></i></span>
            <div class="container">
                <div class="row d-flex align-items-center ustify-content-between">
                    <div class="col-3">
                        <div id="logo"><a href="{{ route('public.index') }}"><img
                                    src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"></a></div>
                    </div>
                    <div class="col-md-6">
                        <nav id="navmenu" class="navmenu d-flex justify-content-end">
                            @include(Theme::getThemeNamespace('partials.menus.header-menu'))

                        </nav><!-- End Nav Menu -->
                    </div>
                    <div class="col-md-3 text-center">
                        <div id="right-box" class="d-flex align-items-center justify-content-center">
                            <a href="{{url((Language::getCurrentLocale()!="vi"?Language::getCurrentLocale()."/":"")."cleverbox")}}"><img src="{{base}}asset/images/search.svg" class="mx-2"></a>
                            <div id="lang_choosen" class="dropdown ">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="    text-transform: uppercase;">
                                    <img src="{{base}}asset/images/language.svg" class="mx-2"> {{Language::getCurrentLocale()}}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @php
                                          $supportedLocales = Language::getSupportedLocales();
                                          if (!isset($options) || empty($options)) {
                                                $options = [
                                                    'before' => '',
                                                    'lang_flag' => true,
                                                    'lang_name' => true,
                                                    'class' => '',
                                                    'after' => '',
                                                ];
                                            }
                                            $languageDisplay = setting('language_display', 'all');
                                    @endphp
                                    @foreach ($supportedLocales as $localeCode => $properties)

                                    <li>
                                        <a class="dropdown-item" href="{{ Language::getSwitcherUrl($localeCode, $properties['lang_code']) }}" style="text-transform: uppercase">
                                            @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                                            {{-- {!! language_flag($properties['lang_flag'], $properties['lang_name']) !!} --}}
                                            {{ $properties['lang_locale'] }}
                                            @endif
                                            {{-- @if (Arr::get($options, 'lang_name', true) && ($languageDisplay == 'all' || $languageDisplay == 'name'))<span>{{ $properties['lang_name'] }}</span>@endif --}}
                                        </a>
                                    </li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

