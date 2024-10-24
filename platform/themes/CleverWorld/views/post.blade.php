@php Theme::set('pageName', __('Blog')) @endphp
@php
$page = get_page_by_id(13);           
@endphp
<main id="main">
    <section id="banner" class="banner-about banner-bg d-flex align-items-center"
        style="background-image: url('{{ RvMedia::getImageUrl($post->banner==null?$page->banner:$post->banner) }}')">
        <div class="container">
            <header class="section-header text-center">
                <h2>Tin tức</h2>
            </header>
        </div>
    </section>

    <section id="title-page" class="title-page">
        <div class="container">
            <div id="breadcrumbs">
                <span>{{__("Home")}}</span>
                <span><i class="fa-light fa-angle-right"></i></span>
                <span>{{__("News")}}</span>
                <span><i class="fa-light fa-angle-right"></i></span>
                <span> {{ $post->name }}</span>
            </div>
        </div>
    </section>

    <section id="news-detail" class="news-detail mt-2">
        <div class="container">   
			<div class="row">
				 <div class="col-xl-9">
		            <h2 class="title mb-3">{{ $post->name }}</h2>
					<section id="post_content">
			           {!! BaseHelper::clean(strip_tags($post->content,['b','h1','br','img','p', 'a'])) !!} 
			
						<style type="text/css">
						#post_content {
							margin-bottom: 1rem;
						}
						</style>  
					</section>               
				</div>
				 <div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
	                <div class="sidebar">      
						<h1 class="title">{{__("News")}}</h1>
						<ul style="    padding: 0;">
	                    @foreach(get_all_categories() as $cate)  
							@if(!in_array($cate->id,[1,2]))
							<li> 
							<a href="{{$cate->url}}">{{$cate->name}}</a></li>
							@endif
						@endforeach
						</ul>
	                </div>
	            </div>
			</div>
        </div>
    </section>
			      <style type="text/css"> 
				  @media screen and (max-width: 768px) {   
				  		
				      #news-detail p img, #news-detail figure img{
			      		width:100%;
				      }                   
				  }
			      </style>
	<div style="    clear: both;"></div>
    @php $relatedPosts = get_related_posts($post->id, 2); @endphp
    @if ($relatedPosts->count())
        <section id="news-relate" class="news-home mb-5">
            <div class="container">
                <header class="section-header d-flex justify-content-between" data-aos="fade-top">
                    <h2>Bài viết liên quan</h2>
                    <div style="display:none">
					<a href="news" class="btn-viewall">Tất cả bài viết 
					<img
                                src="{{ base }}asset/images/right-arrow.svg" /></a>
					</div>
                </header>
                <div class="row gy-4">
                    @foreach ($relatedPosts as $relatedItem)
                    <div class="col-xl-3 col-md-6 col-6" data-aos="fade-up" data-aos-delay="100">
                        <article>
                            <div class="img imgbox">
                                <a href="{{ $relatedItem->url }}"><img src="{{ RvMedia::getImageUrl($relatedItem->image)}}" alt=""></a>
                            </div>
                            <div class="description">
                                <p class="post-date">
                                    <time>Clever World | {{ $relatedItem->created_at->translatedFormat('M d, Y') }}</time>
                                </p>
                                <h2 class="title">
                                    <a href="{{ $relatedItem->url }}">{{ $relatedItem->name }}</a>
                                </h2>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End News Home Section -->
    @endif
         {!! Theme::partial('section.contact') !!}

</main>
