<!-- @extends('siteecommerce.template-accueil')

@section('title')
    la page de validation
@endsection

@section('content')

    <div class="bg-light ">

        <div class="container col-md-9 bg-white" style="position:abdolute;margin-top:180px">

            <div class="text-center" style="height:100px">
                <img src="..\pictures\logo\logo.png" alt=""  style="width:22%;height:100%">
            </div>
            
            <div class="d-flex mt-4">

                <div class="col-md-7">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="container col-md-5">Produit</th>
                                <th scope="col" class="text-center col-md-2">Prix</th>
                                <th scope="col" class="text-center  col-md-2">Quantité</th>
                                <th scope="col" class="text-center  col-md-2">Sous-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content as $element)
                            <tr>
                                <td class="container d-flex justify-content-around border ">
                                    <a href="" class="col-md-2"><i class="far fa-times-circle " style="font-size:40px;margin-top:31px;color:lightgray"></i></a>
                                    <img class="col-md-4" src="{{ asset($element->attributes->photo) }}" alt="" style="width:100px;height:100px">
                                    <small class="text-center col-md-6" style="margin-top:40px;color:gray">{{ $element->name }}</small>
                                </td>
                                <td class="text-center col-md-2 border" style="padding-top:47px"><strong>{{ $element->price }}</strong></td>
                                <td class="text-center col-md-2 border" style="padding-top:47px">
                                    1
                                </td>
                                <td class="text-center col-md-2 border" style="padding-top:47px"><strong>total</strong></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-5">


                </div>

            </div>

        </div>
    </div>


@endsection -->