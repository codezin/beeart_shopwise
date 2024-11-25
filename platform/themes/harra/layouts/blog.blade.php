{!! Theme::partial('header') !!}
@php
$posts = get_all_posts();
@endphp
@php
   $page = Theme::get('page');
    $posts = get_all_posts();
@endphp

<section id="page-title" class="page-title">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$page->name}}</li>
            </ol>
        </nav>
        <div class="page-header">
            <h2>{{$page->name}}</h2>
            {!! $page->description !!}
        </div>
    </div>
</section>
@if(!empty( $posts))
  <main id="main">
      <section id="news" class="news">
          <div class="container">
              <div id="news-list" class="news-list row">
                    @foreach ( $posts as $post)
                  <div class="col-xl-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="100">
                      <article class="inner">
                          <div class="imgbox">
                              <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image) }}" alt="Lorem ipsum dolor sit amet, consectetuer ipsum dolor sit amet." ></a>
                          </div>
                          <div class="date">{{date("m/d/Y",strtotime($post->created_at))}}</div>
                          <h2 class="title">
                              <a href="{{$post->url}}">{{$post->name}}</a>
                          </h2>
                          <p class="read-more"><a href="{{$post->url}}">{{__("Read more")}}</a></p>
                      </article>
                  </div>
                  @endforeach

              </div>
              <nav class="mt-5" aria-label="Page navigation example">
                    {!! $posts->appends(request()->query())->onEachSide(1)->links() !!}

              </nav>
          </div>
        </section>

  </main><!-- End #main -->
@endif
{!! Theme::partial('footer') !!}
