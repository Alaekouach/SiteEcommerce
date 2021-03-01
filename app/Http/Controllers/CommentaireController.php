<?php

namespace App\Http\Controllers;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    //

    public function ajout_commentaire(request $request,$id)
    {

        $add= new Commentaire;
        $add->contenu_comm=$request->commentaire;
        $add->user_id=Auth::user()->id;
        $add->produit_id=$id;
        $add->save();

        return redirect()->route('siteecommerce.product',[$id]);
    }

}
