<script src="https://applepay.cdn-apple.com/jsapi/v1/apple-pay-sdk.js"></script>
<style>
apple-pay-button {
	--apple-pay-button-width: 150px;
    --apple-pay-button-height: 44px;
    --apple-pay-button-border-radius: 7px;
    --apple-pay-button-padding: 0px 0px;
    --apple-pay-button-box-sizing: border-box;
    display: block !important;
    width: 240px;
    height: 50px;
}
</style>
<apple-pay-button buttonstyle="black" onclick="onApplePayButtonClicked()"  type="plain" locale="en"></apple-pay-button>         
<script>           
 
function onApplePayButtonClicked() { 

   if (!ApplePaySession) {
        return;
   }
   
  // Define ApplePayPaymentRequest ...
      
  // Starting the Apple Pay Session ...
  
  // Validating Merchant ...
      
   session.onpaymentauthorized = event => {
    const token = event.payment.token;
    
    // prepare request for moyasar
    let body = {
        'amount': applePayPaymentRequest.total.amount * 100,
        'currency': applePayPaymentRequest.currencyCode,
        'description': 'My Awsome Order #1234',
        'publishable_api_key': 'pk_test_FIND_IT_IN_MOYASAR_DASHBOARD',
        'source': {
            'type': 'applepay',
            'token': token
        },
        'metadata':{
          'order': '1234'
        }
    };
    
    // send the request
    fetch('https://api.moyasar.com/v1/payments', {
        method: 'post',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(body)
    })
    .then(response => response.json())
    .then(payment => {
    
      if (!payment.id) {
          // TODO: Handle validation or API authorization error
      }
        
      if (payment.status != 'paid') {
            session.completePayment({
              status: ApplePaySession.STATUS_FAILURE,
              errors: [
                  payment.source.message
              ]
            });
      
            return;
        }

        // TODO: Save payment to your backend and complete your business logic
        
        // Compleate payment with success
        session.completePayment({
            status: ApplePaySession.STATUS_SUCCESS
        });
    })
    .catch(error => {
        session.completePayment({
            status: ApplePaySession.STATUS_FAILURE,
            errors: [
                error.toString()
            ]
        });
    });
  };
    
  session.begin();   
}
</script>