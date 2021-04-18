@extends('siteecommerce.template-accueil')

@section('title')
    Produit
@endsection
                               


@section('content')


<!-- mobile-->
<div class="bg-white mob">

    <div class="container col-md-8 pt-2">
        <h6 style="font-size:0.85rem">
            <span><small><a href="{{ route('siteecommerce.accueil') }}" style="color:gray">Accueil</a></small></span>
            <span class="ml-2 mr-2">></span>
            <span style="color:gray"><small>{{ $sscategorie->categorie->intitule }}</small></span>
            <span class="ml-2 mr-2">></span>
            <span style="color:gray"><small>{{ $sscategorie->intitule_souscategorie }}</small></span>
        </h6>
    </div>
    
    <div class="container col-md-8">

        <div class="text-center mt-5 mb-1 ">
            <img src="../{{ $produit->photo_produit }}" alt="" style="max-width:50%;max-height:50%" >
        </div>

        <div class="container col-md-10 mt-3 mb-3 ">

            <div>
                <p><small>Marque : <span style="color:mediumseagreen"> Babybio </span></small></p>
            </div>
            <div>
                <h6 style="font-size:0.85rem">{{ $produit->nom_produit}}</h6>
            </div>
            <hr>
            <div class="col-md-9 d-flex justify-content-between">
                <div style="font-size:0.85rem">
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <label for="" style="font-size:0.75rem">({{ $produit->commentaires->count() }})</label>
                </div>
            
                <h5 style="font-size:0.98rem">{{ $produit->prix}}.00 <span class="ml-1" style="font-size:0.7rem;position:absolute">DH</span></h5>
            </div>
            <div class="mt-3">
                <p class="text-secondary" style="font-size:0.85rem">La livraison est estimée de 5 jours</p>
            </div>
            <div class="mt-3">
                <form action="{{ route('siteecommerce.add-cart') }}" method="POST">
                @csrf
                    <input type="hidden" id="id" name="id" value="{{ $produit->id }}">
                    <input type="number" min="1" max="99" name="quantite" value="1" style="width:30px;height:30px;font-size:0.85rem" class="pl-2 mr-3 ml-3">
                    <button class="btn-sm btn-success" >Ajouter au panier</button>
                </form>
            </div>
            <div class="container mt-4 p-3 col-md-9 border border-secondary text-center" style="font-size:0.83rem">
                <label>La livraison à RABAT et CASABLANCA est gratuite.</label>
                <label>La livraison pour tout le MAROC via AMANA à 45dhs.</label>
            </div>
        </div>
    </div>

    <div class="container col-md-8">
        
        <div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="font-size:0.8rem">
                    <a class="nav-item nav-link active " id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-description" aria-selected="true" >Description</a>
                    <a class="nav-item nav-link" id="nav-avis-tab" data-toggle="tab" href="#nav-avis" role="tab" aria-controls="nav-avis" aria-selected="false">Avis ({{ $produit->commentaires->count() }}) </a>
                </div>
            </nav>
            <div class="tab-content col-md-10" id="nav-tabContent" style="font-size:0.83rem">
                <div class="tab-pane fade show active pl-2" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" >
                    <p>
                         {{ $produit->description }}
                    </p>
                </div>
                <div class="tab-pane fade" id="nav-avis" role="tabpanel" aria-labelledby="nav-avis-tab">
                   
                    <div class="mt-2 ">
                        @if(isset($produit->commentaires) )
                            @foreach($produit->commentaires as $comm)
                                <div >
                                    <strong style="font-size:0.85rem">{{ $comm->user->name }}</strong><br>
                                    <small  style="font-size:0.7rem;color:cadetblue">{{ $comm->created_at}}</small>
                                    <p class="pt-2 container col-md-10 " style="font-size:0.85rem;color:darkslategray;">{{ $comm->contenu_comm }}</p> 
                                </div>
                            @endforeach
                        @endif
                    </div>

                    
                    <form action="{{ route('siteecommerce.ajout-commentaire',[$produit->id]) }}" method="POST" class="container pt-3">
                        @csrf
                        <textarea name="commentaire" id="" cols="45" rows="4" placeholder="Entrez votre commentaire..." class="p-1 border" ></textarea>
                        <button type="submit"  class="btn-sm btn-light float-right border">Ajouter un commentaire</button>
                    </form>
                                      
                </div>
            </div>

        </div>

        <div class="mt-5">
            <hr>
        </div>
        
        <div>
            <h6 style="font-size:0.95rem" class="text-center text-secondary pt-2">VOUS AIMEREZ PEUT-ÊTRE AUSSI…</h6>
        </div>

        <div class="pb-4">
            <div class="container d-flex justify-content-around">
                @foreach($afficherproduitssimilaire as $element)
                    <figure class="container text-center mt-3 ">
                        <a href="{{ route('siteecommerce.product',[$element->id]) }}"><img src="../{{ $element->photo_produit }}" alt="" style="width:130px;height:150px">
                        <figcaption class="mt-2" style="font-size:0.8rem">{{ $element->nom_produit }}</figcaption></a>
                        <figcaption class="mb-3" ><small style="font-size:0.85rem">{{ $element->marque }}</small></figcaption>
                        <figcaption class="mb-1"><strong style="font-size:0.85rem">{{ $element->prix }}.00 DH</strong></figcaption>
                        <form action="{{ route('siteecommerce.add-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ $element->id }}">
                            <button type="submit" class="mt-2 btn-sm btn-success mb-5" style="font-size:0.8rem">Ajouter au panier</button>
                        </form>
                    </figure>
                @endforeach
            </div>
        </div>

    </div>
