<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Cart;

class AuthController extends Controller
{
    //

    public function connexion()
    {
        return redirect()->route('register');
    }

    public function logout()
    {
        Auth::logout();
        Cart::clear();
        return redirect()->route('siteecommerce.accueil');
    }
}
