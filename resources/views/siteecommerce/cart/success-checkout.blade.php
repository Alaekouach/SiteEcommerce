<!DOCTYPE html>
<html lang="en">
<head>
  <title>paiement réussi</title>
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

    <div class="container col-md-9 bg-white pb-5" style="position:abdolute;margin-top:70px">

        <div class="text-center" style="height:80px">
            <a href="{{ route('siteecommerce.accueil') }}"><img src="..\pictures\logo\logo.png" alt=""  style="width:140px;margin-top:12px"></a>
        </div>       
        
        <div class="container col-md-10">
            <hr>
        </div>

        <div class="container col-md-9 mt-3">

            <h5 class="mt-4 mb-4">
                <span><small><a href="{{ route('siteecommerce.accueil') }}" style="color:gray">Accueil</a></small></span>
                <span class="ml-2 mr-2">></span>
                <span style="color:gray"><small>Confirmation de votre commande</small></span>
            </h5> 

            <div class=" mb-5">
                <h5 class="text-success">Nous vous remercions de votre achat et nous espérons que vous revenez le plutôt possible:)</h5>
            </div>

            <h4 class="text-center mt-2 mb-5">Détails de votre commande N° {{ $com_id }} </h4>

            <table class="table mx-auto text-center">

                <thead>
                    <tr>
                        <th scope="col">Nom produit</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Sous Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($content as $element)
                    <tr>
                        <td scope="row">
                            {{ $element->name }}
                        </td>

                        <td scope="row">
                            {{ $element->price }}.00 Dhs
                        </td>

                        <td scope="row">
                            {{ $element->quantity }}
                        </td>

                        <td scope="row">
                            {{ $element->price * $element->quantity }}.00 Dhs
                        </td>                    
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container col-md-11 mb-3">
                <hr class="bg-warning">
            </div>

            <div class="container col-md-10 d-flex justify-content-between" >
                <p>Total des articles</p>
                <p><strong class="text-dark"> {{ $total }}.00 Dhs </strong></p>
            </div>

            <div class="container col-md-10 d-flex justify-content-between" >
                <p>Frais de livraison</p>
                <p> 45.00 Dhs </p>
            </div>

            <div class="container col-md-10 d-flex justify-content-between mb-4" >
                <p>Prix total de votre commande</p>
                <p><strong style="font-size:1.1rem"> {{ $total+45 }}.00 Dhs </strong></p>
            </div>

            <div class="container col-md-12 mb-5">
                <p style="color:grey">Nous restons bien entendu à votre disposition pour toute information.</p>
            </div>

            <a href="{{ route('siteecommerce.accueil') }}"><button type="button" class="ml-4 bg-light btn border border-success text-success ml-4 mb-3" style="font-size:0.9rem;">RETOUR A LA PAGE D'ACCUEIL</button></a>

        </div>
    </div>

</body>
</html>
