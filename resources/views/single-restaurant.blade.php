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
    {{-- start root vue --}}
    <div id="root">

        <div class="single-restaurant-left-content">

            <div class="single-restaurant-spec">

                <div class="restaurant-img-container">
                    <img src="{{$restaurant->pic_url}}" alt="">
                </div>

                <span>{{$restaurant->business_name}}</span>

                @foreach ($restaurant->categories as $category)
                    <span>{{$category->name}}</span>
                @endforeach

                <p>{{$restaurant->description}}</p>
            </div>

            <div class="single-restaurant-plates">

                <div class="single-restaurant-wrap">

                    @foreach ($restaurant->plates as $plate)

                        <div class="plates-container"
                            v-on:click="newItem({{$plate}})"
                        >
                            <span>{{$plate->name}}</span>
                            <span>{{$plate->price}}</span>
                            <span>{{$plate->description}}</span>
                        </div>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="cart-container">

            <div class="cart">
                <span>Il tuo ordine</span>
                {{-- <img src="" alt=""> --}}
                <p>Scegli i tuoi piatti preferiti e aggiungili al carrello con un click.</p>

                <div v-for="(item, index) in cartItem">

                    <p>@{{item}}</p>
                    <button v-on:click="deletePlate(index)">elimina piatto</button>

                </div>

                <div>Totale: @{{total}}</div>

            </div>

        </div>

    </div>
    {{-- end root vue --}}
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
