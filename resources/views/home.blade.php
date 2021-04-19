
{{-- MODIFICARE QUI IL CONTENT PER LA PAGINA DOPO ESSERSI LOGGATI (la section content la troviamo in app.blade.php) --}}

@extends('layouts.app')

@section('content')

<div class="user-wrapper">
    <div class="user-container">
        <div class="user-title">
            <span>Benvenuto {{Auth::User()->name}} ! Qui di seguito trovi la lista dei tuoi Ristoranti</span>
            <p>Clicca sul nome di un Ristorante per visualizzare la lista dei piatti disponibili </p>
            <form action="{{route('restaurants.create')}}">
                <button type="submit" class="user-button">Crea nuovo ristorante</button>
            </form>
        </div>
        @foreach ($userRestaurants as $userRestaurant)
        <div class="user-main-content" id="root">
            <div class="user-restaurant-card">
                <div class="img-container">
                    <img src="{{$userRestaurant->pic_url}}" alt="immagine ristorante">
                </div>
                <a href="{{ route('restaurants.show', ['restaurant' => $userRestaurant])}}"> {{$userRestaurant->business_name}}</a>
                <span class="">{{$userRestaurant->opening_hours}}</span>
                <div class="user-restaurant-description">{{$userRestaurant->description}}</div>
                <div  class="rest-cat">
                @foreach ($userRestaurant ->categories as $category)
                    <span>{{$category->name}}</span>
                 @endforeach
                </div>
                <div class="user-restaurant-button">
                    <form action="{{route('restaurants.destroy',['restaurant' => $userRestaurant->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" data-toggle="modal" data-target="#exampleModal{{$userRestaurant->id}}" class="user-button">
                            Cancella Ristorante
                        </button>
                        @include('partials.delete-modal',['restaurant'=> $userRestaurant->id])
                    </form>
                    <form action="{{route('restaurants.edit', ['restaurant' => $userRestaurant->id])}}">
                        <button type="submit" class="user-button">Modifica ristorante</button>
                    </form>
                </div>
            </div>
            <div class="user-statistic-card">
                <h3>Statistiche {{$userRestaurant->business_name}}</h3>
                <div class="statistic-container">
                    <div class="chart-container" style="width: 100%;height:100%;">
                        <Cases/>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
