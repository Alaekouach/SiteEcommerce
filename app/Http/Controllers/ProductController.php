<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use DB;
use App\Models\Souscategorie;
use App\Models\Categorie;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function product($id)
    {
        $produit=Produit::find($id);

        $produit_similaire=Produit::find($id)->souscategorie->id;
        $afficherproduitssimilaire=Produit::where('souscategorie_id',$produit_similaire)->take(4)->get();
        $sscategorie=Produit::find($id)->souscategorie;
        $affichecategorie=Categorie::all();

        return view ('siteecommerce.product.product')->with(['produit'=>$produit,'sscategorie'=>$sscategorie,'affichercategorie'=>$affichecategorie,'afficherproduitssimilaire'=>$afficherproduitssimilaire]);
    }


    public function all_products()
    {
        //$afficheallproducts=Produit::all();
        
        $afficheallproducts = DB::table('produits')->simplePaginate(9);

        $affichecategorie=Categorie::all();
        return view ('siteecommerce.product.all-products')->with(['afficher'=>$afficheallproducts,'affichercategorie'=>$affichecategorie]);
    }


    public function products_par_souscategorie($id)
    {
        
        $sscategorie=Souscategorie::find($id);
        $affichecategorie=Categorie::all();

        return view ('siteecommerce.product.product-par-souscategorie')->with(['sscategorie'=>$sscategorie,'affichercategorie'=>$affichecategorie]);
    }


   

    public function product_profil()
    {
        $afficheproduct=Produit::all();
        $affichesouscategorie=Souscategorie::all();
        $affichecategorie=Categorie::all();
        return view ('siteecommerce.profil.product-profil')->with(['afficher'=>$afficheproduct,'affichersouscategorie'=>$affichesouscategorie,'affichercategorie'=>$affichecategorie]);
    }


    public function ajout_product(Request $request)
    {

        $p=new Produit;

        
        if(isset($request->nom_produit)){
            $p->nom_produit=$request->nom_produit; 
        }else{
             $p->nom_produit='NULL'; 
        }     

        if(isset($request->description)){
            $p->description=$request->description; 
        }else{
            $p->description='NULL'; 
        }   

        if(isset($request->marque)){
            $p->marque=$request->marque; 
        }else{
            $p->marque='NULL'; 
        }   

        if(isset($request->prix)){
            $p->prix=$request->prix;
        }else{
            $p->prix=0; 
        } 
        
        if(isset($request->quantite)){
            $p->quantite=$request->quantite;
        }else{
            $p->quantite=0; 
        }

        if($request->choix=='Choix de la sous catégorie...'){
            $p->souscategorie_id=1; 
        }else{
            $p->souscategorie_id=$request->choix;
        }


        if(isset($request->photo_produit))
        {
            $original_name =  $request->photo_produit->getClientOriginalName();
            $filename =  pathinfo($original_name,PATHINFO_FILENAME); 
            $extension =  $request->photo_produit->getClientOriginalExtension(); 
            $filename_store = $filename.time().'.'.$extension;
            $request->photo_produit->move('pictures/produits', $filename_store);

            $p->photo_produit='pictures/produits/'.$filename_store;
        }
        else{
            $p->photo_produit='NULL';
        }

        $p->save();
            
        return redirect()->route('siteecommerce.product-profil');
    }


    public function modifier_product(Request $request,$id)
    {

        $p=Produit::find($id);
            
        $p->nom_produit=$request->nom_produit;
        $p->description=$request->description;
        $p->marque=$request->marque;
        $p->prix=$request->prix;
        $p->quantite=$request->quantite;

        if($request->choix=='Choix de la sous catégorie...'){
            $p->souscategorie_id=$p->souscategorie_id;
        }
        else{
            $p->souscategorie_id=$request->choix;
        }

        if(isset($request->photo_produit))
        {
            $original_name =  $request->photo_produit->getClientOriginalName();
            $filename =  pathinfo($original_name,PATHINFO_FILENAME); 
            $extension =  $request->photo_produit->getClientOriginalExtension(); 
            $filename_store = $filename.time().'.'.$extension;
            $request->photo_produit->move('pictures/produits', $filename_store);

            $p->photo_produit='pictures/produits/'.$filename_store;

        }
        else
        {
            $p->photo_produit=$p->photo_produit;
        }

        $p->save();
            
        return redirect()->route('siteecommerce.product-profil');
    }


    public function supprimer_product(Request $request,$id)
    {

        $p=Produit::find($id);

        $p->delete();
            
        return redirect()->route('siteecommerce.product-profil');
    }









}
