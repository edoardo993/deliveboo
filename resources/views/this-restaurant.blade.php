<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{$restaurant->business_name}}<br>
   @foreach ($restaurant->plates as $plate)
   <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$plate->name}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{$plate->price}}</h6>
      <p class="card-text">{{$plate->description}}</p>
      <a href="{{route('plates.edit', ['plate' => $plate->id])}}">Modifica piatto</a>
      <a href="#" class="card-link">Another link</a>
    </div>
  </div>
   @endforeach
    <a href="{{ route('plates.create', ['restaurant' => $restaurant])}}">Inserisci un nuovo piatto</a>
</body>
</html>
