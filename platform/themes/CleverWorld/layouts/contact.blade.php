{!! Theme::partial('header') !!}

@php
$page = get_page_by_id(2);
@endphp

<main id="main">
    <section id="banner" class="banner-contact banner-bg d-flex align-items-center" style="background-image: url('{{ RvMedia::getImageUrl($page->image) }}')">
        <div class="container">
            <header class="section-header text-center">
                <h2>{{$page->name}}</h2>
            </header>
        </div>
    </section>

    <section id="contact-map" class="contact-map mt-5">      
    	<a href="{{theme_option("google_map_link")}}" target="_blank">
<!--        <img id="map" class="w-100" src="{{base}}asset/images/map.jpg" alt="">                                                                                                                                                                                                                                                                                                                                   -->
	        <iframe id="map" class="w-100" style="height:700px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.508029046879!2d106.71989117627986!3d10.772347789376203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fcdd2041771%3A0xa46e9842e044baf4!2sThe%20Sofic%20Tower!5e0!3m2!1sen!2s!4v1725959056273!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</a>
        <div class="description">
            <h2>{{$page->name}}</h2>
            <p>{!! $page->description !!} </p>
            <div class="d-flex"><img  style="    width: 28px;padding-right: 7px;" src="{{base}}asset/images/contact_addr.svg">{{theme_option('address')}}</div>
            <div ><a href="mailto:{{theme_option('email')}}"><img src="{{base}}asset/images/contact_email.svg"> {{theme_option('email')}}</a></div>
            <div><a href="tel:{{theme_option('phone')}}"><img src="{{base}}asset/images/contact_tel.svg"> {{theme_option('phone')}}</a></div>
        </div>   
	
    </section>

       {!! Theme::partial('section.contact') !!}

</main>
{!! Theme::partial('footer') !!}
