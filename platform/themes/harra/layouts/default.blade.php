{!! Theme::partial('header') !!}

{{-- <div id="title-page" class="breadcrumb_section  page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h2>{{ Theme::get('pageName') }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                {!! Theme::partial('breadcrumbs') !!}
            </div>
        </div>
    </div>
</div> --}}

{!! Theme::content() !!}

{!! Theme::partial('footer') !!}
