@extends('siteecommerce.template-accueil')

@section('title')
    Accueil
@endsection

@section('content')
  

    <div class="container col-md-8 ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 " src="\pictures\slide\IMG-1.jpg" alt="First slide" style="height:400px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="\pictures\slide\IMG-2.jpg" alt="Second slide" style="height:400px">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="\pictures\slide\IMG-3.jpg" alt="Third slide" style="height:400px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="bg-white ">
        <div class="container col-md-10 ">

            <div class="pt-5 mt-5 mb-4">
                <h5 class="hr">NOS MARQUES BIO ET NATURELLES</h5>
            </div>

            <div id="gallery" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner container col-md-11">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3 text-center " >
                                <img src="\pictures\marques\alphanova.jpg" alt="" class=" img-thumbnail border-0" style="height:150px">
                            </div>
                            <div class="col-md-3 text-center " >
                                <img src="\pictures\marques\ovo.png" alt="" class="mt-3 img-thumbnail border-0" style="height:150px" >
                            </div>
                            <div class="col-md-3 text-center " >
                                <img src="\pictures\marques\gilbert.png" alt="" class=" img-thumbnail border-0" style="height:150px">
                            </div>
                            <div class="col-md-3 text-center " >
                                <img src="\pictures\marques\hipp.png" alt="" class=" img-thumbnail border-0" style="height:150px">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item ">
                        <div class="row">
                        <div class="col-md-3 text-center " >
                                <img src="\pictures\marques\camilia.png" alt="" class=" img-thumbnail border-0" style="height:150px">
                            </div>
                            <div class="col-md-3 text-center " >
                                <img src="\pictures\marques\pranarom.jpg" alt="" class=" img-thumbnail border-0" style="height:150px">
                            </div>
                            <div class="col-md-3 text-center " >
                                <img src="\pictures\marques\weleda.jpg" alt="" class=" img-thumbnail border-0" style="height:150px">
                            </div>
                            <div class="col-md-3 text-center " >
                                <img src="\pictures\marques\biogaia.jpg" alt="" class=" img-thumbnail border-0" style="height:150px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-2">
                <h5 class="hr">NOS MEILLEURES VENTES DU MOIS</h5>
            </div>

            <div class="container d-flex justify-content-around flex-wrap" >
                @foreach($afficherproduits as $element)
                <figure class="col-md-3 text-center mt-5 " >
                   <a href="{{ route('siteecommerce.product',[$element->id]) }}"><img src="{{ $element->photo_produit }}" alt="" style="width:160px;height:220px">
                    <figcaption class="mt-2">{{ $element->nom_produit }}</figcaption></a>
                    <figcaption class="mb-2"><small>{{ $element->marque }}</small></figcaption>
                    <figcaption class="mb-1"><strong>{{ $element->prix }}.00 DH</strong></figcaption>
                    <form action="{{ route('siteecommerce.add-cart') }}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $element->id }}">
                        <button type="submit" class="btn-sm btn-success">Ajouter au panier</button>
                    </form>
                </figure>
                @endforeach
            </div>


            <div class=" container text-center mt-3 mb-4  ">
                <a href="{{ route('siteecommerce.all-products') }}"><u><p class=" pt-2 text-primary">Afficher tous les produits</p></u></a>
            </div>


            <div class="mt-5 mb-4">
                <h5 class="hr">AVIS DE NOS CHERS CLIENT(E)S</h5>
            </div>

            <div id="gallery1" class="carousel slide bg-light pt-4 pb-4" data-ride="carousel">

                <div class="carousel-inner container col-md-6 ">

                    <div class="carousel-item active ">
                        <div class="container mt-4 pb-3">
                            <div class="col-md-12">   
                                <p class=""><strong>{{ $commentaires[0]->user->name }}</strong><small style=" color:darkslategray"> / {{ $commentaires[0]->created_at }}</small> </p>
                                <p class="pl-1 " style="color:darkslategray">{{ $commentaires[0]->contenu_comm }}</p> 
                            </div>
                        </div>
                    </div>

                    @if(isset($commentaires) )
                        @foreach($commentaires as $comm)
                        <div class="carousel-item ">
                            <div class="container mt-4 pb-3">
                                <div class="col-md-12 " >
                                    <p class=""><strong>{{ $comm->user->name }}</strong><small style=" color:darkslategray"> / {{ $comm->created_at}}</small> </p>
                                    <p class=" pl-1" style="color:darkslategray">{{ $comm->contenu_comm }}</p> 
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                </div>
            
               
                <a class="carousel-control-prev" href="#gallery1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    <span class="sr-only ">Previous</span>
                </a>

                <a class="carousel-control-next" href="#gallery1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
              

            </div>

            

            <div class="mt-4 pb-4">
                <h5 class="hr">CONSEILS ET ASTUCES TRES UTILES</h5>
            </div>

            <div class="d-flex justify-content-around mt-4 pb-3 ">
                <div class="card bg-light" style="width: 18rem;">
                    <img class="card-img-top" src="\pictures\conseils&astuce\1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">titre du conseil 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card bg-light" style="width: 18rem;">
                    <img class="card-img-top" src="\pictures\conseils&astuce\2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">titre du conseil 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card bg-light" style="width: 18rem;">
                    <img class="card-img-top" src="\pictures\conseils&astuce\3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">titre du conseil 3</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card bg-light" style="width: 18rem;">
                    <img class="card-img-top" src="\pictures\conseils&astuce\4.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">titre du conseil 4</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
           
            <div class=" container col-md-3 text-center pb-3 ">
                <a href=""><u><p>Afficher plus de conseils</p></u></a>
            </div>


        </div>
    </div>
        
    

@endsection