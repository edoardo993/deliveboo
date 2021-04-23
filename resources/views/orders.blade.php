<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HOMEPAGE</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Acme:wght@400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
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


    <div class="main-background"></div>

    <div  class="plate-container">

        {{-- <div class="nav-container shadow-sm">
            <nav class="nav-one ">
                <img style="height:60px;width:auto;" src="img/logo.svg" alt="">
                <img width="200" height="200" src="pink-logo.svg" alt="">
                <div> <strong>{{$restaurant->business_name}}</strong> </div>
            </nav>
        </div> --}}


        <div class="plate-center">

            {{-- <div class="business-name"> <strong>{{$restaurant->business_name}}</strong> </div> --}}

            <h2 class="business-name">Gli ordini: {{$restaurant->business_name}}</h2>
            <canvas id="userChart" ></canvas>
            @foreach ($restaurant->orders as $order)
            <div class="card-plate-container">

                <div class="card-plate-container-left">

                    <p class="space-card-plate-container-right size-font">
                        Id comanda:{{$order->id}}
                        <br>
                         Indirizzo Consegna:{{$order->address}}
                        <br>
                        Nome destinatario:{{$order->customer_name}}
                        <br>
                        Totale Pagato:{{$order->total}}
                        <br>
                        Specifiche Ordine :
                        @foreach ($order->plates as $plate)
                        {{$plate->name}}
                        @endforeach
                        <br>
                    </p>
                    <div class="text-container">
                    </div>

                </div>

                <div class="card-plate-container-right">


                </div>
            </div>


           @endforeach

             <div class="footer">
                <div class="footer-container">
                    <a class="text-decoration-none" href="{{route('restaurants.index')}}">
                        <div class="utility-button-home"><span>Torna ai tuoi ristoranti</span></div>
                    </a>

                </div>
             </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <!-- CHARTS -->
  <script>
      var ctx = document.getElementById('userChart').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'bar',
  // The data for our dataset
          data: {
              labels:  {!!json_encode($chart->labels)!!} ,
              datasets: [
                  {
                      label: '2021',
                      backgroundColor: {!! json_encode($chart->colours)!!} ,
                      data:  {!! json_encode($chart->dataset)!!} ,
                  },
              ]
          },
  // Configuration options go here
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
                      // This more specific font property overrides the global property
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
