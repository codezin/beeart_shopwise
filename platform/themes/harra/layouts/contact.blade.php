{!! Theme::partial('header') !!}
<link rel="stylesheet" href="{{base}}assets/css/contact-us.css" />
@php
$page = get_page_by_id(2);
@endphp
<main id="main">

    <section id="contact" class="contact">
        <div class="container d-flex justify-content-center align-items-center">
            <div id="contact-panel" class="d-flex justify-content-center align-items-center">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-5 info-item">
                        <div class="title">{!! $page->description !!}</div>
                        <p class="mt-4">
                            <div><span><i class="fa-solid fa-envelope"></i> Email</span></div>
                            <div><a href="mailto:{{theme_option("email")}}">{{theme_option("email")}}</a></div>
                        </p>
                        <p class="mt-4">
                        <div><span><i class="fa-solid fa-location-dot"></i> {{__("Pick Up Location")}}</span></div>
                        {!! $page->content !!}
                        </p>
                    </div>
                    <div class="col-md-7">
                        <form action="#" method="post" role="form" class="frmcontact">
                            <div class="row">
                                <div class="col-xl-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{__('Your Name')}}" required>
                                </div>
                                <div class="col-xl-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{__('Your Email')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="How can we help?*" required></textarea>
                            </div>
                            <div><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section id="follow-us" class="follow-us">
          <div class="container">
              <div class="d-flex align-items-center justify-content-between">
                  <h2 class="title">{{get_field($page,'contact_follow_title')}}</h2>
                  @foreach(get_field($page,'contact_social')??[] as $g)
                  <div><a href="{{get_sub_field($g,'link')}}"><img src="{{ RvMedia::getImageUrl(get_sub_field($g,'icon')) }}" alt=""/> {{get_sub_field($g,'title')}}</a></div>
                  @endforeach
              </div>

              <div id="follow-list" class="d-flex align-items-center justify-content-between mt-5">
                @foreach(get_field($page,'contact_follow_gallery')??[] as $g)
                  <div class="imgbox"><img src="{{ RvMedia::getImageUrl(get_sub_field($g,'image')) }}" alt=""/></div>
                  @endforeach>
              </div>

          </div>
    </section>
</main><!-- End #main -->
<!-- END MAIN CONTENT -->
{!! Theme::partial('footer') !!}
