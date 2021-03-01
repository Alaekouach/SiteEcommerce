@extends('siteecommerce.profil.template-profil')

@section('content-profil')

    
        <table class="table mx-auto text-center">

            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom produit</th>
                    <!-- <th scope="col">Description</th> -->
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Sous catégorie</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @if(isset($afficher)) 
                     @foreach($afficher as $element) 
                    <tr>
                        <td scope="row"  style="width:65px">
                            <img src="{{ $element->photo_produit }}" alt="" style="max-width:100%;max-height:100%"  >   
                        </td>

                        <td scope="row" >
                            {{ $element->nom_produit }}  
                        </td>

                        <!-- <td scope="row">
                            {{ $element->description }}   
                        </td> -->

                        <td scope="row">
                            {{ $element->prix }}  
                        </td>

                        <td scope="row">
                            {{ $element->quantite }}   
                        </td>

                        <td scope="row">
                            {{ $element->souscategorie->intitule_souscategorie }}   
                        </td>
                        
                        <td scope="row" class="d-flex justify-content-between">
                            <form method="post" action="" enctype="multipart/form-data">
                                <button type="button" class="btn-sm btn-warning" data-toggle="modal" data-target="#exampleModalmodifier{{ $element->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>
                        </td>

                        <td scope="row">
                            <form method="post" action="" enctype="multipart/form-data">
                                <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalSupprimer{{ $element->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <div class="modal fade " id="exampleModalSupprimer{{ $element->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Suppression d'un produit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  action="{{ route('siteecommerce.supprimer-product',[$element->id]) }}" method="post" enctype="multipart/form-data" class="container m-4 col-md-10 ">
                                        @csrf
                                        <div class="form-group " >
                                            <div class="d-flex justify-content-between">
                                                <p>êtes-vous sûr de vouloir supprimer le produit : <span class="bg-danger text-white"> " {{ $element->nom_produit }} "</span> </p>
                                            </div>
                                        </div>     
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <input type="submit" name="supprimer" value="Supprimer" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="modal fade bd-example-modal-lg" id="exampleModalmodifier{{ $element->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modification d'un produit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  action="{{ route('siteecommerce.modifier-product',[$element->id]) }}" method="post" enctype="multipart/form-data" class="container mt-4  ">
                                        @csrf
                                        <div class="form-group container" >
                                            <div class="d-flex justify-content-around mb-3">
                                                <label class="text-primary pt-1 container col-md-4" for="">Nom du produit </label>
                                                <input type="text" name="nom_produit" value= "{{ $element->nom_produit }}" class="container col-md-8"> 
                                            </div>
                                            <div class="d-flex justify-content-around mb-3">
                                                <label class="text-primary pt-1 container col-md-4" for="">Description du produit </label>
                                                <textarea class="ckeditor form-control" name="description" id="" cols="45" rows="2" class="container col-md-8">{{ $element->description }}</textarea>
                                            </div>
                                            <div class="d-flex justify-content-around mb-3">
                                                <label class="text-primary pt-1 container col-md-4" for="">Marque du produit </label>
                                                <input type="text" name="marque" value= "{{ $element->marque }}" class="container col-md-8"> 
                                            </div>
                                            <div class="container col-md-10 d-flex justify-content-around mb-1">
                                                <label class="text-primary pt-1 container col-md-5" for="">Prix </label>
                                                <label class="text-primary pt-1 container col-md-5" for="">Quantité </label>
                                            </div>
                                            <div class="container col-md-10 d-flex justify-content-around mb-3">
                                                <input type="number" name="prix" value= "{{ $element->prix }}" class="container col-md-5"> 
                                                <input type="number" name="quantite" value= "{{ $element->quantite }}" class="container col-md-5"> 
                                            </div>
                                            <div class="input-group   d-flex justify-content-around mb-3 " >
                                                <label class="text-primary pt-1 container col-md-4" for="">Sous catégorie </label>
                                                <select class="custom-select" id="inputGroupSelect01" name="choix" class="container col-md-8">
                                                    <option selected>Choix de la sous catégorie...</option>
                                                    @if(isset($affichersouscategorie)) 
                                                        @foreach($affichersouscategorie as $element) 
                                                            <option value="{{ $element->id }}">{{ $element->intitule_souscategorie }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-around mb-3">
                                                <label class=" text-primary pt-1 container col-md-4" for="">photo du produit </label>
                                                <input type="file" name="photo_produit" value= "{{ $element->photo_produit }}" class="  container col-md-8"> 
                                                <!-- <img class="text-center col-md-4 " src="{{ $element->photo_produit }}" alt="" style="width:70px;height:70px"> -->
                                            </div>
                                        </div>     
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <input type="submit" name="modifier" value="Modifier" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>                   

                    @endforeach 
                 @endif 
            </tbody>

        </table>

                            

        <div class="container   mt-4 mb-3">
            <button type="button" name="Ajouter" class=" btn btn-primary" data-toggle="modal" data-target="#exampleModalajouter">Ajouter un nouveau produit</button>
        </div>    
        

        <div class="modal fade bd-example-modal-lg " id="exampleModalajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ajout d'un nouveau produit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body  ">
                        <form  action="{{ route('siteecommerce.ajout-product') }}" method="post" enctype="multipart/form-data" class="container mt-4 ">
                            @csrf
                            <div class="form-group container " >
                                <div class="d-flex justify-content-around mb-3">
                                    <label class="text-primary pt-1 container col-md-4" for="">Nom du produit </label>
                                    <input type="text" name="nom_produit" value= "" class="container col-md-8"> 
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <label class="text-primary pt-1 container col-md-4" for="">Description du produit </label>
                                    <textarea  class="ckeditor form-control" name="description" id="" cols="45" rows="2" class="container col-md-8"></textarea>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <label class="text-primary pt-1 container col-md-4" for="">Marque du produit </label>
                                    <input type="text" name="marque" value= "" class="container col-md-8"> 
                                </div>
                                <div class="container col-md-10 d-flex justify-content-around mb-1">
                                    <label class="text-primary pt-1 container col-md-5" for="">Prix </label>
                                    <label class="text-primary pt-1 container col-md-5" for="">Quantité </label>
                                </div>
                                <div class="container col-md-10 d-flex justify-content-around mb-3">
                                    <input type="number" name="prix" value= "" class="container col-md-5"> 
                                    <input type="number" name="quantite" value= "" class="container col-md-5"> 
                                </div>
                                <div class="input-group d-flex justify-content-around mb-3 " >
                                    <label class="text-primary pt-1 container col-md-4" for="">Sous catégorie </label>
                                    <select class="custom-select" id="inputGroupSelect01" name="choix" class="container col-md-8">
                                        <option selected>Choix de la sous catégorie...</option>
                                        @if(isset($affichersouscategorie)) 
                                             @foreach($affichersouscategorie as $element) 
                                                <option value="{{ $element->id }}">{{ $element->intitule_souscategorie }}</option>
                                             @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="d-flex justify-content-around mb-3">
                                    <label class="text-primary pt-1 container col-md-4" for="">photo du produit </label>
                                    <input type="file" name="photo_produit" value= "" class="container col-md-8"> 
                                </div>
                            </div>     
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <input type="submit" name="ajouter" value="Ajouter" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                               
                </div>
            </div>
        </div>


@endsection