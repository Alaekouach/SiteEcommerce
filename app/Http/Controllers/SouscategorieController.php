<?php

namespace App\Http\Controllers;

use App\Models\Souscategorie;
use App\Models\Categorie;
use Illuminate\Http\Request;

class SouscategorieController extends Controller
{
    //


    public function souscategorie_profil()
    {
        $affichesouscategorie=Souscategorie::all();
        $affichecategorie=Categorie::all();
        return view ('siteecommerce.profil.souscategorie-profil')->with(['afficher'=>$affichesouscategorie,'affichercategorie'=>$affichecategorie]);
    }


    public function ajout_souscategorie(Request $request)
    {

        $sc=new Souscategorie;
            
        $sc->intitule_souscategorie=$request->souscategorie;
        $sc->categorie_id=$request->choix;
        $sc->save();
            
        return redirect()->route('siteecommerce.souscategorie-profil');
    }


    public function modifier_souscategorie(Request $request,$id)
    {

        $sc=Souscategorie::find($id);
            
        $sc->intitule_souscategorie=$request->souscategorie;
        $sc->save();
            
        return redirect()->route('siteecommerce.souscategorie-profil');
    }


    public function supprimer_souscategorie(Request $request,$id)
    {

        $sc=Souscategorie::find($id);

        $sc->delete();
            
        return redirect()->route('siteecommerce.souscategorie-profil');
    }


}
