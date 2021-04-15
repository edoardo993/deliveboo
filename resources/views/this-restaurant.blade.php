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
    {{$restaurant->business_name}}<br>
   @foreach ($restaurant->plates as $plate)
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
   @endforeach

    <a href="{{ route('plates.create', ['restaurant' => $restaurant])}}">Inserisci un nuovo piatto</a>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
