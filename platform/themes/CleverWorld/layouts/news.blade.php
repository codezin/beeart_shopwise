{!! Theme::partial('header') !!}
@php
$page = get_page_by_id(13);
    $posts = get_all_posts();
@endphp
<main id="main">
    <section id="banner" class="banner-news banner-bg d-flex align-items-center" style="background-image: url('{{RvMedia::getImageUrl($page->banner)}}')">
        <div class="container">
            <header class="section-header text-center">
                <h2>{{$page->name}}</h2>
            </header>
        </div>
    </section>   
	<section id="title-page" class="title-page">
        <div class="container">
            <div id="breadcrumbs">
                <span>{{__("Home")}}</span>
                <span><i class="fa-light fa-angle-right"></i></span>
                <span>{{$page->name}}</span>
            </div>
        </div>
    </section>
    <section id="news" class="news">
   <div class="container">
       <div id="news-list" class="news-list row gy-4 mt-4">
            @foreach ($posts as $post)
           <div class="col-xl-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="100">
               <div class="inner">
                   <article>
                       <div class="imgbox">
                           <a href="{{$post->url}}"><img src="{{ RvMedia::getImageUrl($post->image) }}" alt="Lorem ipsum dolor sit amet, consectetuer ipsum dolor sit amet." ></a>
                       </div>
                       <div class="date">{{@$post->categories[0]->name}} |  {{ $post->created_at->translatedFormat('d.m.Y') }}</div>
                       <h2 class="title">
                           <a href="{{$post->url}}">{{ $post->name }}</a>
                       </h2>
                       <p class="mt-3 desc"> {{ $post->description, 110 }}</p>
                   </article>
               </div>
           </div><!-- End item -->
           @endforeach

       </div>

       <nav aria-label="Page navigation example">
        {!! $posts->appends(request()->query())->links() !!}
       </nav>
   </div></section>

   {!! Theme::partial('section.contact') !!}

</main>

{!! Theme::partial('footer') !!}
