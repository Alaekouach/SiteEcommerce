@extends('siteecommerce.product.template-products')

@section('title')
    les produits d'une sous catégorie
@endsection


@section('entete')
    
            <h5>
                <span><small><a href="{{ route('siteecommerce.accueil') }}" style="color:gray">Accueil</a></small></span>
                <span class="ml-2 mr-2">></span>
                <span style="color:gray"><small>{{ $sscategorie->categorie->intitule }}</small></span>
                <span class="ml-2 mr-2">></span>
                <span style="color:gray"><small>{{ $sscategorie->intitule_souscategorie }}</small></span>
            </h5>
    
                                
@endsection


@section('content')

    <div class="d-flex justify-content-around flex-wrap ">
        @foreach($sscategorie->produits as $element)

            <div class="container text-center col-md-4 mt-4">
                
                <div class="container ">
                    <a href="{{ route('siteecommerce.product',[$element->id]) }}">
                        <img src="../{{ $element->photo_produit }}" alt="" style="width:180px;height:220px;">
                        <p class="container text-secondary mt-2" style="height:50px;font-size:0.9rem">{{ $element->nom_produit }}</p>
                    </a>
                </div>
                        
                <div>
                    <small class="text-dark">{{ $element->marque}}</small>
                </div>

                <div>   
                    <strong>{{ $element->prix }}.00 DH</strong>
                </div> 

                <form action="{{ route('siteecommerce.add-cart') }}" method="POST">
                @csrf
                    <input type="hidden" id="id" name="id" value="{{ $element->id }}">
                    <button type="submit" class="mt-2 btn-sm btn-success mb-5">Ajouter au panier</button>
                </form>
            </div>
        @endforeach
    </div>    
       
@endsection