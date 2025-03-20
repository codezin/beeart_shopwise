<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title', __('Checkout')) </title>

    @if (theme_option('favicon'))
    <link rel="shortcut icon" href="{{ RvMedia::getImageUrl(theme_option('favicon')) }}">
    @endif

    {!! Html::style('vendor/core/core/base/libraries/font-awesome/css/fontawesome.min.css') !!}
    {!! Html::style('vendor/core/plugins/ecommerce/css/front-theme.css?v=1.2.1') !!}

    @if (BaseHelper::siteLanguageDirection() == 'rtl')
    {!! Html::style('vendor/core/plugins/ecommerce/css/front-theme-rtl.css?v=1.2.1') !!}
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {!! Html::style('vendor/core/core/base/libraries/toastr/toastr.min.css') !!}
    {!! Html::script('vendor/core/plugins/ecommerce/js/address.js?v=1.2.1') !!}
    {!! Html::script('vendor/core/plugins/ecommerce/js/discount.js?v=1.2.1') !!}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {!! Html::script('vendor/core/plugins/ecommerce/js/checkout.js?'.time()) !!}
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBETz6vreNaK1VP8MFwCXiQ8snEJPUcwc&libraries=places&callback=initMap">
    </script>
    @if (EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation())
    <script src="{{ asset('vendor/core/plugins/location/js/location.js') }}?v=1.2.1"></script>
    @endif

    {!! apply_filters('ecommerce_checkout_header', null) !!}

    @stack('header')
</head>

<body class="checkout-page" @if (BaseHelper::siteLanguageDirection()=='rtl' ) dir="rtl" @endif>
    {!! apply_filters('ecommerce_checkout_body', null) !!}
    <div class="checkout-content-wrap">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('footer')

    {!! Html::script('vendor/core/plugins/ecommerce/js/utilities.js') !!}
    {!! Html::script('vendor/core/core/base/libraries/toastr/toastr.min.js') !!}

    <script type="text/javascript">
        window.messages = {
            error_header: '{{ __('Error') }}',
            success_header: '{{ __('Success') }}',
        }
    </script>

    @if (session()->has('success_msg') || session()->has('error_msg') || isset($errors))
    <script type="text/javascript">
        $(document).ready(function () {
                @if (session()->has('success_msg') && session('success_msg'))
                    MainCheckout.showNotice('success', '{{ session('success_msg') }}');
                @endif
                @if (session()->has('error_msg'))
                    MainCheckout.showNotice('error', '{{ session('error_msg') }}');
                @endif
                @if (isset($errors) && $errors->count())
                    MainCheckout.showNotice('error', '{{ $errors->first() }}');
                @endif
            });
    </script>
    @endif

    {!! apply_filters('ecommerce_checkout_footer', null) !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        //$(document).ready(function() {
            // Ngày đặt hàng là ngày hôm nay
            var orderDate = new Date();

            // Kiểm tra giờ hiện tại
            var currentHour = orderDate.getHours();

            // Tính toán ngày tối thiểu dựa trên giờ hiện tại
            var minDate = new Date(orderDate);
            if (currentHour >= 14) {
                minDate.setDate(minDate.getDate() + 2); // Sau 14h, cộng thêm 3 ngày
            } else {
                minDate.setDate(minDate.getDate() + 1); // Trước 14h, cộng thêm 2 ngày
            }

            // Tính toán ngày tối đa là 3 tháng sau từ ngày đặt hàng
            var maxDate = new Date(orderDate);
            maxDate.setMonth(maxDate.getMonth() + 1);

            // Hàm để kiểm tra nếu một ngày là Chủ Nhật
            function isSunday(date) {
                return date.getDay() === 0;
            }

            // Tìm ngày hợp lệ đầu tiên
            var defaultDate = new Date(minDate);
            while (isSunday(defaultDate)) {
                defaultDate.setDate(defaultDate.getDate() + 1);
            }

            // Định dạng ngày thành chuỗi phù hợp với datetimepicker
            var formattedMinDate = minDate.getFullYear() + '-' +
                ('0' + (minDate.getMonth() + 1)).slice(-2) + '-' +
                ('0' + minDate.getDate()).slice(-2);

            var formattedMaxDate = maxDate.getFullYear() + '-' +
                ('0' + (maxDate.getMonth() + 1)).slice(-2) + '-' +
                ('0' + maxDate.getDate()).slice(-2);

            var formattedDefaultDate = defaultDate.getFullYear() + '-' +
                ('0' + (defaultDate.getMonth() + 1)).slice(-2) + '-' +
                ('0' + defaultDate.getDate()).slice(-2) + ' 08:00';

            $(document).on("keyup","#billing_address_delivered_time", function(){
                $('#billing_address_delivered_time').datetimepicker({
                format: 'Y-m-d H:i', // Định dạng ngày giờ
                minDate: formattedMinDate, // Ngày tối thiểu dựa trên giờ hiện tại
                maxDate: formattedMaxDate, // Ngày tối đa là 3 tháng sau từ ngày đặt hàng
                minTime: '10:00', // Thời gian tối thiểu là 8:00
                maxTime: '20:15', // Thời gian tối đa là 19:30
                step: 15, // Bước nhảy của thời gian là 30 phút
                //  beforeShowDay: function(date) {
                // Vô hiệu hóa ngày Chủ Nhật
                //     var day = date.getDay();
                //     return [(day != 0)];
                // },
                // value: formattedDefaultDate // Đặt ngày mặc định

				value: formattedMinDate + " 10:00"
            });
            })

            $(document).on("change","#address_postcode",function(){
                if($("#address_postcode").val()!="")
                {

                    $(".list_payment_method .list-group-item").each(function(){
                        if($(this).data("postcode")>0)
                        {
                            text = $(this).find("label span").text().trim();
                        if(text.indexOf($("#address_postcode").val()) > -1)
                        {
                            $(this).show();
                        }
                        else $(this).hide();
                        }
                    });
                }
            });
       // });
    </script>
    <style type="text/css">
        .select2-selection--single {
            height: 45px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 45px;
        }

        .select--arrow i {
            display: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 88%;
        }
    </style>
</body>

</html>
