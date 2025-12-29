@php Theme::set('pageName', __('News')) @endphp

<link rel="stylesheet" href="{{ base }}assets/css/about.css">
<section class="about-us pt-4">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 mb-4 g-4" id="homeNewsContainer">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="col news-item">
                        <div class="card h-100 news-card shadow-sm border-0">
                            <div style="overflow: hidden; height: 220px;">
                                <img src="{{ RvMedia::getImageUrl($post->image) }}" class="card-img-top" alt=" {{ $post->name }}" style="height: 100%; width: 100%; object-fit: cover;">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-2">
                                    <a href="/MayMacCTH/tin-tuc/Top 10 xu hướng Xuân Hè 2025" class="news-title-link fw-bold text-decoration-none">
                                        {{ $post->name }}
                                    </a>
                                </h5>
                                <p class="text-muted small mb-3">
                                    <i class="bi bi-calendar3"></i>
                                    {{ date('d/m/Y', strtotime($post->created_at)) }}
                                    | Admin CTH
                                </p>
                                <p class="card-text text-muted flex-grow-1">
                                    {{ $post->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-12 mt-2 mt-md-4">
                        <div class="pagination_style1 justify-content-center">
                            {!! $posts->appends(request()->query())->links() !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
