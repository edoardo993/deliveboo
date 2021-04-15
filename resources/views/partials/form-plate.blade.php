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
         >
         <div class="invalid-feedback">
             {{$errors->first('price')}}
         </div>
     </div>

     <div class="form-group">

        <label for="visible">Il piatto è disponibile?</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="true" checked>
            <label class="form-check-label" for="exampleRadios1">Si</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="false">
            <label class="form-check-label" for="exampleRadios2">No</label>
        </div>

     </div>

     <button type="submit" class="btn btn-primary">{{$submit}}</button>

 </form>
