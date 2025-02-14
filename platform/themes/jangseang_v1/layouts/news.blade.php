{!! Theme::partial('header') !!}
@php
$page = get_page_by_id(13);
    $posts = get_all_posts();
@endphp
<main class="page-content">
    <section class="title-header dark">
        <h2>{{$page->name}}</h2>
        <ul class="breadcrumbs">
            <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
            <li><a href="#">{{$page->name}}</a></li>
        </ul>
        <style type="text/css">
    .header,.header .header-top .nav-wrapper ul li:hover ul.sub-menu,.header input[type=checkbox]:checked ~ #sidebarMenu{
        background: #051E1D;
    }
    .header .spinner{
        background: #fff;
    }
    #header.sticky {
        position: fixed !important;
        z-index: 2000;
        background: rgba(55, 55, 55, 1);
    }
    .header .header-top .nav-wrapper ul a,.search-icon,.header .sidebarMenuInner li a{
        color: #FFF;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        color: #FFF;
    }
        </style>
    </section>

    <section class="news-page-section">
        <div class="container">
            <div class="news-page-section-row">
                <div class="news-page-section-list">
                    @foreach ($posts as $post)
                    <a href="{{ $post->url }}" class="card-news">
                        <img src="{{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }}" alt="" srcset="" class="zoomImage" />
                        <div class="date">{{ $post->created_at->translatedFormat('d/m/Y') }}</div>
                        <h4>{{ $post->name }}</h4>
                        <p>
                            {{ Str::limit($post->description, 110) }}
                        </p>
                    </a>
                    @endforeach


                    {{-- <ul class="pagination">
                        <li class="page-item disabled"><span>&laquo;</span></li>
                        <li class="page-item active"><span>1</span></li>
                        <li class="page-item"><span>2</span></li>
                        <li class="page-item"><span>...</span></li>
                        <li class="page-item"><span>6</span></li>
                        <li class="page-item"><span>7</span></li>
                        <li class="page-item"><span>&raquo;</span></li>
                    </ul> --}}
                    {!! $posts->appends(request()->query())->links() !!}
                </div>
                <div class="news-page-section-info">
                    <div class="menu-news">
                        <h5>{{__("News Categories")}}</h5>
                        <ul class="menu-news-list">
                            @foreach(get_all_categories() as $cate)
                            <li>
                                <a href="{{$cate->url}}">
                                <span>{{$cate->name}}</span><span>({{count(get_posts_by_category($cate->id))}})</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="list-news">
                        <h5>{{__("Featured News")}}</h5>
                        <div class="list-news-wrap">
                            @foreach(get_featured_posts(10) as $post)
                            <a href="{{ $post->url }}" class="card-news-small">
                                <img src="{{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }}" alt="" srcset="" class="zoomImage" />
                                <div class="card-news-small-col">
                                    <div class="date">{{ $post->created_at->translatedFormat('d/m/Y') }}</div>
                                    <h4>{{ $post->name }}</h4>
                                </div>
                            </a>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>


{!! Theme::partial('footer') !!}
