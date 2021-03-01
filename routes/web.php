<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//Route pour l'authentification 

Route::get('connexion',[
    'uses'=>'AuthController@connexion',
    'as'=> 'siteecommerce.connexion'
]);

// Route pour le logout

Route::get('logout',[
    'uses'=>'AuthController@logout',
    'as'=> 'siteecommerce.logout'
]);

// Routes pour la view d'accueil

Route::get('accueil',[
    'uses'=>'AccueilController@accueil',
    'as'=> 'siteecommerce.accueil'
]);

// Routes pour la view du product

Route::get('produit/{id}',[
    'uses'=>'ProductController@product',
    'as'=> 'siteecommerce.product'
]);

Route::get('tous-les-produits',[
    'uses'=>'ProductController@all_products',
    'as'=> 'siteecommerce.all-products'
]);

Route::get('produits-par-souscategorie/{id}',[
    'uses'=>'ProductController@products_par_souscategorie',
    'as'=> 'siteecommerce.products-par-souscategorie'
]);




// profil Catégorie
// Routes pour la view du profil administrateur

Route::get('categorie-profil',[
    'uses'=>'CategorieController@categorie_profil',
    'as'=> 'siteecommerce.categorie-profil'
]);

// Routes pour l'ajout d'une catégorie sur le profil administrateur

Route::POST('Ajout-categorie',[
    'uses'=>'CategorieController@ajout_categorie',
    'as'=> 'siteecommerce.ajout-categorie'
]);

// Routes pour modifier une catégorie sur le profil administrateur

Route::POST('Modifier-categorie/{id}',[
    'uses'=>'CategorieController@modifier_categorie',
    'as'=> 'siteecommerce.modifier-categorie'
]);


// Routes pour supprimer une catégorie sur le profil administrateur

Route::POST('Supprimer-categorie/{id}',[
    'uses'=>'CategorieController@supprimer_categorie',
    'as'=> 'siteecommerce.supprimer-categorie'
]);




// profil Sous Catégorie
// Routes pour la view du profil sous catégorie administrateur

Route::get('souscategorie-profil',[
    'uses'=>'SouscategorieController@souscategorie_profil',
    'as'=> 'siteecommerce.souscategorie-profil'
]);

// Routes pour l'ajout d'une sous catégorie sur le profil administrateur

Route::POST('Ajout-souscategorie/',[
    'uses'=>'SouscategorieController@ajout_souscategorie',
    'as'=> 'siteecommerce.ajout-souscategorie'
]);

// Routes pour modifier une sous catégorie sur le profil administrateur

Route::POST('Modifier-souscategorie/{id}',[
    'uses'=>'SouscategorieController@modifier_souscategorie',
    'as'=> 'siteecommerce.modifier-souscategorie'
]);


// Routes pour supprimer une sous catégorie sur le profil administrateur

Route::POST('Supprimer-souscategorie/{id}',[
    'uses'=>'SouscategorieController@supprimer_souscategorie',
    'as'=> 'siteecommerce.supprimer-souscategorie'
]);


// profil Product
// Routes pour la view Product du profil administrateur

Route::get('product-profil',[
    'uses'=>'ProductController@product_profil',
    'as'=> 'siteecommerce.product-profil'
]);

// Routes pour l'ajout d'un product sur le profil administrateur

Route::POST('Ajout-product/',[
    'uses'=>'ProductController@ajout_product',
    'as'=> 'siteecommerce.ajout-product'
]);

// Routes pour modifier un product sur le profil administrateur

Route::POST('Modifier-product/{id}',[
    'uses'=>'ProductController@modifier_product',
    'as'=> 'siteecommerce.modifier-product'
]);


// Routes pour supprimer un product sur le profil administrateur

Route::POST('Supprimer-product/{id}',[
    'uses'=>'ProductController@supprimer_product',
    'as'=> 'siteecommerce.supprimer-product'
]);


// PANIER
// Routes pour ajouter un product sur le panier

Route::POST('add-cart',[
    'uses'=>'CartController@store',
    'as'=> 'siteecommerce.add-cart'
]);

Route::GET('delete-cart/{id}',[
    'uses'=>'CartController@destroy',
    'as'=> 'siteecommerce.delete-cart'
]);

Route::POST('update-cart',[
    'uses'=>'CartController@update',
    'as'=> 'siteecommerce.update-cart'
]);

Route::GET('page-cart-details',[
    'uses'=>'CartController@index',
    'as'=> 'siteecommerce.cart-details'
]);

//stripe

Route::get('checkout','CheckoutController@checkout')->name('siteecommerce.checkout')->middleware('auth');
Route::post('checkout','CheckoutController@afterpayment')->name('siteecommerce.credit-card');
Route::GET('page-cart-details',[
    'uses'=>'CartController@index',
    'as'=> 'siteecommerce.cart-details'
]);


//Commentaires

Route::POST('ajout-commentaire/{id}',[
    'uses'=>'CommentaireController@ajout_commentaire',
    'as'=> 'siteecommerce.ajout-commentaire'
])->middleware('auth');

