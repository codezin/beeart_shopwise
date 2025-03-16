
<script src="https://js.stripe.com/v3/"></script>
<button id="payment-request-button" style="width: 300px;border:0;    background: transparent;"></button>

<script>
    $(document).ready(function () {
    var stripe = Stripe("pk_test_51Qw9K72Kzxc3Ik69Or1Q9XSvseqSsyRizDmLu7MycL3eN8YsmjL0Z9RX4zXZRUmY2fRySaPFKZIvUkcL3oSiyxyU00DZKovx0C"); // Thay bằng Stripe Publishable Key

    var paymentRequest = stripe.paymentRequest({
        country: "US",
        currency: "usd",
        total: {
            label: "Total Amount",
            amount: 100, // 50 USD
        },
        requestPayerName: true,
        requestPayerEmail: true,
    });

    var elements = stripe.elements();
    var prButton = elements.create("paymentRequestButton", {
        paymentRequest: paymentRequest,
    });

    paymentRequest.canMakePayment().then(function (result) {
        if (result) {
            prButton.mount("#payment-request-button");
        } else {
            $("#payment-request-button").hide();
        }
    });

    paymentRequest.on("paymentmethod", function (ev) {
        stripe.confirmCardPayment("your-client-secret", {
            payment_method: ev.paymentMethod.id,
        }).then(function (confirmResult) {
            if (confirmResult.error) {
                ev.complete("fail");
                alert("Payment failed!");
            } else {
                ev.complete("success");
                alert("Payment successful!");
            }
        });
    });
});

</script>
