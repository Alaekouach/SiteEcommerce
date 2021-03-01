<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>La page checkout</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<style>
.vl {
  border-left: 1px solid green;
  height: 450px;
  position: absolute;
  left: 59%;
  margin-left: -3px;
  top: 16%;
}
</style>
</head>

<body class="bg-secondary">

    <div class="container col-md-9 bg-white" style="position:abdolute;margin-top:70px">

        <div class="text-center" style="height:80px">
            <a href="{{ route('siteecommerce.accueil') }}"><img src="..\pictures\logo\logo.png" alt=""  style="width:140px;margin-top:12px"></a>
        </div>

        <div class="d-flex mt-4" >

            <div class="col-md-7">

                <table class="table">
                    <thead>
                        <tr style="color:lightslategray">
                            <th scope="col" class="text-center">Produit</th>
                            <th scope="col" class= "text-center ">Prix</th>
                            <th scope="col" class= "text-center ">Quantité</th>
                            <th scope="col" class= "text-center ">Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($content as $element)
                        <tr>
                            <td class="container d-flex justify-content-between  ">
                                <a href="{{ route('siteecommerce.delete-cart',[$element->id]) }}" class=""><i class="far fa-times-circle " style="font-size:25px;margin-top:39px;color:lightslategray;width:40px"></i></a>
                                <img class="" src="{{ asset($element->attributes->photo) }}" alt="" style="width:100px;height:100px">
                                <small class="text-center" style="margin-top:40px;color:gray;width:180px">{{ $element->name }}</small>
                            </td>
                            <td class="text-center " style="padding-top:47px;width:100px;font-size:0.9rem;color: olivedrab"><strong>{{ $element->price }}.00 DH</strong></td>
                            <td class="text-center d-flex " style="padding-top:47px">
                                <form id="form_submit" action="" method="POST" class="border d-flex">
                                @csrf
                                    <input type="hidden" class="produit_id" name="produit_id" value="{{$element->id}}" >
                                    <input type="hidden" class="prix" name="prix" value="{{$element->price}}" >
                                    <input type="hidden" id="pushedbutton" value="1"/>
                                    <input type="submit" class="dec btn bg-light" name="dec" value="-" onclick="document.getElementById('pushedbutton').value='-1';">
                                    <input type="text" min="1" max="99" id="{{$element->id}}" class="quantite text-center" name="quantite" value="{{ $element->quantity }}" style="width:40px" > 
                                    <input type="submit" class="inc btn bg-light " name="inc" value="+" onclick="document.getElementById('pushedbutton').value='1';" > 
                                </form>
                            </td>
                            <td class=" text-center"  style="padding-top:47px;width:100px;font-size:0.9rem;color:seagreen"><strong><span id="st{{$element->id}}">{{ $element->price * $element->quantity }}</span>.00  DH</strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <a href="{{ route('siteecommerce.all-products') }}"><button type="button" class="bg-light btn border border-success text-success ml-4 mb-3" style="font-size:0.9rem;">POURSUIVRE LES ACHATS</button></a>

            </div>

            <div class="vl"></div>

            <div class="ml-2 col-md-5">
                <table class="table">
                    <thead>
                        <tr style="color:lightslategray">
                            <th scope="col" class="">TOTAL PANIER</th>
                            <th scope="col" class= "text-center "></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td class=" " style="color:lightslategray">Sous-total</td>
                            <td class="float-right " style="font-size:0.9rem;color: olivedrab"><strong><span id="stt">{{ $soustotal }}</span>.00  DH</strong></td>
                        </tr>
                        <tr>
                            <td class=" " style="color:lightslategray">Expédition</td>
                            <td class="float-right " style="font-size:0.9rem;color: peru"><span>Livraison à domicile : </span>45.00  DH</td>
                        </tr>
                        <tr>
                            <td style="color:lightslategray">Total</td>
                            @if(Cart::isEmpty())
                            <td class="float-right " style="font-size:0.9rem;color: olivedrab"><strong>{{ $soustotal }}.00  DH</strong></td>
                            @else
                            <td  class="float-right" style="font-size:0.9rem;color: olivedrab"><strong><span id="total">{{ $total }}</span>.00  DH</strong></td>
                            @endif
                        </tr>
                        
                    </tbody>
                </table>

                <a href="{{ route('siteecommerce.checkout') }}" ><button type="button" class="container col-md-10 btn bg-success text-white mt-1 ml-5 mb-3">VALIDER LA COMMANDE</button></a>
                
                <table class="table">
                    <thead>
                        <tr style="color:lightslategray">
                            <th scope="col" class="">CODE PROMO</th>
                        </tr>
                    </thead>
                </table>

                <form action="" method="POST" class="container">
                    <input type="text" name="codepromo" placeholder="Code promo" class="container col-md-10 pl-3 pt-1 pb-1 mb-2">    
                    <button type="submit" class="btn bg-info text-white container col-md-10 mb-4" >Appliquer le code Promo</button>
                </form>

            </div>

        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/checkout.js') }}"  ></script>  

</body>
</html>






