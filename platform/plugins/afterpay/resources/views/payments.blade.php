<ul>
    @foreach($payments->payments as $payment)
        <li>
            @include('plugins/afterpay::detail', compact('payment'))
        </li>
    @endforeach
</ul>
