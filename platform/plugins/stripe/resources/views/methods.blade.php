@if (setting('payment_stripe_status') == 1)
    <li class="list-group-item">
        @if(get_payment_setting('payment_template', STRIPE_PAYMENT_METHOD_NAME)=="template_1")
            @include('plugins/stripe::methods.template_1')
        @else
            @include('plugins/stripe::methods.template_2')
        @endif
    </li>
@endif
