@php Theme::set('pageName', __('Blog')) @endphp
<main class="page-content">
    <section class="news-detail-page-section">
        <div class="container">
            <div class="news-detail-page-section-row">
                <div class="news-detail-page-section-content">
                    <img src="{{ RvMedia::getImageUrl($post->image) }}" alt="" srcset="" />
                    <h1{{ $post->name }}</h1>
                    <div class="date">{{ $post->created_at->translatedFormat('d/m/Y') }}</div>
                    {!! BaseHelper::clean($post->content) !!}
                </div>
                <div class="news-detail-page-section-info">
                    <div class="menu-news">
                        <h5>{{__("News Categories")}}</h5>
                        <ul class="menu-news-list">
                            @foreach(get_all_categories() as $cate)
                            <li><span>{{$cate->name}}</span><span>({{count(get_posts_by_category($cate->id))}})</span></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="list-news">
                        <h5>{{__("Featured News")}}</h5>
                        <div class="list-news-wrap">
                            @foreach(get_featured_posts(10) as $post)
                            <a href="{{ $post->url }}" class="card-news-small">
                                <img src="{{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }}" alt="" srcset="" />
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
