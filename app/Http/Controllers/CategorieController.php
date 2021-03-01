<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;

class CategorieController extends Controller
{
    //


    public function categorie_profil()
    {
        $affichecategorie=Categorie::all();
        return view ('siteecommerce.profil.categorie-profil')->with('affichercategorie',$affichecategorie);
    }


    public function ajout_categorie(Request $request)
    {

        $c=new Categorie;
            
        $c->intitule=$request->categorie;
        $c->save();
            
        return redirect()->route('siteecommerce.categorie-profil');
    }


    public function modifier_categorie(Request $request,$id)
    {

        $c=Categorie::find($id);
            
        $c->intitule=$request->categorie;
        $c->save();
            
        return redirect()->route('siteecommerce.categorie-profil');
    }


    public function supprimer_categorie(Request $request,$id)
    {

        $c=Categorie::find($id);

        $c->delete();
            
        return redirect()->route('siteecommerce.categorie-profil');
    }


}
