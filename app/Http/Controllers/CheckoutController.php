<?php

namespace App\Http\Controllers;
use Cart;
use DB;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {   

        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Hq7C3HoaG7Il9zURYkquyWoLjoOrHGDJJZl5YcWg4naBkxAETuiO7eiXtrDm0fRxbCQU8DcTixG63sXfk6wvsB300ob0hAetj');
                
        $total=Cart::getTotal()+45;
        $user=Auth::user()->name;
        $amount = $total;
        $amount *= 100;
        $amount = (int) $amount;


        $bdd = DB::getPdo();
        $req = $bdd->query("SHOW TABLE STATUS FROM siteecommerce LIKE 'commandes' ");
        $donnees = $req->fetch();
        $prochain_id=$donnees['Auto_increment'];

        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'MAD',
			'description' => 'Paiement effectué par : '.$user,
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('siteecommerce.cart.credit-card',compact('intent','total','prochain_id'));

    }

    public function afterPayment()
    {
        $com= new Commande;
        $com->user_id= Auth::user()->id;
        $com->prix_total= Cart::getTotal()+45;
        $com->save();

        $content=Cart::getContent();
        $total=Cart::getTotal();
        $com_id=$com->id;

        foreach($content as $element)
        {
            $com->produits()->attach($element->id);
        }

        Cart::clear();
        return view('siteecommerce.cart.success-checkout',compact('content','total','com_id'));
    }


}
