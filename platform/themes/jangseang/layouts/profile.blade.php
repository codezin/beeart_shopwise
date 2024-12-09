{!! Theme::partial('header') !!}
@php
$page = get_page_by_id(7);
@endphp
<main class="page-content">
    <section class="title-header dark">
        <h2>{{ Theme::get('pageName') }}</h2>
        <ul class="breadcrumbs">
            <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
            <li><a href="#">{{ Theme::get('pageName') }}</a></li>
        </ul>
    </section>
    <div class="contact-section">
    <div class="container" id="container2" style="margin-bottom: 60px"><iframe style="height:700px;width:100%;" scrolling="no" frameborder="0" allowtransparency="true" src="{{url("public/profile-template")}}"></iframe></div>
    </div>
</main>

{!! Theme::partial('footer') !!}
