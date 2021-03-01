<!DOCTYPE html>
<html lang="en">
<head>
  <title>La page de paiement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .vl {
    border-left: 1px solid green;
    height: 260px;
    position: absolute;
    left: 39%;
    margin-left: -3px;
    top: 27%;
}
</style>

</head>
<body class="bg-secondary">
@php
    $stripe_key = 'pk_test_51Hq7C3HoaG7Il9zU7QgN8JV8cfKmtjsEnNIkvRUaHrlQHkpSIyM5AsXD4cn0kUOQ8ttRRtzuztxG8pvFB354Zu5d00YLFxc29H';
 @endphp

    <div class="container col-md-9 bg-white pb-5" style="position:abdolute;margin-top:70px">

        <div class="text-center" style="height:80px">
            <a href="{{ route('siteecommerce.accueil') }}"><img src="..\pictures\logo\logo.png" alt=""  style="width:140px;margin-top:12px"></a>
        </div>

        <div class="d-flex mt-4" >

            <div class="container col-md-4 mt-2 pt-2 bg-light border" style="height:260px">

                <u><h5 class="text-center pt-2" >Récapitulatif de paiement</h5></u>

                <h2 class="text-center pt-3 pb-3">{{ $total }}.00 Dhs</h2>

                <p><span style="color:lightslategray">Marchand : </span> BabyBioMarket.ma </p>

                <p><span style="color:lightslategray">Commande n°: </span> {{ $prochain_id }} </p>
                
            </div>

            <div class="vl"></div>

            <div class=" col-md-7 ml-5 mt-2 border">
                
                    <div class="container col-md-11  ">

                        <div class="d-flex pt-3">
                            <u><h5 class="text-center " >Détail du paiement : </h5></u>
                            <img src="..\pictures\logo\card-bank-1.jpg" alt="" style="margin-left:20px;width:170px;">
                        </div>

                        <div class=" mt-3">
                            <form action="{{route('siteecommerce.credit-card')}}"  method="post" id="payment-form">
                                @csrf                    
                                <div class="form-group">
                                    <label for="card-element"> Numéro de carte :</label>
                                    <div class="card-body border border-success">
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                        <input type="hidden" name="plan" value="" />
                                    </div>
                                </div>

                                <button id="card-button" class="btn-lg btn-success float-right mt-3 mb-4" type="submit" data-secret="{{ $intent }}" style="width:300px"> Payer Maintenant </button>
                            </form>
                        </div>
                    </div>
            
            </div>

        </div>

    </div>














    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': { color: '#aab7c4' },
                
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
    </script>

</body>
</html>