@php
Theme::set('pageName', __('Blog'));
$page = get_page_by_id(13);

@endphp
  <!-- ======= Banner Section ======= -->
  <section id="banner" class="banner-news">
    <div class="container">
        <p class="back-page"><a href="{{$page->url}}"><i class="fa-light fa-arrow-left-long"></i> Back to blog page</a></p>
        <header class="section-header">
            <h2 class="text-start">{{$post->name}}</h2>
            <p>{!! $post->description !!}</p>
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
                            <div class="date">{{date('d/m/Y',strtotime($relatedItem->created_at))}}</div>
                            <h2 class="title"><a href="{{ $relatedItem->url }}">{{$relatedItem->name}}</a></h2>
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
