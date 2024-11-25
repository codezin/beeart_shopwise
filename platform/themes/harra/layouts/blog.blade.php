{!! Theme::partial('header') !!}
@php
$posts = get_all_posts();
@endphp
<div class="main_content">
    <!-- START SECTION BLOG -->
    <div class="section section-blog-latest pb_80 pt_80">
        <div class="container">
            <h2 class="heading_h2">Blog</h2>
            <div class="row">
                @foreach ( $posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="blog_post blog_style2">
                        <div class="blog_img">
                            <img src="{{ RvMedia::getImageUrl($post->image) }}" alt="furniture_blog_img1" />
                        </div>
                        <div class="blog_content">
                            <div class="blog_text">
                                <h5 class="blog_title subheading_h5">
                                    {{$post->name}}
                                </h5>
                                <p>
                                    {{$post->description}}
                                </p>
                                <a class="btn-readmore" href="{{$post->url}}">{{__("Read more")}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
            <div class="row">
                <div class="col-12 mt-2 mt-md-4">
                    {!! $posts->appends(request()->query())->onEachSide(1)->links() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BLOG -->
</div>
{!! Theme::partial('footer') !!}
