<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deliveboo</title><link rel="icon" href="{{asset('img/sushi.svg')}}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Acme:wght@400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>


    <div class="main-background-orders"></div>

    <header>

        <nav class="scroll-orders no-box-shadow">

            <div class="container flex-between nav-content-container">

                <a href="{{ url('/') }}">
                    <img style="height:60px;margin-top:10px;"
                        src="{{asset('img/pink-logo.png')}}"
                        id="pink-logo-orders"
                    >
                </a>

                <div class="user-info-group">

                    @if (Route::has('login'))

                        <div class="login-links">
                            @auth
                                <a href="{{ url('/admin/restaurants') }}" class="your-page-orders pink-font">La tua pagina</a>
                            @else
                                <a href="{{ route('login') }}" class="your-page-orders pink-font">Accedi</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="your-page-orders pink-font">Registrati</a>
                                @endif
                            @endauth
                        </div>

                    @endif

                </div>

            </div>

        </nav>

    </header>

    <div  class="container social-distancing">

        <div class="plate-center padding-title">

            <h2 class="statistics-title">Le statistiche: {{$restaurant->business_name}}</h2>

            <div class="chart-container" style=" width:100%">
                <canvas id="userChart" ></canvas>
            </div>

            <div class="button-container">

                <a class="text-decoration-none" href="{{route('restaurants.index')}}">
                    <div class="utility-button-home"><span>Dashboard</span></div>
                </a>

             </div>

             <h2 class="order-title">Gli ordini: {{$restaurant->business_name}}</h2>

            <div class="statistic-container">

                @foreach ($restaurant->orders as $order)

                    <div class="statistic-card">

                        <p class="space-card-plate-container-right size-font weight"> Ordine N. {{$order->id}}</p>
                        <p class="space-card-plate-container-right size-font"> <span class="font-weight-bold">Indirizzo Consegna:</span> {{$order->address}}</p>
                        <p class="space-card-plate-container-right plate-description size-font"> <span class="font-weight-bold">Specifiche Ordine:</span>

                            @foreach ($order->plates as $plate)
                            {{$plate->name}}
                            @endforeach</p>
                        <div class="space-card-plate-container-right size-font"> <span class="font-weight-bold">Totale Pagato:</span> {{$order->total}}€</div>
                    </div>

                @endforeach

            </div>

        </div>
    </div>

    <footer class="deliveboo-footer">

        <div class="container-1200 footer-content">

            <div class="footer-logo-info">
                <img src="{{ asset("img/white-logo.png") }}" class="footer-logo">
                <ul>
                    <li>Termini e Condizioni</li>
                    <li>Privacy Policy</li>
                    <li>Cookie Policy</li>
                </ul>
            </div>

            <div class="footer-logo-info">
                <ul>
                    <li class="footer-list-title">dove posso ordinare?</li>
                    <li>Consegna a domicilio Milano</li>
                </ul>
            </div>

            <div class="footer-logo-info">
                <ul>
                    <li class="footer-list-title">opportunità</li>
                    <li>Diventa un ristorante Deliveboo</li>
                    <li>Diventa un rider Deliveboo</li>
                    <li>Lavora con Deliveboo</li>
                </ul>
            </div>

            <div class="footer-logo-info">

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



    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <script>
            var ctx = document.getElementById('userChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:  {!!json_encode($chart->labels)!!} ,
                    datasets: [
                        {
                            label: "Ordini 2020",
                            backgroundColor: "rgba(255,51,102,0.8)",
                            data: [4, 9, 3, 6, 12, 2, 17, 13, 5, 18, 15, 7]
                        },
                        {
                            label: 'Ordini 2021',
                            backgroundColor: {!! json_encode($chart->colours)!!} ,
                            data:  {!! json_encode($chart->dataset)!!} ,
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {if (value % 1 === 0) {return value;}}
                            },
                            scaleLabel: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        labels: {
                            fontColor: '#122C4B',
                            fontFamily: "'Muli', sans-serif",
                            padding: 25,
                            boxWidth: 25,
                            fontSize: 14,
                        }
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 0,
                            bottom: 10
                        }
                    }
                }
            });
        </script>
      </body>
  </html>
