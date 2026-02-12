@php Theme::set('pageName', __('News')) @endphp
<link rel="stylesheet" href="{{ base }}assets/css/news-detail.css">
<section class="news-detail-section pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article>
            <h1 class="news-detail-title">{{ $post->name }}</h1>

            <div class="news-meta mb-4">
                <span><i class="bx bx-calendar"></i>{{ $post->created_at->translatedFormat('d/M/Y') }}<</span>
                {{-- <span class="ms-4"><i class="bx bx-user"></i> Admin CTH</span> --}}
            </div>

            <div class="news-content fs-5 lh-lg">
                {!! BaseHelper::clean($post->content) !!}
            </div>
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
            {{-- <div class="mt-5 pt-4 border-top">
                <p class="lead">Hãy liên hệ ngay để được tư vấn thiết kế đồng phục miễn phí!</p>
                <p class="fw-bold mb-2">Chia sẻ bài viết:</p>

                <div class="social-buttons">
                    <button class="btn fb-btn btn-sm me-3" title="Chia sẻ lên Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank')">
                        <img src="../../assets/images/facebook.png" alt="Facebook Icon" class="social-icon">
                    </button>

                    <button class="btn ig-btn btn-sm" title="Sao chép link bài viết" onclick="navigator.clipboard.writeText(window.location.href);">
                        <img src="../../assets/images/instagram.png" alt="Instagram Icon" class="social-icon">
                    </button>
                </div>
            </div> --}}
        </article>
            </div>
            <div class="col-lg-4 ps-lg-5 mt-5 mt-lg-0">
                <div class="mb-5">
                    <h4 class="sidebar-title">Tìm kiếm</h4>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm bài viết...">
                        <button class="btn btn-primary"><i class="bx bx-search"></i></button>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="sidebar-title">Tin tức nổi bật</h4>
                    @php $relatedPosts = get_related_posts($post->id, 2); @endphp
                    @if ($relatedPosts->count())
                    @foreach ($relatedPosts as $relatedItem)
                    <div class="related-news-item">
                        <img src="{{ RvMedia::getImageUrl($relatedItem->image, 'small', false, RvMedia::getDefaultImage()) }}" onerror="this.src='https://via.placeholder.com/150'" class="related-news-img" alt="{ $relatedItem->name }}">
                        <div class="related-news-content">
                            <h5><a href="{{ $relatedItem->url }}">{{ $relatedItem->name }}</a></h5>
                            <span class="related-date"><i class="bx bx-time"></i>{{ $relatedItem->created_at->translatedFormat('d/M/Y') }}</span>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>


