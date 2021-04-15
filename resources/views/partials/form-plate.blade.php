@php
if (isset($edit) && !empty($edit)) {
    $title='Modifica questo piatto';
    $method='PUT';
    $submit='Modifica';
    $url=route('plates.update', ['plate' => $plate]);
}else {
    $title='Crea un nuovo piatto';
    $method='POST';
    $submit='Crea';
    $url=route('plates.store');
};
@endphp

<h2>{{$title}}</h2>
 <form action="{{$url}}" method="post">

     @csrf
     @method($method)

     @if (empty($edit))
     <div class="form-group" style="display: none">
        <label for="thisRestaurant">Ristorante n</label>
        <input type="text"
            class="form-control"
            id="thisRestaurant"
            placeholder="{{$thisRestaurant}}"
            name="restaurant_id"
            value= "{{$thisRestaurant}}"
        >
    </div>
     @endif

     <div class="form-group">
         <label for="name">Nome piatto</label>
         <input type="text"
             class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
             id="name"
             placeholder="Inserisci il nome del tuo piatto"
             name="name"
             value="{{$edit ? $plate->name : '' }}"
             required
         >
         <div class="invalid-feedback">
             {{$errors->first('name')}}
         </div>
     </div>

     <div class="form-group">
         <label for="typology">Tipologia piatto</label>
         <input type="text"
             class="form-control {{ $errors->has('typology') ? 'is-invalid' : ''}}"
             id="typology"
             placeholder="Inserisci la tipologia"
             name="typology"
             value="{{$edit ? $plate->typology : '' }}"
             required
         >
         <div class="invalid-feedback">
             {{$errors->first('typology')}}
         </div>
     </div>

     <div class="form-group">
         <label for="description">Descrizione piatto</label>
         <input type="text"
             class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"
             id="description"
             placeholder="Inserisci la descrizione"
             name="description"
             value="{{$edit ? $plate->description : '' }}"
             required
         >
         <div class="invalid-feedback">
             {{$errors->first('description')}}
         </div>
     </div>

     <div class="form-group">
         <label for="price">Prezzo piatto</label>
         <input type="number"
            class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}"
            id="price"
            placeholder="Inserisci il prezzo"
            name="price"
            value="{{$edit ? $plate->price : '' }}"
            required
            step="0.01"
         >
         <div class="invalid-feedback">
            {{$errors->first('price')}}
         </div>
     </div>

     <div class="form-group">

        <label for="visible">Il piatto è disponibile?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visible" id="exampleRadios1" value="1" checked>
            <label class="form-check-label" for="exampleRadios1">Si</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="visible" id="exampleRadios2" value="0">
            <label class="form-check-label" for="exampleRadios2">No</label>
        </div>

     </div>

     <button type="submit" class="btn btn-primary">{{$submit}}</button>

 </form>
