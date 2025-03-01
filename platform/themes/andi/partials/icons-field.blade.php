@php
    Arr::set($attributes, 'class', Arr::get($attributes, 'class') . ' icon-select');
    Arr::set($attributes, 'data-empty', __('None'));
@endphp

{!! Form::customSelect($name, [$value => $value], $value, $attributes) !!}

@once
    @if (request()->ajax())
        <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::asset()->url('css/flaticon.css') }}">
        <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::asset()->url('css/ionicons.min.css') }}">
        <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::asset()->url('css/linearicons.css') }}">
        <style>
            .icon-tiktok {
                background: url('{{ Theme::asset()->url('images/icon-tiktok.svg') }}');
                width: 10px;
                height: 10px;
            }
        </style>
        <script src="{{ Theme::asset()->url('js/icons-field.js') }}?v=1.0.1"></script>
    @else
        @push('header')
            <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::asset()->url('css/flaticon.css') }}">
            <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::asset()->url('css/ionicons.min.css') }}">
            <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::asset()->url('css/linearicons.css') }}">
            <style>
                .icon-tiktok {
                    background: url('{{ Theme::asset()->url('images/icon-tiktok.svg') }}');
                    width: 10px;
                    height: 10px;
                }
            </style>
            <script src="{{ Theme::asset()->url('js/icons-field.js') }}?v=1.0.1"></script>
        @endpush
    @endif
@endonce
