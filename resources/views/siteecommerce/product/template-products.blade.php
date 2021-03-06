<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style-template-accueil.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

</head>

<body style="overflow-x: hidden; ">
   <header class="fixed-top">
   
        <div class="bg-white col-md-12 ">
            <div class="container col-md-9 d-flex" style="height:80px">
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
                        <a href="{{ route('siteecommerce.connexion') }}"><button type="button" class="btn border-success  btn-sm float-right">Se connecter / S'enregistrer</button></a>
                    @endif
                </div>
                <div class="container text-center col-md-2 mt-2  " >
                    <a href="{{ route('siteecommerce.cart-details') }}" class="">
                        <i class="fas fa-shopping-cart text-success  pt-1" style="font-size:33px"></i>
                        <div class="text-white rounded-circle" style="width:20px;height:20px;position:absolute;font-size:1rem;margin-left:73px;margin-top:-35px">{{ $cartCount }}</div>
                        <p class="text-secondary pt-1" style="font-size:0.8rem"><strong>{{Cart::getSubTotal()}}.00 DH </strong></p>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12 " style="background-color:rgb(241,241,241);">
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
        </div>
   </header>



    <main class="bg-white " style="margin-top:138px;">

        <div class="container col-md-9  pt-5 pl-5">
            @yield('entete')
        </div>


        <div class="container col-md-10 d-flex justify-content-around pt-3 mb-3 ">

            
            <div class="col-md-3 pt-4 sidebar sidebar-menu" style="background-color:rgb(241,241,241);">
                <h6 class="m-2">CATÉGORIES DE PRODUITS</h6>
                <hr class="mt-2 mb-1" style="width:20%">
                
                @foreach($affichercategorie as $cat)
                    <li class="item" id="{{$cat->id}}">
                        <a href="#{{$cat->id}}" class="menu-btn">
                            <span> {{$cat->intitule}} <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        @foreach($cat->souscategories as $souscat)
                            <div class="sub-menu">
                                <a href="{{ route('siteecommerce.products-par-souscategorie',[$souscat->id]) }}">{{$souscat->intitule_souscategorie}}</a>
                            </div>
                        @endforeach
                    </li>
                @endforeach  

            </div> 

            <div class="col-md-8  ">
                @yield('content')
            </div>

        </div>
        
    </main>


   <footer class="bg-success mt-5" style="height:320px">
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