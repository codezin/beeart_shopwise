{!! Theme::partial('header') !!}
@php
$page = get_page_by_id(7);
@endphp
<style type="text/css">
    .header,.header .header-top .nav-wrapper ul li:hover ul.sub-menu,.header input[type=checkbox]:checked ~ #sidebarMenu{
        background: #051E1D;
    }
    .header .spinner{
        background: #fff;
    }
    #header.sticky {
        position: fixed !important;
        z-index: 2000;
        background: rgba(55, 55, 55, 1);
    }
    .header .header-top .nav-wrapper ul a,.search-icon,.header .sidebarMenuInner li a{
        color: #FFF;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        color: #FFF;
    }
</style>
<main class="page-content">
    <section class="title-header dark">
        <h2>{{ Theme::get('pageName') }}</h2>
        <ul class="breadcrumbs">
            <li><a href="{{ route('public.index') }}">{{__("Home")}}</a></li>
            <li><a href="#">{{ Theme::get('pageName') }}</a></li>
        </ul>
    </section>
    <div class="contact-section">
    <div class="container" id="container2" style="margin-bottom: 60px">
        <iframe style="height:700px;width:100%;" scrolling="no" frameborder="0" allowtransparency="true" src="{{url("public/capacity-profile/".Language::getCurrentLocale())}}"></iframe></div>
    </div>
</main>

{!! Theme::partial('footer') !!}
