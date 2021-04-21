<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>

<body>

    <div  class="plate-container">

        <div class="nav-container shadow-sm">
            <nav class="nav-one ">
                <img style="height:60px;width:auto;" src="img/logo.svg" alt="">
                {{-- <img width="200" height="200" src="pink-logo.svg" alt=""> --}}
                <div> <strong>{{$restaurant->business_name}}</strong> </div>
            </nav>
        </div>


        <div class="plate-center">



            @foreach ($restaurant->plates as $plate)
            <div class="card-plate-container">
                <div class="card-plate-container-left">
                    <div class="text-container">
                        <h3 class="space-card-plate-container-right">{{$plate->name}}</h3>
                        <p class="space-card-plate-container-right">{{$plate->price}} €</p>
                        <p class="space-card-plate-container-right">{{$plate->typology}}</p>
                        <p class="space-card-plate-container-right"> <strong>Descrizione:</strong> <br> {{$plate->description}}</p>
                    </div>
                </div>

                <div class="card-plate-container-right">

                        <a href="{{route('plates.edit', ['plate' => $plate->id])}}" class="text-decoration-none">
                            <div class="utility-button-edit"><span>Modifica piatto</span></div>
                        </a>

                        <a class="text-decoration-none" href="{{ route('restaurants.index') }}">
                            <div class="utility-button-home"><span>Torna alla home</span></div>
                        </a>

                        <form action="{{route('plates.destroy', ['plate' => $plate->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="utility-button-danger border-none" data-toggle="modal" data-target="#exampleModal{{$plate->id}}">
                                <div class="red">Elimina piatto</div>
                            </button>

                            @include('partials.delete-modal-plate', ['plate'=> $plate->id])
                        </form>

                </div>
            </div>
           @endforeach

             <div class="footer">
                <div class="footer-container">

                    <a class="text-decoration-none" href="{{ route('plates.create', ['restaurant' => $restaurant])}}">
                        <div class="utility-button-edit"><span>Inserisci un nuovo piatto</span></div>
                    </a>

                    <a class="text-decoration-none" href="{{route('restaurants.index')}}">
                        <div class="utility-button-home"><span>Torna ai tuoi ristoranti</span></div>
                    </a>

                </div>
             </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
