
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
        <div class="user-main-content">
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

            </div>
        </div>
        @endforeach
    </div>
</div>


    {{-- <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="">
                <br>
                <h3>DASHBOARD UTENTE REGISTRATO</h3><br>
                Nome: {{Auth::User()->name}}<br>
                Cognome: {{Auth::User()->lastname}}<br>
                Email: {{Auth::User()->email}}<br>
                Partita Iva: {{Auth::User()->PI}}
            </div>

            <div class="">

                @foreach ($userRestaurants as $userRestaurant)

                    <img src="{{$userRestaurant->pic_url}}" width= "150">

                    <div>Orari ristorante: {{$userRestaurant->opening_hours}}</div>

                    <div>Nome:
                        <a href="{{ route('restaurants.show', ['restaurant' => $userRestaurant])}}">
                            {{$userRestaurant->business_name}}
                        </a>
                    </div>

                    <div>Descrizione: {{$userRestaurant->description}}</div>

                    <div>Categorie:
                        <div>
                            @foreach ($userRestaurant ->categories as $category)
                            <div>{{$category->name}}</div>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{route('restaurants.edit', ['restaurant' => $userRestaurant->id])}}">Modifica ristorante</a>

                    <form action="{{route('restaurants.destroy',['restaurant' => $userRestaurant->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$userRestaurant->id}}">
                            <i class="fas fa-bomb"></i>
                        </button>
                        @include('partials.delete-modal',['restaurant'=> $userRestaurant->id])
                    </form>

                @endforeach

            </div>

            <a href="{{route('restaurants.create')}}">Crea nuovo ristorante</a>


        </div>
    </div> --}}

@endsection
