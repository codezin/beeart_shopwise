@php

$page = get_page_by_id(2);
@endphp
<main class="page-content">
    <section class="title-header dark">
        <h2>{{ Theme::get('pageName') }}</h2>
        <ul class="breadcrumbs">
            <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
            <li><a href="#">{{ Theme::get('pageName') }}</a></li>
        </ul>

    </section>

    <section class="contact-section">
        <div class="container">
            <div class="contact-section-row">
                <div class="contact-section-col fadeInLeft"  data-aos="fade-right"  data-aos-delay="1000">
                    {!! $page->description !!}
                    {{-- <h3>Thông tin liên hệ</h3>
                    <div>Liên hệ với chúng tôi để nhận được tư vấn miễn phí!</div>
                    <div class="contact-section-hotline">
                        <div class="contact-section-hotline-wrapper">
                            <h4><span class="fi fi-kr"></span>Hotline Korea:</h4>
                            <a href="tel:+82 10 5738 5566">(+82) 10 5738 5566</a>
                        </div>
                        <div class="contact-section-hotline-wrapper">
                            <a href="tel:+82 10 9663 1502">(+82) 10 9663 1502</a>
                        </div>
                    </div> --}}
                </div>
                {!! Form::open(['route' => 'public.send.contact', 'class' => 'contact-section-col', 'method' => 'POST']) !!}
                    <h3>{{__("From contact")}}</h3>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}(*)" required />
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone') }}(*)" required />
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" />
                    <textarea type="text" name="content" id="contact_content" placeholder="{{ __('Message') }}" ></textarea>
                    <button>{{ __('Send Message') }}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

</main>
<script>
   document.addEventListener("DOMContentLoaded", function() {
        AOS.init();
    });
</script>