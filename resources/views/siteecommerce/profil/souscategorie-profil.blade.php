@extends('siteecommerce.profil.template-profil')

@section('content-profil')

    
        <table class="table mx-auto">

            <thead>
                <tr>
                <th scope="col">Catégories</th>
                <th scope="col">Sous Catégories</th>
                <th scope="col">Mettre à jour</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>

            <tbody>
                @if(isset($afficher)) 
                     @foreach($afficher as $element) 
                    <tr>
                        <td scope="row">
                            {{ $element->categorie->intitule  }}
                        </td>

                        <td scope="row">
                            {{ $element->intitule_souscategorie }}
                        </td>
                        
                        <td>
                            <form method="get" action="" enctype="multipart/form-data">
                                <button type="button" class="btn-sm btn-warning" data-toggle="modal" data-target="#exampleModalmodifier{{ $element->id }}">
                                    Modifier
                                </button>
                            </form>
                        </td>

                        <td>
                            <form method="get" action="" enctype="multipart/form-data">
                                <button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalsupprimer{{ $element->id }}">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>


                    <div class="modal fade" id="exampleModalmodifier{{ $element->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modification d'une Sous catégorie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  action="{{ route('siteecommerce.modifier-souscategorie',[$element->id]) }}" method="post" class="container m-4 col-md-10 ">
                                        @csrf
                                        <div class="form-group " >
                                            <div class="d-flex justify-content-between">
                                                <label class="pt-1 col-md-6 " for="">Modifier une sous catégorie </label>
                                                <input type="text" name="souscategorie" value= "{{ $element->intitule_souscategorie }}" class="col-md-6 " style="100%"> 
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

                    <div class="modal fade" id="exampleModalsupprimer{{ $element->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Suppression d'une Sous catégorie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  action="{{ route('siteecommerce.supprimer-souscategorie',[$element->id]) }}" method="post" class="container m-4 col-md-10 ">
                                        @csrf
                                        <div class="form-group " >
                                            <div class="d-flex justify-content-between">
                                                <p>êtes-vous sûr de vouloir supprimer la sous catégorie : <span class="bg-danger text-white"> " {{ $element->intitule_souscategorie }} "</span> </p>
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

                    @endforeach 
                 @endif 
            </tbody>

        </table>

        <div class="border mt-4 mb-3">
            <form  action="{{ route('siteecommerce.ajout-souscategorie') }}" method="post" class="container mt-4 ml-2 col-md-12 ">
                @csrf
                <div class="form-group " >
                    <div class="d-flex justify-content-between">
                        <div class="col-md-6 ">
                            <input type="text" name="souscategorie" placeholder="Ajouter une Sous catégorie" style="width:100%"  > 
                        </div>
                        <div class="input-group col-md-4 mb-3 " >
                            <select class="custom-select" id="inputGroupSelect01" name="choix">
                                <option selected>Choix d'une catégorie...</option>
                                @if(isset($affichercategorie)) 
                                    @foreach($affichercategorie as $element) 
                                        <option value="{{ $element->id }}">{{ $element->intitule }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3 ">
                            <input type="submit" name="envoyer" value="Ajouter" class="btn-sm btn-primary">  
                        </div>
                    </div>
                </div>     
            </form>
        </div>


@endsection