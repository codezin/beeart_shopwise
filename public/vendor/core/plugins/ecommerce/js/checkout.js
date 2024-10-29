try {
    window.$ = window.jQuery = require('jquery')
    require('bootstrap')
} catch (e) {
}
//import { CheckoutAddress } from 'address'
//import { DiscountManagement } from 'discount'
class MainCheckout {
    constructor() {
        new CheckoutAddress().init()
        new DiscountManagement().init()
    }
    static showNotice(messageType, message, messageHeader = '') {
        toastr.clear()
        toastr.options = {
            closeButton: true,
            positionClass: 'toast-bottom-right',
            onclick: null,
            showDuration: 1000,
            hideDuration: 1000,
            timeOut: 10000,
            extendedTimeOut: 1000,
            showEasing: 'swing',
            hideEasing: 'linear',
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
        }
        if (!messageHeader) {
            switch (messageType) {
                case 'error':
                    messageHeader = window.messages.error_header
                    break
                case 'success':
                    messageHeader = window.messages.success_header
                    break
            }
        }
        toastr[messageType](message, messageHeader)
    }
    static handleError(data, $container) {
        if (typeof (data.errors) !== 'undefined' && !_.isArray(data.errors)) {
            MainCheckout.handleValidationError(data.errors, $container)
        } else {
            if (typeof (data.responseJSON) !== 'undefined') {
                if (typeof (data.responseJSON.errors) !== 'undefined') {
                    if (data.status === 422) {
                        MainCheckout.handleValidationError(data.responseJSON.errors, $container)
                    }
                } else if (typeof (data.responseJSON.message) !== 'undefined') {
                    MainCheckout.showError(data.responseJSON.message)
                } else {
                    $.each(data.responseJSON, (index, el) => {
                        $.each(el, (key, item) => {
                            MainCheckout.showError(item)
                        })
                    })
                }
            } else {
                MainCheckout.showError(data.statusText)
            }
        }
    }
    static dotArrayToJs(str) {
        const splittedStr = str.split('.')
        return splittedStr.length === 1 ? str : (splittedStr[0] + '[' + splittedStr.splice(1).join('][') + ']')
    }
    static handleValidationError(errors, $container) {
        if (!errors.length) {
            return
        }
        $.each(errors, (index, item) => {
            let inputName = MainCheckout.dotArrayToJs(index)
            let $input = $('*[name="' + inputName + '"]')
            if ($container) {
                $input = $container.find('[name="' + inputName + '"]')
            }
            if ($input.closest('.form-group').length) {
                $input.closest('.form-group').addClass('field-is-invalid')
            } else {
                $input.addClass('field-is-invalid')
            }
            if ($input.hasClass('form-control')) {
                $input.addClass('is-invalid')
                if ($input.is('select') && $input.closest('.select--arrow').length) {
                    $input.closest('.select--arrow').addClass('is-invalid')
                    $input.closest('.select--arrow').after('<div class="invalid-feedback">' + item + '</div>')
                } else {
                    $input.after('<div class="invalid-feedback">' + item + '</div>')
                }
            }
        })
        MainCheckout.showError(errors[0])
    }
    static showError(message, messageHeader = '') {
        this.showNotice('error', message, messageHeader)
    }
    static showSuccess(message, messageHeader = '') {
        this.showNotice('success', message, messageHeader)
    }
    init() {
        let shippingForm = '#main-checkout-product-info'
        let customerShippingAddressForm = '.customer-address-payment-form .address-form-wrapper'
        let customerBillingAddressForm = '.customer-billing-address-form'
        let disablePaymentMethodsForm = () => {
            $('.payment-info-loading').show()
            $('.payment-checkout-btn').prop('disabled', true)
        }
        let enablePaymentMethodsForm = () => {
            $('.payment-info-loading').hide()
            $('.payment-checkout-btn').prop('disabled', false)
            document.dispatchEvent(new CustomEvent('payment-form-reloaded'))
        }
        let getBaseUrl = () => {
            let baseUrl = window.location.href
            if (!baseUrl.includes('?')) {
                baseUrl = baseUrl + '?'
            } else {
                baseUrl = baseUrl + '&'
            }
            return baseUrl
        }
        let reloadAddressForm = url => {
            disablePaymentMethodsForm()
            $('.shipping-info-loading').show()
            $(shippingForm).load(url, () => {
                $('.shipping-info-loading').hide()
                enablePaymentMethodsForm();
                $("#address_state").trigger("change");
                $("#address_postcode").trigger("change");
            })
        }
        let loadShippingFeeAtTheFirstTime = () => {
            let shippingMethod = $(document).find('input[name=shipping_method]:checked').first()
            if (!shippingMethod.length) {
                shippingMethod = $(document).find('input[name=shipping_method]').first()
                shippingMethod.prop('checked', 'checked')
            }
            if (shippingMethod.length) {
                $('.mobile-total').text('...')
                let params = {
                    shipping_method: shippingMethod.val(),
                    shipping_option: shippingMethod.data('option'),
                    payment_method: '',
                }
                let paymentMethod = $(document).find('input[name=payment_method]:checked').first()
                if (paymentMethod) {
                    params.payment_method = paymentMethod.val()
                }
                reloadAddressForm(getBaseUrl() + $.param(params) + ' ' + shippingForm + ' > *')
            }
        }
        loadShippingFeeAtTheFirstTime()
        let loadShippingFeeAtTheSecondTime = () => {
            const $marketplace = $('.checkout-products-marketplace')
            if (!$marketplace || !$marketplace.length) {
                return
            }
            let shippingMethods = $(shippingForm).find('input.shipping_method_input')
            let methods = {
                shipping_method: {},
                shipping_option: {},
                payment_method: '',
                address: {
                    address_id: $('#address_id').val(),
                },
            }
            if (shippingMethods.length) {
                let storeIds = []
                shippingMethods.map((i, shm) => {
                    let val = $(shm).filter(':checked').val()
                    let sId = $(shm).data('id')
                    if (!storeIds.includes(sId)) {
                        storeIds.push(sId)
                    }
                    if (val) {
                        methods['shipping_method'][sId] = val
                        methods['shipping_option'][sId] = $(shm).data('option')
                    }
                })
                if (Object.keys(methods['shipping_method']).length !== storeIds.length) {
                    shippingMethods.map((i, shm) => {
                        let sId = $(shm).data('id')
                        if (!methods['shipping_method'][sId]) {
                            methods['shipping_method'][sId] = $(shm).val()
                            methods['shipping_option'][sId] = $(shm).data('option')
                            $(shm).prop('checked', true)
                        }
                    })
                }
            }
            let paymentMethod = $(document).find('input[name=payment_method]:checked').first()
            if (paymentMethod.length) {
                methods.payment_method = paymentMethod.val()
            }
            reloadAddressForm(getBaseUrl() + $.param(methods) + ' ' + shippingForm + ' > *')
        }
        loadShippingFeeAtTheSecondTime()
        $(document).on('change', 'input.shipping_method_input', () => {
            loadShippingFeeAtTheSecondTime()
        })
        $(document).on('change', 'input[name=shipping_method]', event => {
            // Fixed: set shipping_option value based on shipping_method change:
            const $this = $(event.currentTarget)
            $('input[name=shipping_option]').val($this.data('option'))
            $('.mobile-total').text('...')
            let params = {
                shipping_method: $this.val(),
                shipping_option: $this.data('option'),
                payment_method: '',
                // address: {
                //     address_id: $('#address_id').val(),
                // },
            }
            if ($('#address_id').length > 0) {
                params["address"] = { address_id: $('#address_id').val() }
            }
            else {
                params["address"] = {
                    city: $('#address_city').val(),
                    state: $('#address_state').val(),
                    postcode: $('#address_postcode').val()
                }
            }
            console.log(123, params);
            let paymentMethod = $(document).find('input[name=payment_method]:checked').first()
            if (paymentMethod.length) {
                params.payment_method = paymentMethod.val()
            }
            reloadAddressForm(getBaseUrl() + $.param(params) + ' ' + shippingForm + ' > *')
        })
        $(document).on('change', 'input[name=payment_method]', event => {
            const $this = $(event.currentTarget)
            $('.mobile-total').text('...')
            let params = {
                payment_method: $this.val(),
            }
            reloadAddressForm(getBaseUrl() + $.param(params) + ' ' + shippingForm + ' > *')
        })
        let validatedFormFields = () => {
            let addressId = $('#address_id').val()
            if (addressId && addressId !== 'new') {
                return true
            }
            let validated = true
            $.each($(document).find('.form-control[required]'), (index, el) => {
                if (!$(el).val() || $(el).val() === 'null') {
                    validated = false
                }
            })
            return validated
        }
        $(document).on('change', customerShippingAddressForm + ' .form-control', event => {
            setTimeout(function () {
                let _self = $(event.currentTarget)
                _self.closest('.form-group').find('.text-danger').remove()
                let $form = _self.closest('form')
                if (validatedFormFields() && $form.valid && $form.valid()) {
                    $.ajax({
                        type: 'POST',
                        cache: false,
                        url: $('#save-shipping-information-url').val(),
                        data: new FormData($form[0]),
                        contentType: false,
                        processData: false,
                        success: res => {
                            if (!res.error) {
                                disablePaymentMethodsForm()
                                let $wrapper = $(shippingForm)
                                if ($wrapper.length) {
                                    $('.shipping-info-loading').show()
                                    $wrapper.load(window.location.href + ' ' + shippingForm + ' > *', () => {
                                        $('.shipping-info-loading').hide()
                                        const isChecked = $wrapper.find('input[name=shipping_method]:checked')
                                        if (!isChecked) {
                                            $wrapper.find('input[name=shipping_method]:first-child').trigger('click') // need to check again
                                        }
                                        enablePaymentMethodsForm()
                                    })
                                }
                                loadShippingFeeAtTheSecondTime(); // marketplace

                            }

                        },
                        error: res => {
                            MainCheckout.handleError(res, $form)
                        },
                    })
                }
            }, 1000)
        })
        $(document).on('change', customerBillingAddressForm + ' #billing_address_same_as_shipping_address', event => {
            let _self = $(event.currentTarget)
            let val = _self.find(':selected').val()
            if (val) {
                $('.billing-address-form-wrapper').hide()
            } else {
                $('.billing-address-form-wrapper').show()
            }
        })

        $(document).on("change","#address_state",function(){
            let post_code = $(this).val();             
             $(".list_payment_method").find(".list-group-item").hide();
            $(".list_payment_method").find(".list-group-item[data-postcode='"+post_code+"']").show();
             $(".list_payment_method").find(".list-group-item[data-postcode='0']").show();
        })
        loadDefault();
       // initMap();
    }
}
function loadDefault()
{
    // Ngày đặt hàng là ngày hôm nay
    var orderDate = new Date();

    // Kiểm tra giờ hiện tại
    var currentHour = orderDate.getHours();

    // Tính toán ngày tối thiểu dựa trên giờ hiện tại
    var minDate = new Date(orderDate);
    if (currentHour >= 14) {
        minDate.setDate(minDate.getDate() + 3); // Sau 14h, cộng thêm 3 ngày
    } else {
        minDate.setDate(minDate.getDate() + 2); // Trước 14h, cộng thêm 2 ngày
    }

    // Tính toán ngày tối đa là 3 tháng sau từ ngày đặt hàng
    var maxDate = new Date(orderDate);
    maxDate.setMonth(maxDate.getMonth() + 3);

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

    $('#billing_address_delivered_time').datetimepicker({
        format: 'Y-m-d H:i', // Định dạng ngày giờ
        minDate: formattedMinDate, // Ngày tối thiểu dựa trên giờ hiện tại
        maxDate: formattedMaxDate, // Ngày tối đa là 3 tháng sau từ ngày đặt hàng
        minTime: '08:00', // Thời gian tối thiểu là 8:00
        maxTime: '19:30', // Thời gian tối đa là 19:30
        step: 30 // Bước nhảy của thời gian là 30 phút
        //  beforeShowDay: function(date) {
        // Vô hiệu hóa ngày Chủ Nhật
        //     var day = date.getDay();
        //     return [(day != 0)];
        // },
        // value: formattedDefaultDate // Đặt ngày mặc định
    });
}

var map;
var marker;

function initMap() {
    const center = { lat: 50.064192, lng: -130.605469 };
// Create a bounding box with sides ~10km away from the center point
const defaultBounds = {
  north: center.lat + 0.1,
  south: center.lat - 0.1,
  east: center.lng + 0.1,
  west: center.lng - 0.1,
};
    const input = document.getElementById("address_address");
    const options = {
      bounds: defaultBounds,
      componentRestrictions: { country: "us" },
      fields: ["address_components", "geometry", "icon", "name"],
      strictBounds: false,
    };
    const autocomplete = new google.maps.places.Autocomplete(input, options);
}
jQuery(document).ready(() => {
    new MainCheckout().init()
    window.MainCheckout = MainCheckout
});
