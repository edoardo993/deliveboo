
{{-- MODIFICARE QUI IL CONTENT PER LA PAGINA DOPO ESSERSI LOGGATI (la section content la troviamo in app.blade.php) --}}

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
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
                    <div>{{$userRestaurant->opening_hours}}</div>
                    <div><a href="{{ route('restaurants.show', ['restaurant' => $userRestaurant])}}">{{$userRestaurant->business_name}}</a></div>
                    <div>{{$userRestaurant->description}}</div>
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
    </div>
</div>

@endsection
