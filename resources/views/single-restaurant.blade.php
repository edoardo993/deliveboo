@extends('partials/public-head')
@section('main-content')

@php
    $idJs='root'
@endphp

    <div class="main-background"></div>

    <div class="sushi-background">
        <img src="{{asset('img/sushi.svg')}}" alt="">
    </div>

    <div class="return-to-top hide" @click="returnTop()"><i class="fas fa-chevron-up"></i></div>

    <div class="upper-gradient" id="prova"></div>

        <div class="single-restaurant-left-content">

            <div class="single-restaurant-spec">

                <div class="restaurant-img-business-name">

                    <div class="restaurant-img-container">
                        <img src="{{$restaurant->pic_url}}" alt="">
                    </div>

                    <div class="restaurant-business-name-categories">

                        <span class="restaurant-business-name">
                            {{$restaurant->business_name}}
                        </span>

                        <span class="restaurant-address">
                            <i class="fas fa-map-marker-alt"></i>{{$restaurant->address}}
                        </span>

                        <div class="restaurant-total-categories">

                            @foreach ($restaurant->categories as $category)

                                <span class="restaurant-category">
                                    {{$category->name}}
                                </span>

                            @endforeach

                        </div>
                    </div>

                </div>

                <p class="restaurant-description">
                    {{$restaurant->description}}
                </p>

            </div>

            <div class="single-restaurant-plates">

                <div class="single-restaurant-wrap">

                    @foreach ($restaurant->plates as $plate)

                        <div class="plates-container"
                            v-on:click="newItem({{$plate}})"
                            v-if="{{$plate->visible}}"
                        >
                            <span class="plate-name">
                                {{$plate->name}}
                            </span>

                            <span class="plate-description">
                                {{$plate->description}}
                            </span>

                            <div class="price-add-icon">
                                <span class="plate-price">
                                    {{$plate->price}}???
                                </span>

                                <span class="add-cart-icon">
                                    <i class="fas fa-cart-plus"></i>
                                </span>
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="cart-container" id="cartContainer">

            <div class="cart" id="cart">

                <i class="fas fa-times close-tab hide" v-on:click="closeTab('cart', 'overlay-container')"></i>

                <h2 class="your-order">Il tuo ordine</h2>

                <div class="cart-img-container" v-if="cartItem < 1">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Clicca sui piatti per aggiungerli al carrello</p>
                </div>

                <div class="cart-items-container" id="items-container">

                    <div v-for="(item, index) in cartItem"
                        class="items-row"
                    >

                        <div class="cart-item-name no-capitalize">

                            <div class="cart-item-name-left-part">

                                <div v-on:click="deletePlate(index, item)" class="delete-item-button">

                                    -

                                </div>

                                x@{{item.quantity}}

                            </div>

                            <div class="item-name no-capitalize">

                                <div class=''>
                                    @{{item.name}}
                                </div>

                                <div class=''>
                                    @{{item.price.toFixed(2)}}???
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="total-products" v-if="total>0" id="total-products-price">
                    Totale prodotti: @{{total.toFixed(2)}}???
                </div>

                <div class="total-button"
                    id="payment-button"
                    v-if="cartItem.length >= 1"
                    v-on:click="proceedToBraintree('paymentsContainer', 'payment-button', 'items-container', 'overlay-container', 'total-products-price')"
                >Procedi al pagamento
                </div>

                <div class="container hide" id="paymentsContainer">

                    @include('payments')

                </div>

            </div>

            {{-- xs resolution button --}}
            <div class="hide-button-payment-container"
                id="payment-button"
                v-if="cartItem.length >= 1"
            >
                <div class="hide-button-payment"
                    v-on:click="proceedToBraintreeXs('cartContainer', 'cart', 'overlay-container')"
                >
                    <span>Il mio ordine:</span>

                    <span>@{{total.toFixed(2)}}???</span>

                </div>
            </div>

            <div id="overlay-container-z-index-max" class="hide"></div>
            {{-- xs resolution button --}}

            @if (session()->has('success_message'))

                <div class="payment-alert" id="payment-alert">

                    <img class="modal-img" src="{{asset('img/sushi.svg')}}">

                    <p class="payment-alert-text">Il tuo pagamento ?? andato a buon fine! <br> L'ordine ?? in preparazione,<br> saremo da te a breve!</p>

                    <button type="submit"
                        class="btn btn-success"
                        onclick="location.href = '/'"
                    >
                        Torna alla home
                    </button>

                </div>

                <div id="overlay-container-z-index-max"></div>

            @endif

            @if (session()->has('error'))

                <div class="payment-alert" id="payment-alert-failed">

                    <p class="payment-alert-text">Il tuo pagamento non ?? andato a buon fine :(<br>Ricontrolla i dati inseriti e riprova!</p>

                    <button type="submit"
                        class="btn btn-success"
                        onclick="location.href = '/'"
                    >
                    Torna al ristorante
                    </button>

                </div>

                <div id="overlay-container-z-index-max"></div>

            @endif

        </div>

    @endsection

    @section('payments-script')

    <script src="https://js.braintreegateway.com/web/3.38.1/js/client.min.js"></script>

    <script src="https://js.braintreegateway.com/web/3.38.1/js/hosted-fields.min.js"></script>

    <script>

        var form = document.querySelector('#payment-form');
        var submit = document.querySelector('input[type="submit"]');

        braintree.client.create({
            authorization: 'sandbox_x6mvdvj5_r7czy6mhvckbb4v2'
        }, function (clientErr, clientInstance) {
            if (clientErr) {
                console.error(clientErr);
                return;
            }

            braintree.hostedFields.create({
            client: clientInstance,
            styles: {
                'input': {
                'font-size': '14px'
                },
                'input.invalid': {
                'color': 'red'
                },
                'input.valid': {
                'color': 'green'
                }
            },
            fields: {
                number: {
                    selector: '#card-number',
                    placeholder: '4111 1111 1111 1111'
                },
                cvv: {
                    selector: '#cvv',
                    placeholder: '123'
                },
                expirationDate: {
                    selector: '#expiration-date',
                    placeholder: '10/2019'
                }
            }
            }, function (hostedFieldsErr, hostedFieldsInstance) {
            if (hostedFieldsErr) {
                console.error(hostedFieldsErr);
                return;
            }

            // submit.removeAttribute('disabled');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
                if (tokenizeErr) {
                    console.error(tokenizeErr);
                    return;
                }

                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
                });
            }, false);
            });
            });
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
    </script>

@endsection
