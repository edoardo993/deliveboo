<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HOMEPAGE</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Acme:wght@400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>

            <header>

                <nav class="scroll">

                    <div class="container-1200 flex-between nav-content-container">

                        <a href="{{ url('/') }}">
                            <img style="height:60px;margin-top:10px;"
                                src="../img/pink-logo.png"
                                class="hide"
                                id="pink-logo"
                            >
                        </a>

                        <div class="user-info-group">

                            @if (Route::has('login'))

                                <div class="login-links">
                                    @auth
                                        <a href="{{ url('/admin/restaurants') }}" class="your-page white-font">La tua pagina</a>
                                    @else
                                        <a href="{{ route('login') }}" class="your-page white-font">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="your-page white-font">Register</a>
                                        @endif
                                    @endauth
                                </div>

                            @endif

                        </div>

                    </div>

                </nav>

            </header>
            <div id={{$idJs}}>

                @yield('main-content')

            </div>

            <footer class="">

            </footer>



        <script src="{{asset('js/app.js')}}"></script>

        @yield('payments-script')

    </body>
</html>
