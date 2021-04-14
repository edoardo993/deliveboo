
{{-- MODIFICARE QUI IL CONTENT PER LA PAGINA DOPO ESSERSI LOGGATI (la section content la troviamo in app.blade.php) --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div class="">
                <br>
                <h3>DASHBOARD UTENTE REGISTRATO</h3><br>
                Email: {{Auth::User()->email}}<br>
                Nome attività: {{Auth::User()->business_name}}<br>
                Indirizzo: {{Auth::User()->address}}<br>
                Partita Iva: {{Auth::User()->PI}}<br>
                Tipologia ristorante: {{Auth::User()->restaurant_type}}
            </div>

            <a href="admin/restaurants/create">Create new restaurant</a>

        </div>
    </div>
</div>
@endsection
