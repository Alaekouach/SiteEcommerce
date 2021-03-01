@extends('siteecommerce.profil.template-profil')

@section('content-profil')

    
        <table class="table mx-auto">

            <thead>
                <tr>
                <th scope="col">Catégories</th>
                <th scope="col">Mettre à jour</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>

            <tbody>
                @if(isset($affichercategorie)) 
                     @foreach($affichercategorie as $element) 
                    <tr>
                        <td scope="row">
                            {{ $element->intitule }}
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modification d'une catégorie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  action="{{ route('siteecommerce.modifier-categorie',[$element->id]) }}" method="post" class="container m-4 col-md-10 ">
                                        @csrf
                                        <div class="form-group " >
                                            <div class="d-flex justify-content-between">
                                                <label class="pt-1 col-md-6" for="">Modifier une catégorie </label>
                                                <input type="text" name="categorie" value= "{{ $element->intitule }}" class="col-md-6"> 
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
                                    <h5 class="modal-title" id="exampleModalLongTitle">Suppression d'une catégorie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  action="{{ route('siteecommerce.supprimer-categorie',[$element->id]) }}" method="post" class="container m-4 col-md-10 ">
                                        @csrf
                                        <div class="form-group " >
                                            <div class="d-flex justify-content-between">
                                                <p>êtes-vous sûr de vouloir supprimer la catégorie : <span class="bg-danger text-white"> " {{ $element->intitule }} "</span> </p>
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
            <form  action="{{ route('siteecommerce.ajout-categorie') }}" method="post" class="container mt-3 ml-3 col-md-10 ">
                @csrf
                <div class="form-group " >
                    <div class="d-flex justify-content-around">
                        <!-- <label class="pt-1 col-md-3 " for="">Ajouter une catégorie </label> -->
                        <input type="text" name="categorie" class=" col-md-5" placeholder="Ajouter une catégorie"> 
                        <input type="submit" name="envoyer" value="Ajouter" class="btn btn-primary col-md-2">  
                    </div>
                </div>     
            </form>
        </div>


@endsection