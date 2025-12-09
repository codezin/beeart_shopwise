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
    <!-- SITE TITLE -->
    <title>{{theme_option('site_title')}}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ RvMedia::getImageUrl(theme_option('favicon')) }}" />
    @if (!theme_option('alloiw_google_Search'))
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
    @endif
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ base }}assets/css/animate.css" />
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ base }}assets/bootstrap/css/bootstrap.min.css" />
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ base }}assets/css/all.min.css" />
    <link rel="stylesheet" href="{{ base }}assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{ base }}assets/css/themify-icons.css" />
    <link rel="stylesheet" href="{{ base }}assets/css/linearicons.css" />
    <link rel="stylesheet" href="{{ base }}assets/css/flaticon.css" />
    <link rel="stylesheet" href="{{ base }}assets/css/simple-line-icons.css" />
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{ base }}assets/owlcarousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ base }}assets/owlcarousel/css/owl.theme.css" />
    <link rel="stylesheet" href="{{ base }}assets/owlcarousel/css/owl.theme.default.min.css" />
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ base }}assets/css/magnific-popup.css" />
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ base }}assets/css/slick.css" />
    <link rel="stylesheet" href="{{ base }}assets/css/slick-theme.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ base }}assets/css/style.css" />
    <link rel="stylesheet" href="{{ base }}assets/css/responsive.css" />
    <link rel="stylesheet" href="{{ base }}assets/css/index.css" />
    <link rel="stylesheet" href="{{asset('public/themes/assets/css/style.css?v=1703268762')}}">
    {!! Theme::partial('meta') !!}
</head>

