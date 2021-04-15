

@php
   if (isset($edit) && !empty($edit)) {
    $title='Modifica questo ristorante';
    $method='PUT';
    $submit='Modifica';
    $url=route('restaurants.update', ['restaurant' => $restaurant]);
   }else {
    $title='Crea un nuovo ristorante';
    $method='POST';
    $submit='Crea';
    $url=route('restaurants.store');
};
@endphp

<h2>{{$title}}</h2>
    <form action="{{$url}}" method="post">

        @csrf
        @method($method)

        <div class="form-group">
            <label for="business_name">Nome ristorante</label>
            <input type="text"
                class="form-control {{ $errors->has('business_name') ? 'is-invalid' : ''}}"
                id="business_name"
                placeholder="Inserisci il nome del tuo ristorante"
                name="business_name"
                value="{{$edit ? $restaurant->business_name : '' }}"
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('business_name')}}
            </div>
        </div>

        <div class="form-group">
            <label for="restaurant_type">Tipologia ristorante</label>
            <input type="text"
                class="form-control {{ $errors->has('restaurant_type') ? 'is-invalid' : ''}}"
                id="restaurant_type"
                placeholder="Inserisci la tipologia"
                name="restaurant_type"
                value="{{$edit ? $restaurant->restaurant_type : '' }}"
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('restaurant_type')}}
            </div>
        </div>

        <div class="form-group">
            <label for="description">Descrizione ristorante</label>
            <input type="text"
                class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"
                id="description"
                placeholder="Inserisci la descrizione"
                name="description"
                value="{{$edit ? $restaurant->description : '' }}"
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('description')}}
            </div>
        </div>

        <div class="form-group">
            <label for="opening_hours">Orari ristorante</label>
            <input type="text"
                class="form-control {{ $errors->has('opening_hours') ? 'is-invalid' : ''}}"
                id="opening_hours"
                placeholder="Inserisci gli orari"
                name="opening_hours"
                value="{{$edit ? $restaurant->opening_hours : '' }}"
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('opening_hours')}}
            </div>
        </div>

        <div class="form-group">
            <label for="address">Indirizzo ristorante</label>
            <input type="text"
                class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}"
                id="address"
                placeholder="Inserisci l'indirizzo"
                name="address"
                value="{{$edit ? $restaurant->address : '' }}"
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('address')}}
            </div>
        </div>



        <div class="form-group">
            <label for="pic_url">Immagine ristorante</label>
            <input type="text"
                class="form-control {{ $errors->has('pic_url') ? 'is-invalid' : ''}}"
                id="pic_url"
                placeholder="Inserisci l'immagine"
                name="pic_url"
                value="{{$edit ? $restaurant->pic_url : '' }}"
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('pic_url')}}
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{$submit}}</button>

    </form>
