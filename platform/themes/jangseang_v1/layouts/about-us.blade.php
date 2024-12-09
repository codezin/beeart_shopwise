{!! Theme::partial('header') !!}
@php

$page = get_page_by_id(4);
$misson = get_field($page,"mission_title");
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

    <section class="about-us-detail-section">
        <div class="container">
            <section class="about-info">
                <div class="container">
                    <div class="row mt-5">

                        <div class="col-md-6 pr-2 d-flex align-items-center"  >
                            <div class="section-header fadeInLeft" data-aos="fade-right">
                                <img class="img-bottom-about-us-detail-section" src="{{base}}img/comma.png" alt="" srcset="" />
                                <div class="text-default mb-2">
                                    {!! $page->content !!}
                                </div>
                                {{-- <div class="caption-about-us-detail">{!! $page->content !!}</div> --}}
                            </div>
                        </div>
                        <div class="col-md-6 pl-2" >
                            <img src="{{ RvMedia::getImageUrl($page->image) }}" alt="{{ $page->name }}" class="img-fluid zoomImage" loading="lazy" style="    border-radius: 10px;"/>
                            <h3 class="mt-2">{{__("Company information")}}</h3>
                            <div class="caption" data-aos="fade-left" data-aos-delay="250">
                                {!! get_field($page,"company_information") !!}
                                {{-- <ul class="text-default ">
                                        <li>
                                            Tên công ty: <b> Công ty Cổ phần Thương mại JangSeang Insam</b> </li>
                                        <li>Tên quốc tế:  <b>JANGSEANG GINSENG TRADING CORPORATION </b></li>
                                        <li>Mã số thuế:  <b>0110156049 </b></li>

                                        <li>Website:  <b>jangseang.com</b>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>

                    </div>
                </div>
                <style type="text/css">
                    .about-info{
                        position: relative;
                        top: 70px;
                    }
                    .caption-about-us-detail{
                        text-align: justify;
                    }
                    @media (max-width: 767px){
                        .about-info{
                            position: unset;
                        }
                    }
                </style>
            </section>

            <div class="about-us-detail-section-row" data-aos="fade-right" data-aos-delay="200">
                <div class="about-us-detail-section-col">
                    <h3>{{ get_field($page,"vision_title") }}</h3>
                    <p>
                        {{ get_field($page,"vision_description") }}
                    </p>
                </div>
                <div class="about-us-detail-section-col">
                    <img class="img-about-us-detail-section" src="{{ RvMedia::getImageUrl(get_field($page,"mission_image")) }}" alt="" srcset="" />
                </div>

            </div>
    </section>
    <section class="vision-section">
        <div class="container">
            <div class="about-us-detail-section-row" data-aos="fade-left" data-aos-delay="200">
                    <div class="about-us-detail-section-col">
                        <h3>{{ get_field($page,"mission_title") }}</h3>
                        <div class="about-us-detail-section-content">
                            <p class="text-default">
                                {{ get_field($page,"mission_description") }}
                            </p>
                        </div>
                    </div>
                    <div class="about-us-detail-section-col">
                        <img class="img-about-us-detail-section" src="{{ RvMedia::getImageUrl(get_field($page,"vision_image")) }}" alt="" srcset="" />
                    </div>
                </div>
            </div>


            <div class="about-us-detail-section-2" data-aos="fade-up" data-aos-delay="100">
                <div class="container">
                    <h3>{{get_field($page,"core_value_title")}}</h3>
                    <div class="about-us-detail-section-row-2">
                        @if(!empty($core_value = get_field($page,"core_value")))

                        @foreach ($core_value as $r)
                        <div class="about-us-detail-section-content-2" data-aos="flip-up" data-aos-delay="200">
                            <img class="img-about-us-detail-section zoomImage" src="{{ RvMedia::getImageUrl(get_sub_field($r,"core_value_image")) }}" alt="" srcset="" />
                            <h4>{{get_sub_field($r,"core_value_title")}}</h4>
                            <p>
                                {{get_sub_field($r,"core_value_description")}}
                            </p>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <img class="img-bottom-about-us-detail-section" src="{{base}}img/bottom-about-us.png" alt="" srcset="" />
    </section>

    <section class="history-section">
        <div class="container">
            <div class="history-section-head" data-aos="zoom-out-down" data-aos-delay="100">
                <h3>{{get_field($page,"history_title")}}</h3>
                <p>
                    {{get_field($page,"history_description")}}
                </p>
            </div>
            <div class="history-section-row">
                @if(!empty($history = get_field($page,"history")))
                @foreach ($history as $r)
                <div class="history-section-col" data-aos="zoom-out-<?=$loop->index%2==0?'right':'left'?>" data-aos-delay="{{$loop->index*10}}">
                    <h4>{{get_sub_field($r,"history_year")}}</h4>
                    <p>
                        {!! get_sub_field($r,"history_description") !!}
                    </p>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

</main>
{{-- {!! Theme::content() !!} --}}
{!! Theme::partial('footer') !!}
