<input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_stripe"
               value="stripe" @if ($selecting == STRIPE_PAYMENT_METHOD_NAME) checked @endif>
        <label for="payment_stripe" class="text-start d-flex">
            {{ setting('payment_stripe_name', trans('plugins/payment::payment.payment_via_card')) }}
            {!! setting('payment_stripe_image', trans('plugins/payment::payment.payment_via_card')) !!}
        </label>
        <div class="payment_stripe_wrap payment_collapse_wrap collapse @if ($selecting == STRIPE_PAYMENT_METHOD_NAME) show @endif" >
            <div>{!! BaseHelper::clean(get_payment_setting('description', STRIPE_PAYMENT_METHOD_NAME)) !!}</div>
            @if (get_payment_setting('payment_type', STRIPE_PAYMENT_METHOD_NAME, 'stripe_api_charge') == 'stripe_api_charge')
                <div class="card-checkout stripe_template_2" >
                    <div class="stripe-card-wrapper" style="display: none"></div>
                    <div class="form-group mb-3 @if ($errors->has('number') || $errors->has('expiry')) has-error @endif">
                        <div class="ml-3">
                            <div  class="d-flex" style="border:1px solid #ccc;    padding: 5px;border-radius: 8px; gap: 10px">
                                <img src="{{asset("themes/assets/image/icon/card.svg")}}" />
                                <input placeholder="{{ trans('plugins/payment::payment.card_number') }}"
                                       class="form-control" type="text" id="stripe-number" data-stripe="number" autocomplete="off">


                                <input placeholder="{{ trans('plugins/payment::payment.mm_yy') }}" class="form-control"
                                       type="text" id="stripe-exp" data-stripe="exp" autocomplete="off" style="max-width: 100px">
                                <input placeholder="{{ trans('plugins/payment::payment.cvc') }}" class="form-control  @if ($errors->has('cvc')) has-error @endif"
                                       type="text" id="stripe-cvc" data-stripe="cvc" autocomplete="off" style="max-width: 70px">
                            </div>
                            <div  class="d-flex mt-1" style="border:1px solid #ccc;    padding: 5px;border-radius: 8px;">
                                <input placeholder="Card holder name" class="form-control @if ($errors->has('name')) has-error @endif" id="stripe-name" type="text" data-stripe="name" autocomplete="off">
                            </div>
                        </div>
                    </div>

                </div>
                <div id="payment-stripe-key" data-value="{{ setting('payment_stripe_client_id') }}"></div>
            @endif
        </div>
        <style type="text/css">
         .stripe_template_2  input{
            border: 0
        }
        .stripe_template_2 .jp-card-container {
                -webkit-perspective: 1000px;
                -moz-perspective: 1000px;
                perspective: 850px;
                width: 60px;
                /* max-width: 91%; */
                height: 47px;
                margin: auto;
                z-index: 1;
                position: relative;
            }
            .stripe_template_2  .jp-card {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    line-height: 1;
    position: relative;
    width: 66%;
    height: 99%;
    min-width: 64px;
    border-radius: 10px;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transition: all 400ms linear;
    -moz-transition: all 400ms linear;
    transition: all 400ms linear;
    top: 0;
    left: -8px;
}
.jp-card .jp-card-front .jp-card-lower {
    width: 80%;
    position: absolute;
    left: 6%;
    bottom: 14px;
    font-size: 8px;
}
.jp-card .jp-card-front .jp-card-lower .jp-card-name {
    text-transform: uppercase;
    font-family: "Bitstream Vera Sans Mono", Consolas, Courier, monospace;
    font-size: 3px !important;
    max-height: 42px;
    position: absolute;
    bottom: 3px;
    width: 144px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: horizontal;
    overflow: hidden;
    text-overflow: ellipsis;
}
.jp-card .jp-card-front .jp-card-lower .jp-card-expiry:after, .jp-card .jp-card-front .jp-card-lower .jp-card-expiry:before{
    font-size: 3px !important;
}
.jp-card .jp-card-front .jp-card-lower .jp-card-expiry{
    font-size: 3px;
}
.jp-card .jp-card-front .jp-card-lower .jp-card-expiry:after{
    font-size: 5px;

}
</style>
