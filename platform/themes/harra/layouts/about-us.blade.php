{!! Theme::partial('header') !!}
@php

$page = get_page_by_id(4);
$mission = get_field($page,"mission");
@endphp

<div id="title-page" class="breadcrumb_section  page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h2>{{ $page->name }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                {!! Theme::partial('breadcrumbs') !!}
            </div>
        </div>
    </div>
</div>
<main id="main">
    <section class="about-info">
        <div class="container">
            <div class="row mt-5">

                <div class="col-md-6">
                    <img src="{{ RvMedia::getImageUrl($page->image) }}" alt="{{ $page->name }}" class="img-fluid" loading="lazy"/>

                </div>
                <div class="col-md-6 p-5 d-flex align-items-center">
                    <div class="section-header">
                        <img class="img-bottom-about-us-detail-section" src="{{base}}asset/images/Frame.png" alt="" srcset="" />
                        <h2 class="mt-xl-2 mt-lg-0">{!! strip_tags($page->description) !!}</h2>
                        <div class="caption-about-us-detail">{!! $page->content !!}</div>
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
    <section class="about-us-detail-section">
        <div class="container">
            <div class="section-header text-center">
                <img class="img-bottom-about-us-detail-section" src="{{base}}asset/images/Frame.png" alt="" srcset="" />
                <h2 class="mt-5 mt-lg-0">{{get_field($page,"mission_title")}}</h2>
            </div>
            @foreach($mission as $item)
            @if($loop->index %2 == 0)
            <div class="about-us-detail-section-row">
                <div class="about-us-detail-section-col">
                    <h3>{{ get_sub_field($item,"title") }}</h3>
                    <p>
                        {{ get_sub_field($item,"description") }}
                    </p>
                </div>
                <div class="about-us-detail-section-col">
                    <img class="img-about-us-detail-section" src="{{ RvMedia::getImageUrl(get_sub_field($item,"image")) }}" alt="" srcset="" />
                </div>

            </div>

            @else
            <div class="about-us-detail-section-row">
                <div class="about-us-detail-section-col">
                    <img class="img-about-us-detail-section" src="{{ RvMedia::getImageUrl(get_sub_field($item,"image")) }}" alt="" srcset="" />
                </div>
                <div class="about-us-detail-section-col">
                    <h3>{{ get_sub_field($item,"title") }}</h3>
                    <p>
                        {{ get_sub_field($item,"description") }}
                    </p>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <style type="text/css">
        .about-us-detail-section{
            background: url('{{base}}asset/images/bgmission.png');
            position: relative;
            top: 170px;
            z-index: -1;
            padding-bottom: 150px;
        }
        .about-us-detail-section .section-header{
            padding: 150px 0 80px 0;
        }
        .about-us-detail-section-row {
            display: flex;
            align-items: center;
            gap: 72px;
            margin-bottom: 52px;
        }
        .about-us-detail-section-col {
            width: 50%;
        }
        .about-us-detail-section-col h3{
            color: #A95AA3;
        }

        @media (max-width: 767px){
            .about-us-detail-section{
                top: 65px;
                background-size: 100% 100%;
            }
            .about-us-detail-section-row {
                flex-direction: column;
            }
            .about-us-detail-section-col {
                width: 100%;
            }
            .about-us-detail-section-col img{
                width: 100%;
            }
        }

        </style>
    </section>

    <section class="history-section">
        <div class="container">
            <div class="history-section-head">
                <h3>{{get_field($page,"history_title")}}</h3>
                <p>
                    {{get_field($page,"history_description")}}
                </p>
            </div>
            <div class="history-section-row">
                @if(!empty($history = get_field($page,"history")))
                @foreach ($history as $r)
                <div class="history-section-col">
                    <h4>{{get_sub_field($r,"history_year")}}</h4>
                    <p>
                        {{get_sub_field($r,"history_description")}}
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
