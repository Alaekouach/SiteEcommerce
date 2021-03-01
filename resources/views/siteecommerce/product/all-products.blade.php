@extends('siteecommerce.product.template-products')

@section('title')
    Tous les produits
@endsection

@section('entete')
    
            <h5>
                <span><small><a href="{{ route('siteecommerce.accueil') }}" style="color:gray">Accueil</a></small></span>
                <span class="ml-2 mr-2">></span>
                <span style="color:gray"><small>Tous les produits</small></span>
            </h5>    
                                
@endsection

@section('content')
        <div class="d-flex justify-content-around flex-wrap">
            @foreach($afficher as $element)
                <div class="container text-center col-md-4 mt-4">
                    <div class="container ">
                        <a href="{{ route('siteecommerce.product',[$element->id]) }}">
                            <img src="{{ $element->photo_produit }}" alt="" style="width:180px;height:220px;">
                            <p class="container text-secondary mt-2 " style="font-size:0.9rem;height:50px">{{ $element->nom_produit }}</p>
                        </a>
                    </div>
                    <div>
                        <small class="text-dark" >{{ $element->marque }}</small>
                    </div>
                    <div>   
                        <strong>{{ $element->prix }}.00 DH </strong>
                    </div> 
                    <form action="{{ route('siteecommerce.add-cart') }}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $element->id }}">
                        <button type="submit" class="mt-2 btn-sm btn-success mb-5">Ajouter au panier</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="container mb-4 p-4 " style="margin-left:300px">   {{ $afficher->links() }}  </div> 


   
@endsection
