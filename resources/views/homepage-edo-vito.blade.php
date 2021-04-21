<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HOMEPAGE</title>
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
                        {{-- <p id="slogan">SLOGAN</p> --}}

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




                <div class="container-1200">

                    <div class="category-cards-container">

                        <div class="single-card-category"
                            v-for="category in categories"
                        v-on:click="searchCategory(category.name)">

                            <!--
                                da implementare tramite chiamata API a tabella img
                                fatta in DB (come sfondo o come img normale)
                            -->
                            <img>

                            <h3 class="category-name">@{{category.name}}</h3>

                        </div>

                    </div>

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
                                            <h5 class="restaurant-name"><strong>Nome:</strong> @{{ restaurant.business_name }}</h5>
                                            <p class="restaurant-description"><strong>Descrizione:</strong> @{{ restaurant.description }}</p>
                                            <p class="restaurant-address"><strong>Indirizzo:</strong> @{{ restaurant.address }}</p>
                                            <p class="restaurant-hours"><strong>Orari:</strong> @{{ restaurant.opening_hours }}</p>

                                            <p class="restaurant-category"
                                                v-for="category in restaurant.categories"
                                            >
                                                @{{category.name}}
                                            </p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                    </div>

                </div>

            </main>

            <footer class="">

                {{-- categories slider --}}
                {{-- <div class="container-xl">
                    <div class="row">
                        <div class="col-md-9  mx-auto">
                            <h2><span>Categorie <b>Ristoranti</b></span></h2>
                            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row" v-for='(restaurant, index) in results'>
                                            <div class="col-sm-4">@{{restaurant.business_name}}<div class="img-box" v-for="category in restaurant.categories">@{{category.name}}</div></div>
                                            <div class="col-sm-4"><div class="img-box"><img src="/examples/images/thumbs/2.jpg" class="img-fluid"></div></div>
                                            <div class="col-sm-4"><div class="img-box"><img src="/examples/images/thumbs/3.jpg" class="img-fluid"></div></div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-sm-4"><div class="img-box"><img src="/examples/images/thumbs/4.jpg" class="img-fluid"></div></div>
                                            <div class="col-sm-4"><div class="img-box"><img src="/examples/images/thumbs/5.jpg" class="img-fluid"></div></div>
                                            <div class="col-sm-4"><div class="img-box"><img src="/examples/images/thumbs/6.jpg" class="img-fluid"></div></div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-sm-4"><div class="img-box"><img src="/examples/images/thumbs/7.jpg" class="img-fluid"></div></div>
                                            <div class="col-sm-4"><div class="img-box"><img src="/examples/images/thumbs/8.jpg" class="img-fluid"></div></div>
                                            <div class="col-sm-4"><div class="img-box"><img src="/examples/images/thumbs/9.jpg" class="img-fluid"></div></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Carousel controls -->
                                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- end categories slider --}}

                {{-- animated card --}}

                {{-- <div class="card-effect-container">
                    <div class="box" v-for="category in categories">@{{category.name}}</div>
                </div> --}}

                {{-- end animated card --}}

            </footer>

        </div>
        {{-- end app vue --}}

        <script src="{{asset('js/app.js')}}"></script>

    </body>
</html>
