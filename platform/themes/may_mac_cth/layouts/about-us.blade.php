{!! Theme::partial('header') !!}
@php

    $page = get_page_by_id(4);
    $core_value = get_field($page, 'core_value');
@endphp
<link rel="stylesheet" href="{{ base }}assets/css/about.css">
<section class="about-us">
    <div class="title-section">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="page-title">{{ $page->name }}</div>
            <div class="breadcrumb-nav" id="breadcrumb"></div>
        </div>
    </div>
    <div class="container">
        <div class="text-center fade-element" id="bannerImageSection">
            <img src="{{ RvMedia::getImageUrl($page->image) }}" alt="Team CTH" class="img-fluid rounded" style="max-width: 100%;">
        </div>
        <div class="brand-story-card mt-5 fade-in" id="headerStorySection">
            <div class="card about-card brand-card">
                <div class="card-body text-center">
                    <h4 class="card-title">{{ get_field($page, 'about_branch') }}</h4>
                    <p class="card-text">{{ get_field($page, 'about_branch_content') }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            @if (!empty($core_value))
                @foreach ($core_value as $item)
                    <div class="col-12 col-md-4 mb-4 fade-element" data-grid="1">
                        <div class="card about-card">
                            <div class="card-body text-center">
                                <h4 class="card-title">{{ get_sub_field($item, 'core_value_title') }}</h4>
                                <p class="card-text">{{ get_sub_field($item, 'core_value_description') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif



            <div class="brand-story-card mt-5 fade-element" id="footerSection">
                <div class="card about-card brand-card">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ get_field($page, 'history') }}</h4>
                        <p class="card-text">{{ get_field($page, 'history_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
</section>

{!! Theme::partial('footer') !!}
