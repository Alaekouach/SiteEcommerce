<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Categorie;
use Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $affichecategorie=Categorie::all();
        $content=Cart::getContent();
        $soustotal=Cart::getTotal();
        $total=Cart::getTotal()+45;
        return view('siteecommerce.cart.cart-details',compact('content','soustotal','total'))->with(['affichercategorie'=>$affichecategorie]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         
        $product = Produit::find($request->id);

            if(isset($request->quantite))
            {
                $request->quantite=$request->quantite;
            }
            else{
                $request->quantite=1;
            }

        $panier=Cart::add([
            'id' => $product->id,
            'name' => $product->nom_produit,
            'price' => $product->prix,
            'quantity' => $request->quantite,
            'attributes' => [
                'photo' => $product->photo_produit ,
            ],
            'associatedModel' => $product,
          ]
        );      

           // Cart::clear();
        //dd(Cart::getContent());
        return redirect()->back()->with('cart', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $qte= $request->pushedbutton + $request->quantite;
        $st= $qte * $request->prix ;
        
    
        if($qte>0)
        {
            Cart::update($request->produit_id, [
                'quantity' => ['relative' => false, 'value' => $qte],
            ]);

            $stt=Cart::getSubTotal();
            $total= $stt + 45;
        }

        return response()->json(['qte'=> $qte,'st'=> $st,'stt'=> $stt,'total'=> $total]);     


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        Cart::remove($id);
        return redirect(route('siteecommerce.cart-details'));
    }
}
