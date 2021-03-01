<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Commentaire;
use DB;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //

    public function accueil()
    {
        //$afficherproduits=Produit::take(8)->get();
        $afficherproduits = DB::table('produits')->inRandomOrder()->limit(8)->get();
        $commentaires=Commentaire::all();
        $affichecategorie=Categorie::all();
        return view ('siteecommerce.accueil')->with(['afficherproduits'=>$afficherproduits,'affichercategorie'=>$affichecategorie,'commentaires'=>$commentaires]);
        
    }


    
}
