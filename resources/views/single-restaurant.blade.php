@extends('partials/public-head')
@section('main-content')

@include('partials.modal-payments-success')

@include('partials.modal-payments-error')

@php
    $idJs='root'
@endphp

    <div class="upper-gradient"></div>
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
                        >
                            <span class="plate-name">
                                {{$plate->name}}
                            </span>

                            <span class="plate-description">
                                {{$plate->description}}
                            </span>

                            <span>
                                {{$plate->price}}€
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="cart-container">

            <div class="cart">

                <span class="your-order">Il tuo ordine</span>

                <div class="cart-img-container" v-if="cartItem < 1">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Clicca sui piatti per aggiungerli al carrello</p>
                </div>

                <div class="cart-items-container" id="items-container">

                    <div v-for="(item, index) in cartItem">

                        <div class="cart-item-name">@{{item}}
                            <span v-on:click="deletePlate(index)">
                                <i class="fas fa-minus-circle"></i>
                            </span>
                        </div>

                    </div>

                    {{-- <p v-for="(price, index) in totalPlatesPrices">
                        @{{price}}€
                    </p> --}}

                </div>

                <div class="total-products" v-if="total>0">
                    Totale prodotti: @{{total}}€
                </div>

                <div class="total-button"
                    id="payment-button"
                    v-if="cartItem.length >= 1"
                    v-on:click="proceedToBraintree('paymentsContainer', 'payment-button', 'items-container')"
                >Procedi all'ordine
                </div>

                <div class="container hide" id="paymentsContainer">

                    @include('payments')

                </div>

            </div>

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
    </script>
    @endsection
