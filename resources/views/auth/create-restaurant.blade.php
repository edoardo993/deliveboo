<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>FORM</title>
</head>
<body>

    <form action="{{ route('restaurants.store')}}" method="post">

        @csrf
        @method('POST')

        <div class="form-group">
            <label for="pic_url">Immagine ristorante</label>
            <input type="text"
                class="form-control {{ $errors->has('pic_url') ? 'is-invalid' : ''}}"
                id="pic_url"
                placeholder="Inserisci l'immagine del tuo ristorante"
                name="pic_url"
                value=""
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('pic_url')}}
            </div>
        </div>

        <div class="form-group">
            <label for="opening_hours">Orari ristorante</label>
            <input type="text"
                class="form-control {{ $errors->has('opening_hours') ? 'is-invalid' : ''}}"
                id="opening_hours"
                placeholder="Inserisci gli orari del tuo ristorante"
                name="opening_hours"
                value=""
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('opening_hours')}}
            </div>
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <input type="text"
                class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"
                id="description"
                placeholder="Inserisci la descrizione"
                name="description"
                value=""
                required
            >
            <div class="invalid-feedback">
                {{$errors->first('description')}}
            </div>
        </div>

        <button type="submit" class="btn btn-primary">CREATE</button>

    </form>

</body>
</html>
