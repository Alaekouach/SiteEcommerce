<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style-template-accueil.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">


<style>
    .vl {
        border-left: 1px solid green;
        height: 360px;
        position: absolute;
        left: 50%;
        margin-left: -3px;
        top: 3%;
    }
</style>

</head>

<body style="overflow-x: hidden; ">
   <header class="fixed-top">


        <!-- mobile-->
        <div class="mob">

            <nav class="navbar-dark bg-white d-flex">

                <div class=" col-md-1 pt-3">
                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">  
                        <span class="navbar-toggler-icon bg-success"></span>
                    </button>
                </div> 


                <div class="col-md-3  ml-n5 pt-1">
                    <a href="{{ route('siteecommerce.accueil') }}" class=""><img src="\pictures\logo\logo.png" alt="" style="width:100%;"></a>
                </div>
                <div class="text-center col-md-6 d-flex justify-content-around" >
                    <div class="pt-3">
                        <a href="{{ route('siteecommerce.cart-details') }}" class="">
                            <i class="fas fa-shopping-cart text-success pr-1" style="font-size:28px"></i>
                            
                            <div class="text-white text-bold rounded-circle" style="width:20px;height:20px;position:absolute;font-size:0.9rem;margin-left:18px;margin-top:-31px">{{ $cartCount }}</div>
                            
                            <p class="text-secondary" style="font-size:0.7rem;"><strong>{{Cart::getSubTotal()}}.00 DH </strong></p>
                        </a>
                    </div>
                    <div class="pt-2">
                            @if(Auth::user())
                                @if(Auth::user()->email=='alae.kouach@gmail.com')
                                    <button type="button" class="btn text-success dropdown-toggle btn-sm " style="font-size:1.5rem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></button>        
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('siteecommerce.categorie-profil') }}">Administrateur</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('siteecommerce.logout') }}">Se Déconnecter</a>
                                    </div>
                                @else
                                <button type="button" class="btn text-success dropdown-toggle btn-sm" style="font-size:1.5rem" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></button>        
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Profil user</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('siteecommerce.logout') }}">Se Déconnecter</a>
                                    </div>
                                @endif
                            @else
                                <!-- Button trigger modal -->
                                <button type="button" class="btn text-success btn-sm" style="font-size:1.5rem" data-toggle="modal" data-target="#exampleModal-login">
                                    <i class="fas fa-user"></i>
                                </button>  
                            @endif
                    </div>
                        
                </div>


            </nav>


            <!-- modal pour le menu toggle-->
		    <div class="collapse bg-white" id="navbarToggleExternalContent">              

            </div>


            <!-- <div class="col-md-12 " style="background-color:rgb(241,241,241);">
                <div class="container col-md-8  ">
                    <nav class="  navbar navbar-expand-lg navbar-light ">                
                        <div class="container collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="container navbar-nav "> 
                            @foreach($affichercategorie as $cat)    
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$cat->intitule}}
                                    </a>
                                    <div class="dropdown-menu fade-up" aria-labelledby="navbarDropdownMenuLink" style="box-shadow:2px 2px 8px lightgray;">
                                        @foreach($cat->souscategories as $souscat)
                                            <a class="dropdown-item text-secondary text-uppercase" href="{{ route('siteecommerce.products-par-souscategorie',[$souscat->id]) }}">{{$souscat->intitule_souscategorie}}</a> 
                                            <hr class="container col-md-8">
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div> -->

        </div>

        


       

        <!-- desktop-->
        <div class="desk">
            <div class="bg-white col-md-12">
                <div class="container col-md-9 d-flex " style="height:80px">
                    <div class="col-md-2 text-center ">
                        <a href="{{ route('siteecommerce.accueil') }}"><img src="\pictures\logo\logo.png" class="" alt="" style="max-width:100%;max-height:100%"></a>
                    </div>
                    <div class="container col-md-3 pt-3 ">
                        <i class="fas fa-search" style="position:absolute;margin-top:18px;margin-left:15px;color:gray"></i>
                        <input class="form-control mr-sm-2 font-italic mt-2 pl-5" type="search" placeholder="Recherche des produits..." style="font-size:0.9rem;width:300px" aria-label="Search">
                    </div>
                    <div class=" col-md-4 mt-4 ">
                        @if(Auth::user())
                            @if(Auth::user()->email=='alae.kouach@gmail.com')
                            <button type="button" class="btn border-success dropdown-toggle btn-sm float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrateur connecté</button>        
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('siteecommerce.categorie-profil') }}">Profil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('siteecommerce.logout') }}">Se déconnecter</a>
                                </div>
                            @else
                            <button type="button" class="btn border-success dropdown-toggle btn-sm float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Membre connecté</button>        
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Profil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('siteecommerce.logout') }}">Se déconnecter</a>
                                </div>
                            @endif
                        @else
                            <!-- Button trigger modal desk-->
                            <button type="button" class="btn border-success btn-sm float-right" data-toggle="modal" data-target="#exampleModal-desk">
                                Se connecter / S'enregistrer
                            </button>  
                        @endif
                    </div>

                    <div class="container text-center col-md-2 mt-2  " >
                        <a href="{{ route('siteecommerce.cart-details') }}" class="">
                            <i class="fas fa-shopping-cart text-success  pt-1" style="font-size:33px"></i>
                            <div class="text-white text-bold rounded-circle" style="width:20px;height:20px;position:absolute;font-size:1rem;margin-left:93px;margin-top:-35px">{{ $cartCount }}</div>
                            <p class="text-secondary pt-1" style="font-size:0.8rem;"><strong>{{Cart::getSubTotal()}}.00 DH </strong></p>
                        </a>
                    </div>

                </div>
            </div>



            <div class="col-md-12 " style="background-color:rgb(241,241,241);">
                <div class="container col-md-8  ">
                    <nav class=" navbar navbar-expand-lg navbar-light ">                
                        <div class="container collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="container navbar-nav "> 
                            @foreach($affichercategorie as $cat)    
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$cat->intitule}}
                                    </a>
                                    <div class="dropdown-menu fade-up" aria-labelledby="navbarDropdownMenuLink" style="box-shadow:2px 2px 8px lightgray;">
                                        @foreach($cat->souscategories as $souscat)
                                            <a class="dropdown-item text-secondary text-uppercase" href="{{ route('siteecommerce.products-par-souscategorie',[$souscat->id]) }}">{{$souscat->intitule_souscategorie}}</a> 
                                            <hr class="container col-md-8">
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

        </div>

    </header>




    <!--Modal mobile -->
    <div class="modal fade" id="exampleModal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" >
                    <div class=" modal-content bg-light" style="width:270px">  
                        <div class="modal-header">
                            <div class="col-md-12">
                                <h6 class="modal-title col-md-6 text-center" id="exampleModalLabel">SE CONNECTER</h6>
                            </div>
                        </div>

                        <div class="modal-body ">
                             
                                <div class="container col-md-10 ">
                                    <form method="POST" action="{{ route('login') }}" class="mt-2" >
                                    @csrf

                                        <div>
                                            <x-jet-label for="email" value="Adresse de messagerie *" class="pb-1 mb-1" />
                                            <br>
                                            <x-jet-input id="email" class="block  col-md-10" type="email" name="email" :value="old('email')" required autofocus />
                                        </div>

                                        <div class="mt-2">
                                            <x-jet-label for="password" value="Mot de passe *" class="pb-1 mb-1" />
                                            <br>
                                            <x-jet-input id="password" class="block  col-md-10" type="password" name="password" required autocomplete="current-password" />
                                        </div>

                                        <div class="block mt-2">
                                            <label for="remember_me" class="flex items-center">
                                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                                <span class="ml-2 text-sm text-gray-600"> Se souvenir de moi</span>
                                            </label>
                                        </div>

                                        <div class=" mt-1 mb-2  ">
                                            <x-jet-button class="btn btn-sm btn-primary ml-5 mb-4">
                                                SE CONNECTER
                                            </x-jet-button>
                                            <br>
                                            @if (Route::has('password.request'))                                                
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-2" href="{{ route('password.request') }}">
                                                        Mot de passe perdu ?
                                                    </a>                                               
                                            @endif
                                            <br>
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-500" data-toggle="modal" data-target="#exampleModal-register">
                                                        Vous n'avez pas de compte ?
                                                    </a>
                                        </div>

                                    </form>
                                </div>                            
                        </div>

                    </div>
                </div>
            </div>




            <div class="modal fade" id="exampleModal-register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" >
                    <div class="modal-content bg-light" style="width:270px">

                        <div class="modal-header">
                            <div class="col-md-12">
                                <h6 class="modal-title col-md-6 text-center" id="exampleModalLabel">S'ENREGISTRER</h6>
                            </div>
                        </div>

                        <div class="modal-body ">

                                <div class="container col-md-10">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                            <div>
                                                <x-jet-label for="name" value="Nom *" class="pb-1 mb-1" />
                                                <br>
                                                <x-jet-input id="name" class="block col-md-10" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            </div>

                                            <div class="mt-1">
                                                <x-jet-label for="email" value="Adresse de messagerie *" class="pb-1 mb-1" />
                                                <br>
                                                <x-jet-input id="email" class="block col-md-10" type="email" name="email" :value="old('email')" required />
                                            </div>

                                            <div class="mt-1">
                                                <x-jet-label for="password" value="Mot de passe *" class="pb-1 mb-1" />
                                                <br>
                                                <x-jet-input id="password" class="block col-md-10" type="password" name="password" required autocomplete="new-password" />
                                            </div>

                                            <div class="mt-1">
                                                <x-jet-label for="password_confirmation" value="Confirmation du mot de passe *" class="pb-1 mb-1" />
                                                <br>
                                                <x-jet-input id="password_confirmation" class="block col-md-10" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            </div>

                                            <div class="mt-1 ">
                                                <a href="{{ route('siteecommerce.accueil') }}">
                                                    <x-jet-button class="btn btn-primary">
                                                        S'INSCRIRE
                                                    </x-jet-button>
                                                </a>
                                            </div>

                                            <br>
                                            <a class="underline text-sm text-gray-600 hover:text-gray-500" data-toggle="modal" data-target="#exampleModal-login">
                                                Vous avez déjà un compte ?
                                            </a>
                                    </form>
                                </div>
                        </div>

                    </div>
                </div>
            </div>



        <!--Modal desktop -->
        <div class="modal fade" id="exampleModal-desk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content bg-light">

                        <div class="modal-header">
                            <div class=" d-flex col-md-12">
                                <h5 class="modal-title col-md-6 text-center" id="exampleModalLabel">CONNEXION</h5>
                                <h5 class="modal-title col-md-6 text-center" id="exampleModalLabel">S'ENREGISTRER</h5>
                            </div>
                        </div>

                        <div class="modal-body ">
                            <div class=" d-flex col-md-12">  
                                <div class="container col-md-6 ">
                                    <form method="POST" action="{{ route('login') }}" class="mt-5" >
                                    @csrf

                                        <div>
                                            <x-jet-label for="email" value="Adresse de messagerie *" class="pb-1 mb-1" />
                                            <br>
                                            <x-jet-input id="email" class="block  col-md-10" type="email" name="email" :value="old('email')" required autofocus />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="password" value="Mot de passe *" class="pb-1 mb-1" />
                                            <br>
                                            <x-jet-input id="password" class="block  col-md-10" type="password" name="password" required autocomplete="current-password" />
                                        </div>

                                        <div class="block mt-4">
                                            <label for="remember_me" class="flex items-center">
                                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                                <span class="ml-2 text-sm text-gray-600"> Se souvenir de moi</span>
                                            </label>
                                        </div>

                                        <div class=" mt-4 ">
                                            <x-jet-button class=" btn btn-primary mb-2">
                                                SE CONNECTER
                                            </x-jet-button>
                                            <br>
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-2" href="{{ route('password.request') }}">
                                                    Mot de passe perdu ?
                                                </a>
                                            @endif
                                        </div>

                                    </form>
                                </div>
                                            
                                <div class="vl"></div>
                                            
                                <div class="container col-md-6 ml-4 pl-5 mb-3">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                            <div>
                                                <x-jet-label for="name" value="Nom *" class="pb-1 mb-1" />
                                                <br>
                                                <x-jet-input id="name" class="block col-md-10" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            </div>

                                            <div class="mt-4">
                                                <x-jet-label for="email" value="Adresse de messagerie *" class="pb-1 mb-1" />
                                                <br>
                                                <x-jet-input id="email" class="block col-md-10" type="email" name="email" :value="old('email')" required />
                                            </div>

                                            <div class="mt-4">
                                                <x-jet-label for="password" value="Mot de passe *" class="pb-1 mb-1" />
                                                <br>
                                                <x-jet-input id="password" class="block col-md-10" type="password" name="password" required autocomplete="new-password" />
                                            </div>

                                            <div class="mt-4">
                                                <x-jet-label for="password_confirmation" value="Confirmation du mot de passe *" class="pb-1 mb-1" />
                                                <br>
                                                <x-jet-input id="password_confirmation" class="block col-md-10" type="password" name="password_confirmation" required autocomplete="new-password" />
                                            </div>

                                            <div class="mt-4 ">
                                                <a href="{{ route('siteecommerce.accueil') }}">
                                                <x-jet-button class="btn btn-primary">
                                                    S'INSCRIRE
                                                </x-jet-button>
                                                </a>
                                            </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>







    <main class="bg-light " style="padding-top:30px;">
        @yield('content')
    </main>



