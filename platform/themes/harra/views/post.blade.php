@php Theme::set('pageName', __('Blog')) @endphp
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="single_post">
                    <h2 class="blog_title">{{ $post->name }}</h2>
                    <ul class="list_none blog_meta">
                        <li><i class="ti-calendar"></i> {{ $post->created_at->translatedFormat('M d, Y') }}</li>
                        <li><i class="ti-pencil-alt"></i>
                            @if (!$post->categories->isEmpty())
                                @foreach($post->categories as $category)
                                    <a href="{{ $category->url }}">{{ $category->name }}</a>@if (!$loop->last),@endif
                                @endforeach
                            @endif
                        </li>
                        <li><i class="ti-eye"></i> {{ number_format($post->views) }} {{ __('Views') }}</li>
                    </ul>
                    <div class="blog_img">
                        <img src="{{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}" loading="lazy" />
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                             <div class="ck-content">{!! BaseHelper::clean($post->content) !!}</div>
                            <div class="blog_post_footer">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-md-8 mb-3 mb-md-0">
                                        <div class="tags">
                                            @if (!$post->tags->isEmpty())
                                                @foreach ($post->tags as $tag)
                                                    <a href="{{ $tag->url }}">{{ $tag->name }}</a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="social_icons text-md-right">
                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($post->url) }}&title={{ rawurldecode($post->description) }}" target="_blank" title="{{ __('Share on Facebook') }}"><i class="ion-social-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/intent/tweet?url={{ urlencode($post->url) }}&text={{ rawurldecode($post->description) }}" target="_blank" title="{{ __('Share on Twitter') }}"><i class="ion-social-twitter"></i></a></li>
                                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($post->url) }}&summary={{ rawurldecode($post->description) }}&source=Linkedin" title="{{ __('Share on Linkedin') }}" target="_blank"><i class="ion-social-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' ? Theme::partial('comments') : null) !!}
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
                <div class="sidebar">
                    {!! dynamic_sidebar('primary_sidebar') !!}
                </div>
            </div>
        </div>
    </div>
</div>


  <!-- ======= Banner Section ======= -->
  <section id="banner" class="banner-news">
    <div class="container">
        <p class="back-page"><a href="blogs.html"><i class="fa-light fa-arrow-left-long"></i> Back to blog page</a></p>
        <header class="section-header">
            <h2 class="text-start">Dandelion Flirty Flowers</h2>
            <p>We value the diverse perspectives and experiences of our users, and we encourage collaboration and community engagement. Our platform provides opportunities for users to contribute their knowledge, share their opinions, and engage in discussions with like-minded individuals.</p>
        </header>
    </div>
</section>

<main id="main">
    <section id="detail" class="pt-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="me-lg-5">
                        {!! BaseHelper::clean($post->content) !!}
                    </div>
                </div>
                <div class="col-md-3 news-list" id="news-detail">
                    <h3>{{ __('Related posts') }}</h3>
                    @php $relatedPosts = get_related_posts($post->id, 2); @endphp
                    @if ($relatedPosts->count())
                    @foreach ($relatedPosts as $relatedItem)
                    <div class="news_item">
                        <div class="imgbox"><a href="{{ $relatedItem->url }}">
                            <img src="{{ RvMedia::getImageUrl($relatedItem->image, null, false, RvMedia::getDefaultImage()) }}" alt=""/></a></div>
                        <div>
                            <div class="date">23/07/2024</div>
                            <h2 class="title"><a href="{{ $relatedItem->url }}">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></h2>
                            <p class="read-more"><a href="{{ $relatedItem->url }}">{{__("Read more")}}</a></p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

        </div>
    </section>


</main><!-- End #main -->
