{!! Theme::partial('header') !!}
@php

$page = get_page_by_id(4);
$misson = get_field($page,"mission_title");
@endphp
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
            <div class="about-us-detail-section-row">
                <div class="about-us-detail-section-col">
                    <img class="img-about-us-detail-section" src="{{ RvMedia::getImageUrl(get_field($page,"mission_image")) }}" alt="" srcset="" />
                </div>
                <div class="about-us-detail-section-col">
                    <h3>{{ get_field($page,"mission_title") }}</h3>
                    <p>
                        {{ get_field($page,"mission_description") }}
                    </p>
                </div>
            </div>
            <div class="about-us-detail-section-row">
                <div class="about-us-detail-section-col">
                    <img class="img-about-us-detail-section" src="{{ RvMedia::getImageUrl(get_field($page,"vision_image")) }}" alt="" srcset="" />
                </div>
                <div class="about-us-detail-section-col">
                    <h3>{{ get_field($page,"vision_title") }}</h3>
                    <div class="about-us-detail-section-content">
                        <p>
                            {{ get_field($page,"vision_description") }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="about-us-detail-section-2">
                <h3>{{get_field($page,"core_value_title")}}</h3>
                <div class="about-us-detail-section-row-2">
                    @if(!empty($core_value = get_field($page,"core_value")))

                    @foreach ($core_value as $r)
                    <div class="about-us-detail-section-content-2">
                        <img class="img-about-us-detail-section" src="{{ RvMedia::getImageUrl(get_sub_field($r,"core_value_image")) }}" alt="" srcset="" />
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
        <img class="img-bottom-about-us-detail-section" src="{{base}}img/bottom-about-us.png" alt="" srcset="" />
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
