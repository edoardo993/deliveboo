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

    <div class="plate-container">
        <div class="plate-center">

            <nav class="nav-one">
                <h1>DELIVERBOO</h1>
                <div> <strong>{{$restaurant->business_name}}</strong> </div>
            </nav>

            <nav class="nav-two" v-if="scrollpx > 10">
                <h1>DELIVERBOO</h1>
                <div> <strong>{{$restaurant->business_name}}</strong> </div>
            </nav>

            <h2 class="business-name">{{$restaurant->business_name}}</h2>

            {{-- @foreach ($restaurant->plates as $plate)
             <div class="card" style="width: 18rem;">
                 <div class="card-body">
                 <h5 class="card-title">{{$plate->name}}</h5>
                 <h6 class="card-subtitle mb-2 text-muted">{{$plate->price}}</h6>
                 <h6 class="card-subtitle mb-2 text-muted">{{$plate->typology}}</h6>
                 <p class="card-text">{{$plate->description}}</p>
                 <a href="{{route('plates.edit', ['plate' => $plate->id])}}">Modifica piatto</a>
                 <a href="{{ route('restaurants.index') }}" class="card-link">Torna alla home</a>
                 </div>
             </div>

             <form action="{{route('plates.destroy', ['plate' => $plate->id])}}" method="post">
                 @csrf
                 @method('DELETE')
                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$plate->id}}">
                     Elimina piatto
                 </button>
                 @include('partials.delete-modal-plate', ['plate'=> $plate->id])
                 </form>
            @endforeach --}}

            @foreach ($restaurant->plates as $plate)
            <div class="card-plate-container">
                <div class="card-plate-container-left">
                    <div>
                        <h3 class="space-card-plate-container-right"><strong>{{$plate->name}}</strong></h3>
                        <h4 class="space-card-plate-container-right"><strong>{{$plate->price}} €</strong></h4>
                        <h4 class="space-card-plate-container-right"><strong>{{$plate->typology}}</strong></h4>
                        <h5 class="sspace-card-plate-container-right"><strong>Descrizione: <br> {{$plate->description}}</strong></h5>
                    </div>
                </div>

                <div class="card-plate-container-right">

                        {{-- <div><a href="{{route('plates.edit', ['plate' => $plate->id])}}" class="link-btn-card-plate-container-right">Modifica piatto</a></div> --}}
                        <button class="btn btn-danger linnk-bt">
                            <a href="{{route('plates.edit', ['plate' => $plate->id])}}" class="link-btn">Modifica piatto</a>
                        </button>
                        <button class="btn btn-danger linnk-bt" type="button">
                            <a href="{{ route('restaurants.index') }}" class="link-btn">Torna alla home</a>
                        </button>
                        {{-- <div class="space-card-plate-container-right"><a href="{{ route('restaurants.index') }}" class="link-btn-card-plate-container-right">Torna alla home</a></div> --}}
                        <form action="{{route('plates.destroy', ['plate' => $plate->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger linnk-bt" data-toggle="modal" data-target="#exampleModal{{$plate->id}}">
                                Elimina piatto
                            </button>
                            @include('partials.delete-modal-plate', ['plate'=> $plate->id])
                        </form>

                </div>
            </div>
           @endforeach

             <div class="footer">
                <div>
                    <button type="button" class="btn btn-danger">
                        <a class="link-btn" href="{{ route('plates.create', ['restaurant' => $restaurant])}}">Inserisci un nuovo piatto</a>
                    </button>

                    {{-- <form action="{{route('plates.create', ['restaurant' => $restaurant])}}">
                        <button type="submit" class="user-button">Crea nuovo piatto</button>
                    </form> --}}

                    <button type="button" class="btn btn-danger">
                        <a class="link-btn" href="{{route('restaurants.index')}}">Torna ai tuoi ristoranti</a>
                    </button>
                </div>
             </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