</div>



<!-- DESKTOP-->
<div class="bg-white desk">

    <div class="container col-md-8 pt-5">
        <h5 >
            <span><small><a href="{{ route('siteecommerce.accueil') }}" style="color:gray">Accueil</a></small></span>
            <span class="ml-2 mr-2">></span>
            <span style="color:gray"><small>{{ $sscategorie->categorie->intitule }}</small></span>
            <span class="ml-2 mr-2">></span>
            <span style="color:gray"><small>{{ $sscategorie->intitule_souscategorie }}</small></span>
        </h5>
    </div>
    
    <div class="container col-md-8 d-flex ">

        <div class="col-md-5 mt-2 mb-5 ">
            <img src="../{{ $produit->photo_produit }}" alt="" style="max-width:100%;max-height:100%" >
        </div>

        <div class="container col-md-7 mt-2 mb-5 pt-5 pl-5 ">

            <div>
                <p><small>Marque : <span class="text-secondary"> Babybio </span></small></p>
            </div>
            <div>
                <h4>{{ $produit->nom_produit}}</h4>
            </div>
            <div class="col-md-2">
                <hr>
            </div>
            <div>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <i class="fas fa-star text-warning"></i>
                <label for="">({{ $produit->commentaires->count() }})</label>
            </div>
            <div>
                <h2>{{ $produit->prix}}.00 <span class="ml-1" style="font-size:1.1rem;position:absolute">DH</span></h2>
            </div>
            <div>
                <p class="text-secondary">Livraison prévue entre le mardi 10 novembre et le mercredi 11 novembre</p>
            </div>
            <div>
                <form action="{{ route('siteecommerce.add-cart') }}" method="POST">
                @csrf
                    <input type="hidden" id="id" name="id" value="{{ $produit->id }}">
                    <input type="number" min="1" max="99" name="quantite" value="1" style="width:60px;height:36px;font-size:1.2rem" class="mr-3 pl-3">
                    <button class="btn btn-success mt-n1">Ajouter au panier</button>
                </form>
            </div>
            <div class="container mt-4 p-3 col-md-9 border border-secondary text-center">
                <label>La livraison à RABAT et CASABLANCA est gratuite.</label>
                <label>La livraison pour tout le MAROC via AMANA à 45dhs.</label>
            </div>
        </div>
    </div>

    <div class="container col-md-8 ">
        
        <div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active " id="nav-description-tab" data-toggle="tab" href="#nav-description1" role="tab" aria-controls="nav-description" aria-selected="true" >Description</a>
                    <a class="nav-item nav-link" id="nav-avis-tab" data-toggle="tab" href="#nav-avis1" role="tab" aria-controls="nav-avis" aria-selected="false">Avis ({{ $produit->commentaires->count() }}) </a>
                </div>
            </nav>
            <div class="tab-content col-md-10 p-3  " id="nav-tabContent">
                <div class="tab-pane fade show active pl-2" id="nav-description1" role="tabpanel" aria-labelledby="nav-description-tab">
                    <p class="">
                         {{ $produit->description }}
                    </p>
                </div>
                <div class="tab-pane fade " id="nav-avis1" role="tabpanel" aria-labelledby="nav-avis-tab">
                   
                    <div>
                        @if(isset($produit->commentaires) )
                            @foreach($produit->commentaires as $comm)
                                <div class=" " >
                                    <p class=" ml-2 " style=""><small class=" font-weight-bold">{{ $comm->user->name }} / {{ $comm->created_at }}</small> </p>
                                    <p class="col-md-10 " style=" color:darkslategray">{{ $comm->contenu_comm }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="container pt-3" >
                        <form action="{{ route('siteecommerce.ajout-commentaire',[$produit->id]) }}" method="POST">
                            @csrf
                            <textarea name="commentaire" id="" cols="100" rows="4" placeholder="Entrez votre commentaire..." class="p-3 ml-3 border" ></textarea>
                            <button type="submit"  class="btn-sm btn-light float-right border mr-5">Ajouter un commentaire</button>
                        </form>
                    </div>                   
                </div>
            </div>

        </div>

        <div class="mt-5">
            <hr>
        </div>
        
        <div>
            <h4 class="text-secondary pt-2">VOUS AIMEREZ PEUT-ÊTRE AUSSI…</h4>
        </div>

        <div class="pb-4">
            <div class="container d-flex justify-content-around">
                @foreach($afficherproduitssimilaire as $element)
                    <figure class="col-md-3 text-center mt-3 ">
                        <a href="{{ route('siteecommerce.product',[$element->id]) }}"><img src="../{{ $element->photo_produit }}" alt="" style="width:160px;height:200px">
                        <figcaption class="mt-2" >{{ $element->nom_produit }}</figcaption></a>
                        <figcaption class="mb-3"><small>{{ $element->marque }}</small></figcaption>
                        <figcaption class="mb-1"><strong>{{ $element->prix }}.00 DH</strong></figcaption>
                        <form action="{{ route('siteecommerce.add-cart') }}" method="POST">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ $element->id }}">
                            <button type="submit" class="mt-2 btn-sm btn-success mb-5">Ajouter au panier</button>
                        </form>
                    </figure>
                @endforeach
            </div>
        </div>

    </div>
</div>



@endsection