<body>
    <!-- LOADER -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>


    <!-- START HEADER -->
    <header class="header_wrap fixed-top header_with_topbar">
        <div class="top-header d-none d-md-block">
            <div class="container">

                @if (theme_option('social_links'))
                <div class="social-links">
                    @foreach(json_decode(theme_option('social_links'), true) as $socialLink)
                    @if(strtolower($socialLink[0]['value'])=="facebook")
                    <a class="fb-icon"  href="{{ $socialLink[2]['value'] }}">
                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.6667 5.27301C14.6509 4.22257 14.2225 3.22051 13.4741 2.48329C12.7257 1.74607 11.7172 1.33289 10.6667 1.33301H5.25334C4.2064 1.35395 3.20942 1.78461 2.47649 2.53249C1.74356 3.28038 1.33313 4.28586 1.33334 5.33301V10.7197C1.34737 11.7713 1.77498 12.775 2.52361 13.5137C3.27224 14.2523 4.28165 14.6664 5.33334 14.6663H6.49334V9.99967H5.26001C5.1716 9.99967 5.08682 9.96456 5.02431 9.90204C4.9618 9.83953 4.92668 9.75475 4.92668 9.66634V8.34634C4.92668 8.25794 4.9618 8.17315 5.02431 8.11064C5.08682 8.04813 5.1716 8.01301 5.26001 8.01301H6.49334V6.01301C6.4951 5.39117 6.74291 4.79531 7.18261 4.35561C7.62231 3.9159 8.21818 3.6681 8.84001 3.66634H10.74C10.8284 3.66634 10.9132 3.70146 10.9757 3.76397C11.0382 3.82648 11.0733 3.91127 11.0733 3.99967V5.33301C11.0733 5.42141 11.0382 5.5062 10.9757 5.56871C10.9132 5.63122 10.8284 5.66634 10.74 5.66634H9.62668C9.41804 5.66634 9.21795 5.74922 9.07042 5.89675C8.92289 6.04428 8.84001 6.24437 8.84001 6.45301V7.99967H10.6667C10.7218 7.99884 10.7763 8.01172 10.8253 8.03713C10.8743 8.06255 10.9161 8.09972 10.9472 8.14532C10.9782 8.19091 10.9975 8.24349 11.0032 8.29836C11.009 8.35322 11.001 8.40865 10.98 8.45967L10.4667 9.74634C10.4423 9.80952 10.3993 9.86377 10.3433 9.90188C10.2873 9.93999 10.2211 9.96015 10.1533 9.95967H8.82001V14.6263H10.7267C11.7794 14.6141 12.7849 14.1872 13.525 13.4384C14.2651 12.6896 14.6801 11.6792 14.68 10.6263L14.6667 5.27301Z"
                                fill="black" />
                        </svg>
                    </a>
                    @elseif(strtolower($socialLink[0]['value'])=="instagram")
                    <a class="instagram-icon" href="{{ $socialLink[2]['value'] }}">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.4733 1.33303H5.48C4.93352 1.33214 4.39227 1.43945 3.88746 1.64878C3.38266 1.8581 2.92429 2.1653 2.5388 2.55265C2.1533 2.94 1.84831 3.39984 1.64142 3.90565C1.43452 4.41146 1.32982 4.95322 1.33334 5.4997V10.473C1.32983 11.0208 1.43435 11.5638 1.64092 12.0711C1.84749 12.5784 2.15206 13.04 2.5372 13.4295C2.92234 13.819 3.3805 14.1287 3.88546 14.3409C4.39042 14.5532 4.93226 14.6637 5.48 14.6664H10.4733C11.5849 14.6646 12.6505 14.2222 13.4365 13.4362C14.2225 12.6502 14.6649 11.5846 14.6667 10.473V5.4997C14.6649 4.95077 14.5551 4.40756 14.3434 3.90109C14.1317 3.39462 13.8223 2.9348 13.433 2.54789C13.0436 2.16098 12.5818 1.85455 12.074 1.6461C11.5662 1.43766 11.0223 1.33128 10.4733 1.33303V1.33303ZM10.3867 7.9997C10.3866 8.47814 10.2444 8.94577 9.97803 9.3432C9.71165 9.74063 9.33315 10.0499 8.89062 10.2318C8.44808 10.4136 7.96148 10.4598 7.49263 10.3645C7.02377 10.2692 6.59382 10.0367 6.2574 9.69653C5.92097 9.35634 5.69326 8.92384 5.60317 8.45395C5.51308 7.98407 5.5647 7.49801 5.75145 7.05753C5.93821 6.61704 6.25168 6.242 6.65204 5.98006C7.0524 5.71811 7.52159 5.58108 8 5.58636C8.31518 5.58811 8.62692 5.65192 8.91744 5.77414C9.20795 5.89637 9.47154 6.07462 9.69317 6.29872C9.91479 6.52282 10.0901 6.78838 10.2091 7.08024C10.3281 7.37209 10.3884 7.68452 10.3867 7.9997V7.9997ZM11.9 4.7597C11.7682 4.7597 11.6393 4.7206 11.5296 4.64734C11.42 4.57409 11.3345 4.46997 11.2841 4.34815C11.2336 4.22633 11.2204 4.09229 11.2461 3.96297C11.2719 3.83365 11.3354 3.71486 11.4286 3.62162C11.5218 3.52839 11.6406 3.4649 11.7699 3.43917C11.8993 3.41345 12.0333 3.42665 12.1551 3.47711C12.2769 3.52757 12.3811 3.61302 12.4543 3.72265C12.5276 3.83228 12.5667 3.96117 12.5667 4.09303C12.5632 4.26752 12.4914 4.43368 12.3668 4.55584C12.2421 4.67799 12.0745 4.7464 11.9 4.74636V4.7597Z"
                                fill="black" />
                        </svg>
                    </a>
                    @else
                    <li>
                        <a href="{{ $socialLink[2]['value'] }}"
                            title="{{ $socialLink[0]['value'] }}" style="background-color: {{ $socialLink[3]['value'] }}; border: 1px solid {{ $socialLink[3]['value'] }};" target="_blank">
                            <i class="{{ $socialLink[1]['value'] }}"></i>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </div>
                @endif


                {{-- <div class="socials-links">
                    <a class="fb-icon" href="#">
                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.6667 5.27301C14.6509 4.22257 14.2225 3.22051 13.4741 2.48329C12.7257 1.74607 11.7172 1.33289 10.6667 1.33301H5.25334C4.2064 1.35395 3.20942 1.78461 2.47649 2.53249C1.74356 3.28038 1.33313 4.28586 1.33334 5.33301V10.7197C1.34737 11.7713 1.77498 12.775 2.52361 13.5137C3.27224 14.2523 4.28165 14.6664 5.33334 14.6663H6.49334V9.99967H5.26001C5.1716 9.99967 5.08682 9.96456 5.02431 9.90204C4.9618 9.83953 4.92668 9.75475 4.92668 9.66634V8.34634C4.92668 8.25794 4.9618 8.17315 5.02431 8.11064C5.08682 8.04813 5.1716 8.01301 5.26001 8.01301H6.49334V6.01301C6.4951 5.39117 6.74291 4.79531 7.18261 4.35561C7.62231 3.9159 8.21818 3.6681 8.84001 3.66634H10.74C10.8284 3.66634 10.9132 3.70146 10.9757 3.76397C11.0382 3.82648 11.0733 3.91127 11.0733 3.99967V5.33301C11.0733 5.42141 11.0382 5.5062 10.9757 5.56871C10.9132 5.63122 10.8284 5.66634 10.74 5.66634H9.62668C9.41804 5.66634 9.21795 5.74922 9.07042 5.89675C8.92289 6.04428 8.84001 6.24437 8.84001 6.45301V7.99967H10.6667C10.7218 7.99884 10.7763 8.01172 10.8253 8.03713C10.8743 8.06255 10.9161 8.09972 10.9472 8.14532C10.9782 8.19091 10.9975 8.24349 11.0032 8.29836C11.009 8.35322 11.001 8.40865 10.98 8.45967L10.4667 9.74634C10.4423 9.80952 10.3993 9.86377 10.3433 9.90188C10.2873 9.93999 10.2211 9.96015 10.1533 9.95967H8.82001V14.6263H10.7267C11.7794 14.6141 12.7849 14.1872 13.525 13.4384C14.2651 12.6896 14.6801 11.6792 14.68 10.6263L14.6667 5.27301Z"
                                fill="black" />
                        </svg>
                    </a>
                    <a class="instagram-icon" href="#">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.4733 1.33303H5.48C4.93352 1.33214 4.39227 1.43945 3.88746 1.64878C3.38266 1.8581 2.92429 2.1653 2.5388 2.55265C2.1533 2.94 1.84831 3.39984 1.64142 3.90565C1.43452 4.41146 1.32982 4.95322 1.33334 5.4997V10.473C1.32983 11.0208 1.43435 11.5638 1.64092 12.0711C1.84749 12.5784 2.15206 13.04 2.5372 13.4295C2.92234 13.819 3.3805 14.1287 3.88546 14.3409C4.39042 14.5532 4.93226 14.6637 5.48 14.6664H10.4733C11.5849 14.6646 12.6505 14.2222 13.4365 13.4362C14.2225 12.6502 14.6649 11.5846 14.6667 10.473V5.4997C14.6649 4.95077 14.5551 4.40756 14.3434 3.90109C14.1317 3.39462 13.8223 2.9348 13.433 2.54789C13.0436 2.16098 12.5818 1.85455 12.074 1.6461C11.5662 1.43766 11.0223 1.33128 10.4733 1.33303V1.33303ZM10.3867 7.9997C10.3866 8.47814 10.2444 8.94577 9.97803 9.3432C9.71165 9.74063 9.33315 10.0499 8.89062 10.2318C8.44808 10.4136 7.96148 10.4598 7.49263 10.3645C7.02377 10.2692 6.59382 10.0367 6.2574 9.69653C5.92097 9.35634 5.69326 8.92384 5.60317 8.45395C5.51308 7.98407 5.5647 7.49801 5.75145 7.05753C5.93821 6.61704 6.25168 6.242 6.65204 5.98006C7.0524 5.71811 7.52159 5.58108 8 5.58636C8.31518 5.58811 8.62692 5.65192 8.91744 5.77414C9.20795 5.89637 9.47154 6.07462 9.69317 6.29872C9.91479 6.52282 10.0901 6.78838 10.2091 7.08024C10.3281 7.37209 10.3884 7.68452 10.3867 7.9997V7.9997ZM11.9 4.7597C11.7682 4.7597 11.6393 4.7206 11.5296 4.64734C11.42 4.57409 11.3345 4.46997 11.2841 4.34815C11.2336 4.22633 11.2204 4.09229 11.2461 3.96297C11.2719 3.83365 11.3354 3.71486 11.4286 3.62162C11.5218 3.52839 11.6406 3.4649 11.7699 3.43917C11.8993 3.41345 12.0333 3.42665 12.1551 3.47711C12.2769 3.52757 12.3811 3.61302 12.4543 3.72265C12.5276 3.83228 12.5667 3.96117 12.5667 4.09303C12.5632 4.26752 12.4914 4.43368 12.3668 4.55584C12.2421 4.67799 12.0745 4.7464 11.9 4.74636V4.7597Z"
                                fill="black" />
                        </svg>
                    </a>
                </div> --}}
                <p>
                    Next day delivery, minimum order $150. Free delivery for first time order
                </p>
                <a class="hotline d-none d-lg-flex" href="tel:+84402423159">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 6.34837C0 6.11437 0 5.88037 0 5.64637C0.006 5.60437 0.018 5.56237 0.024 5.52037C0.054 5.30437 0.072 5.08237 0.114 4.87237C0.36 3.58837 0.954 2.49037 1.92 1.60837C3.402 0.252375 5.154 -0.245625 7.128 0.102375C8.43 0.336375 9.54 0.954375 10.422 1.93837C11.67 3.32437 12.186 4.95637 11.946 6.80437C11.76 8.23237 11.118 9.44437 10.056 10.4224C9.198 11.2144 8.184 11.7064 7.032 11.9044C6.81 11.9404 6.582 11.9644 6.36 11.9944C6.126 11.9944 5.892 11.9944 5.658 11.9944C5.622 11.9884 5.58 11.9764 5.544 11.9764C5.322 11.9464 5.1 11.9284 4.884 11.8864C3.57 11.6344 2.466 11.0104 1.566 10.0264C0.786 9.16837 0.294 8.16637 0.102 7.02037C0.054 6.79837 0.03 6.57037 0 6.34837ZM2.838 4.41637C2.832 4.67437 2.916 4.98637 3.078 5.35837C3.414 6.12637 3.888 6.79237 4.476 7.38037C5.244 8.15437 6.12 8.75437 7.176 9.06637C7.578 9.18637 7.968 9.15037 8.346 8.97037C8.622 8.83837 8.826 8.61037 9.042 8.40037C9.198 8.24437 9.198 8.11837 9.042 7.95637C8.7 7.60837 8.352 7.26637 8.01 6.91837C7.848 6.75637 7.716 6.75637 7.56 6.91837C7.368 7.11037 7.182 7.30237 6.99 7.49437C6.768 7.71637 6.492 7.74037 6.24 7.55437C5.562 7.07437 4.98 6.49837 4.482 5.83237C4.272 5.55037 4.29 5.28637 4.536 5.04037C4.734 4.84237 4.938 4.64437 5.13 4.44037C5.268 4.30237 5.268 4.17037 5.13 4.03237C4.77 3.67237 4.416 3.31237 4.05 2.95837C3.918 2.82637 3.786 2.83237 3.648 2.95837C3.54 3.06637 3.426 3.18037 3.318 3.28837C3.012 3.60037 2.85 3.97837 2.838 4.41637Z"
                            fill="black" />
                    </svg>
                    {{theme_option('hotline')}}
                </a>
            </div>
        </div>
        <!-- Middle Desktop -->
        <div class="middle-header dark_skin d-none d-lg-flex">
            <div class="container">
                <nav class="middle-header-top">
                    {!! Menu::renderMenuLocation('header-top', ['view' => 'menus.footer', 'options' => ['class' => '']]) !!}

                    <a class="logo" href="{{ route('public.index') }}">
                        <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" />
                    </a>
                    <nav>
                        <ul>

                            @if (!auth('customer')->check())
                            <li>
                                <div class="account-links">
                                    <img src="{{base}}assets/images/icons/account-Icon.svg" />
                                    <a href="{{ route('customer.login') }}">Login</a> / <a href="{{ route('customer.register') }}"> Sign up</a>
                                </div>
                            </li>
                            @else
                            <li>
                                <div class="account-links">
                                    <img src="{{base}}assets/images/icons/account-Icon.svg" />
                                    <a href="{{ route('customer.overview') }}">{{__("Account")}}</a> /
                                    <a href="{{ route('customer.logout') }}">{{__("Log out")}}</a>
                                </div>
                            </li>
                            @endif
                            @if (EcommerceHelper::isCartEnabled())
                                <li class="dropdown cart_dropdown">
									<a class="nav-link cart_trigger btn-shopping-cart" href="{{ route('public.cart') }}" data-toggle="dropdown">
                                    <i class="linearicons-cart" style="font-size:23px">></i>
					                <span class="cart_count">{{ Cart::instance('cart')->count() }}</span></a>
                                    <div class="cart_box dropdown-menu dropdown-menu-right">
                                        {!! Theme::partial('cart') !!}
                                    </div>
                                </li>
                            @endif
                            {{-- <li>
                                <a href="/shopping-cart.html">
                                    <svg width="25" height="23" viewBox="0 0 25 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.117676 1C0.117676 0.447715 0.565391 0 1.11768 0H5.11768C5.5943 0 6.00469 0.336385 6.09823 0.803743L6.93811 5H23.1177C23.4157 5 23.6982 5.13293 23.8882 5.36256C24.0781 5.59218 24.1558 5.89458 24.1 6.18733L22.4985 14.5848C22.3614 15.2754 21.9857 15.8958 21.4372 16.3373C20.8915 16.7766 20.2093 17.011 19.509 17H9.80632C9.10605 17.011 8.42388 16.7766 7.87815 16.3373C7.32992 15.8959 6.95431 15.2759 6.817 14.5857L5.14647 6.2392C5.13969 6.21159 5.13406 6.18353 5.12963 6.15508L4.29799 2H1.11768C0.565391 2 0.117676 1.55228 0.117676 1ZM7.33841 7L8.77852 14.1952C8.82424 14.4254 8.94947 14.6322 9.13229 14.7793C9.31511 14.9265 9.54386 15.0047 9.77852 15.0002L9.79768 15H19.5177L19.5368 15.0002C19.7715 15.0047 20.0002 14.9265 20.1831 14.7793C20.365 14.6328 20.4899 14.4273 20.5362 14.1984L21.909 7H7.33841ZM7.11768 21C7.11768 19.8954 8.01311 19 9.11768 19C10.2222 19 11.1177 19.8954 11.1177 21C11.1177 22.1046 10.2222 23 9.11768 23C8.01311 23 7.11768 22.1046 7.11768 21ZM18.1177 21C18.1177 19.8954 19.0131 19 20.1177 19C21.2222 19 22.1177 19.8954 22.1177 21C22.1177 22.1046 21.2222 23 20.1177 23C19.0131 23 18.1177 22.1046 18.1177 21Z"
                                            fill="#363636" />
                                    </svg>
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </nav>
                <div class="middle-header-bottom">
                    <label for="search"><img src="{{base}}assets/images/icons/search.svg" /></label>
                    <input placeholder="Find the perfect meal" id="search" name="search" />
                </div>
            </div>
        </div>
        <!-- Middle Mobile -->
        <div class="middle-header dark_skin d-lg-none">
            <div class="container">
                <div class="nav_block">
                    <a class="navbar-brand" href="{{ route('public.index') }}">
                        <img class="logo_light" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="logo" />
                        <img class="logo_dark" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="logo" />
                    </a>
                    <a class="contact_phone order-md-last" href="tel:+84402423159">
                        <i class="linearicons-phone-wave"></i>
                        <span>{{theme_option("hotline")}}</span>
                    </a>
                    <div class="product_search_form">
                        <form action="{{ route('public.products') }}" data-ajax-url="{{ route('public.ajax.search-products') }}" method="GET">
                            <div class="input-group">
                                <input class="form-control"   name="q"  placeholder="Search Product..." required=""  type="text" />
                                <button type="submit" class="search_btn">
                                    <i class="linearicons-magnifier"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Desktop -->
        <div class="bottom_header light_skin main_menu_uppercase bg_dark d-none d-lg-flex">
            <div class="container">
                <nav>
                    @include(Theme::getThemeNamespace('partials.menus.header-menu'))

                </nav>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

