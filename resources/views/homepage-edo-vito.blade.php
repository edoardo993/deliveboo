<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HOMEPAGE</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">


    </head>
    <body>

        {{-- start app vue --}}
        <div id="app">

            <header>

                <nav class="">

                    <div class="container-1200 flex-between nav-content-container">

                        <img style="height:60px;margin-top:10px;" src="img/logo.svg">

                        <div class="user-info-group">
                            @if (Route::has('login'))
                                <div class="login-links">
                                    @auth
                                        <a href="{{ url('/admin/restaurants') }}">Home</a>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>

                    </div>

                </nav>

            </header>

            <div class="jumbotron-delivery">

                <div class="container-1200 flex-between">

                    <div class="jumbotron-content-left">

                        {{-- da scrivere --}}
                        <p id="slogan">Il cibo che preferisci, <br> comodamente a casa tua!</p>

                        <img id="logo-deliveboo" src="img/sushi.svg">

                        <div class="input-group">
                            <input v-model='userSearch'
                                v-on:keyup.enter="search()"
                                class="form-control"
                                type="search"
                                placeholder="Cerca un ristorante"
                            >
                        </div>

                    </div>

                    <div class="jumbotron-content-right">

                        <img id="sushi-img" src="img/sushi-pizza.svg">

                    </div>

                </div>

            </div>

            <main class="main-content-delivery">




                <div class="carousel-container">

                    <div class="category-cards-container">

                        <carousel :per-page="4"
                          :mouse-drag="true"
                           :resistance-coef='60'
                           :navigation-enabled='true'
                           :pagination-enabled='false'
                           >

                            <slide
                            v-for="(category,index) in categories"
                            :key='index'>
                            <div class="single-card-category" v-on:click="searchCategory(category.name)" >
                            <!--
                                da implementare tramite chiamata API a tabella img
                                fatta in DB (come sfondo o come img normale)
                            -->
                            <img :src="setImg(category.name)" alt="">
                            <h3 class="category-name">@{{category.name}}</h3>
                            {{-- <img :src="setImg(category.name)" alt=""> --}}
                        </div>
                                </slide>
                            </carousel>

                        </div>
                            <h2 class="title-search" v-if="results.length > 0">Risultati per: @{{titleSearch}}</h2>

                    <div class="restaurant-container">

                                <div class="single-card-restaurant"
                                    v-for='(restaurant, index) in results'
                                    v-on:click="singleRestaurant(restaurant)"
                                   >

                                    <div class="single-card-restaurant-top">
                                        <img v-if="restaurant.pic_url.length > 20"
                                            class="single-restaurant-img"
                                            :src="restaurant.pic_url"
                                        >

                                        <img v-else
                                            class="single-restaurant-img"
                                            src="https://www.associazioneostetriche.it/wp-content/uploads/2018/05/immagine-non-disponibile.png"
                                        >
                                    </div>

                                    <div class="single-card-restaurant-bottom">
                                        <div class="single-restaurant-misc">
                                            <h5 class="restaurant-name"> @{{ restaurant.business_name }}</h5>
                                            <div>
                                                <span class="restaurant-category"
                                                    v-for="category in restaurant.categories">
                                                    @{{category.name}}<span class="comma">,</span>
                                                </span>
                                            </div>
                                            <p class="restaurant-description">@{{ restaurant.description }}</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                    </div>

                </div>

            </main>

            <footer class="">



            </footer>

        </div>
        {{-- end app vue --}}

        <script src="{{asset('js/app.js')}}"></script>

    </body>
</html>