<!-- mobile-->
    <footer class="bg-success mob" >

            <div class="container col-md-12 pt-1">

                <h6 class="mt-2 pt-2 pb-2 text-center text-white text-uppercase" style="background-color: rgb(51, 116, 51);font-size:0.9rem"><strong > A propos de nous </strong></strong> </h6>
                <div class="text-center ">
                    <a class=" text-dark" style="font-size:0.8rem" href="#">Qui sommes-nous?</a>
                    <hr class="container" style="width:70px">
                    <a class=" text-dark" style="font-size:0.8rem" href="#">CGU</a>
                    <hr class="container" style="width:70px">
                    <a class=" text-dark" style="font-size:0.8rem" href="#">Aide et support</a>
                </div>

                <h6 class="mt-2 pt-2 pb-2 text-center text-white text-uppercase" style="background-color: rgb(51, 116, 51);font-size:0.9rem"><strong > Particuliers </strong></strong> </h6>
                <div class="text-center">
                    <a class=" text-dark " style="font-size:0.8rem" href="#">Nos marques</a>
                    <hr class="container" style="width:70px">
                    <a class=" text-dark " style="font-size:0.8rem" href="#">Nos engagements</a>
                    <hr class="container" style="width:70px">
                    <a class="text-dark " style="font-size:0.8rem" href="#">Livraison</a>
                    <hr class="container" style="width:70px">
                    <a class=" text-dark " style="font-size:0.8rem" href="#">Retours des produits</a>
                </div>
                
                <h6 class="mt-2 pt-2 pb-2 text-center text-white text-uppercase" style="background-color: rgb(51, 116, 51);font-size:0.9rem"><strong > Professionnels </strong></strong> </h6>
                <div class="text-center">
                    <a class="text-dark " style="font-size:0.8rem" href="#">Fournisseurs</a>
                    <hr class="container" style="width:70px">
                    <a class="text-dark " style="font-size:0.8rem" href="#">Associations</a>
                    <hr class="container" style="width:70px">
                    <a class=" text-dark" style="font-size:0.8rem" href="#">Presse et médias</a>
                </div>

                <h6 class="mt-2 pt-2 pb-2 text-center text-white text-uppercase" style="background-color: rgb(51, 116, 51);font-size:0.9rem"><strong > Nous contacter </strong></strong> </h6>
                <div class="container mb-3" style="font-size:0.9rem">
                    <p><span style="text-decoration:underline;"> Par téléphone :</span><span ><a class=" text-white ml-3" href="#"> 06 63 66 11 33 </a></span></p>
                    <p><span style="text-decoration:underline;"> Par email :</span><span><a class="text-white ml-2" href="#"> Contact@babybiomarket.com</a></span></p>
                    <div class="mt-2  d-flex ">
                        <p><span style="text-decoration:underline;">Devenons amis :</span> </p>
                        <i class="fab fa-facebook-f ml-3 mr-2 text-primary" style="font-size:25px"></i>
                        <i class="fab fa-instagram ml-2 mr-2 text-danger" style="font-size:25px"></i>
                    </div>
                    <p class=" text-center text-white mt-2 pb-3" ><small >Notre service client est là pour vous répondre du Lundi au Samedi de 9h à 19h</small></p>

                </div>
            </div>

    </footer>




