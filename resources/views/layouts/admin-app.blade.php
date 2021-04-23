<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="statistic-body">

    <div id="app">

        <div class="main-background"></div>

        <div class="sticky-nav">
            <nav style="height:80px; width:100vw" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                <div class="container">

                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img style="height:60px" src="{{ asset('img/pink-logo.png')}}" alt="">
                         </a>
                         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                             <span class="navbar-toggler-icon"></span>
                         </button>

                         <div class="collapse navbar-collapse" id="navbarSupportedContent">
                             <!-- Left Side Of Navbar -->
                             <ul class="navbar-nav mr-auto">

                             </ul>

                             <!-- Right Side Of Navbar -->
                             <ul class="navbar-nav ml-auto">
                                 <!-- Authentication Links -->
                                 @guest
                                     <li class="nav-item">
                                         <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                     </li>
                                     @if (Route::has('register'))
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                         </li>
                                     @endif
                                 @else
                                     <li class="nav-item dropdown">
                                         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                             {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                                         </a>

                                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                             <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                 {{ __('Logout') }}
                                             </a>

                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                 @csrf
                                             </form>
                                         </div>
                                     </li>
                                 @endguest
                             </ul>
                         </div>
                </div>

        </nav>
        </div>


        <main class="main-content-container">
            @yield('main-content')
        </main>

        <footer class="deliveboo-footer">

            <div class="container footer-content">

                <div class="footer-logo-info">
                    <img src="{{ asset('img/white-logo.png')}}" class="footer-logo">
                    <ul>
                        <li>Termini e Condizioni</li>
                        <li>Privacy Policy</li>
                        <li>Cookie Policy</li>
                    </ul>
                </div>

                <div class="footer-none">
                    <ul>
                        <li class="footer-list-title">dove posso ordinare?</li>
                        <li>Consegna a domicilio Milano</li>
                        <li class="footer-list-title">opportunità</li>
                        <li>Diventa un ristorante Deliveboo</li>
                        <li>Diventa un rider Deliveboo</li>
                        <li>Lavora con Deliveboo</li>
                    </ul>
                </div>

                <div class="icons-container">

                    <div class="footer-icons">
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-linkedin"></i>
                        <i class="fab fa-whatsapp"></i>
                    </div>

                    <ul>
                        <li>Deliveboo S.r.l</li>
                        <li>Corso Buenos Aires, 4</li>
                        <li>20124 Milano</li>
                    </ul>

                </div>

            </div>

        </footer>
    </div>

</body>
</html>