<!-- desktop-->
   <footer class="bg-success desk" style="height:320px">
        <div class="" style="padding-top:20px">
            <div class="container col-md-8 d-flex " >
                <div class="text-center text-white col-md-3  ">
                    <h6 class=" mb-5 text-uppercase"><strong > A propos de nous </strong></strong> </h6>
                    <a class=" text-white " href="#">Qui sommes-nous?</a>
                    <hr class="container col-md-8 ">
                    <a class=" text-white " href="#">CGU</a>
                    <hr class="container col-md-8 ">
                    <a class=" text-white " href="#">Aide et support</a>
                </div>
                <div class="text-center text-white col-md-3 ">
                    <h6 class=" mb-5 text-uppercase"><strong > Particuliers </strong></strong> </h6>
                    <a class=" text-white " href="#">Nos marques</a>
                    <hr class="container col-md-8 ">
                    <a class=" text-white " href="#">Nos engagements</a>
                    <hr class="container col-md-8 ">
                    <a class="text-white " href="#">Livraison</a>
                    <hr class="container col-md-8 ">
                    <a class=" text-white " href="#">Retours des produits</a>
                </div>
                <div class="text-center text-white col-md-3 ">
                    <h6 class=" mb-5 text-uppercase"><strong > Professionnels </strong></strong> </h6>
                    <a class="text-white " href="#">Fournisseurs</a>
                    <hr class="container col-md-8 ">
                    <a class="text-white " href="#">Associations</a>
                    <hr class="container col-md-8 ">
                    <a class=" text-white" href="#">Presse et médias</a>
                </div>
                <div class=" text-white col-md-3 ">
                    <h6 class="text-center mb-5 text-uppercase"><strong > Nous contacter </strong></strong> </h6>
                    <p> Par téléphone : <span><u><a class=" text-white" href="#"> 06 63 66 11 33 </a></u></span></p>
                    <p class=" text-center mt-n3" style="font-size:0.9rem"><small >Notre service client est là pour vous répondre du Lundi au Samedi de 9h à 19h</small></p>
                    <p class="mt-2"> Par email :<span> <u ><a class="text-white  " href="#">Contact@babybiomarket.com</a></u></span></p>
                    <div class=" mt-2 d-flex ">
                        <p> Devenons amis : </p>
                        <i class="fab fa-facebook-f ml-2 mr-2 text-primary" style="font-size:25px"></i>
                        <i class="fab fa-instagram ml-2 mr-2 text-danger" style="font-size:25px"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



</body>
</html>