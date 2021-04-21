<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRAINTREE</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.modal-payments-success')

            @include('partials.modal-payments-error')
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
                <div v-for="(price, index) in totalPlatesPrices">

                    <p>@{{price}}</p>


                </div>

                <div v-if="total>0">Totale: @{{total}}</div>

                <button v-if="cartItem.length >= 1" v-on:click="proceedToBraintree('paymentsContainer')">Procedi al pagamento</button>

                <div class="container hide" id="paymentsContainer">

                    {{-- form per aggiungere indirizzo spedizione --}}
                    {{-- <form>

                        <div class="form-group">

                            <div class="form-group">

                                <label for="exampleInputPassword1">Nome</label>

                                <input type="text"
                                    class="form-control"
                                    id="exampleInputPassword1"
                                    placeholder="Inserisci il nome del destinatario"
                                    required
                                >

                            </div>

                            <label for="exampleInputEmail1">Indirizzo</label>

                            <input type="text"
                                class="form-control"
                                id="exampleInputEmail1"
                                placeholder="Inserisci indirizzo di spedizione"
                                required
                            >

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form> --}}

                    @include('payments')
                    {{-- end form per aggiungere indirizzo spedizione --}}

                    {{-- compilazione campi carta di credito --}}
                    {{-- <form id="payment-form" action="{{route('payment.make')}}" method="post">
                        @method('GET')
                        @csrf --}}
                        <!-- Putting the empty container you plan to pass to
                          `braintree.dropin.create` inside a form will make layout and flow
                          easier to manage -->
                        {{-- <div id="dropin-container"></div>
                        <input type="submit" />
                        <input type="hidden" id="nonce" name="payment_method_nonce"/>
                      </form> --}}
                    {{-- end compilazione campi carta di credito --}}

                </div>

            </div>

        </div>

    </div>
    {{-- end root vue --}}

    {{-- <script>
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: "sandbox_x6mvdvj5_r7czy6mhvckbb4v2",
            container: '#dropin-container'
            }, function (createErr, instance) {
                button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                $.get('{{ route('payment.make') }}', {payload}, function (response) {
                if (response.success) {
                    alert('Payment successfull!');
                } else {
                    $("#error-modal").modal();
                }
            }, 'json');
        });
    });
});
</script> --}}

    <script src="{{asset('js/app.js')}}"></script>

    <script src="https://js.braintreegateway.com/web/3.38.1/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.38.1/js/hosted-fields.min.js"></script>

    <!-- Load PayPal's checkout.js Library. -->
    <script src="https://www.paypalobjects.com/api/checkout.js" data-version-4 log-level="warn"></script>

    <!-- Load the PayPal Checkout component. -->
    <script src="https://js.braintreegateway.com/web/3.38.1/js/paypal-checkout.min.js"></script>


</body>
</html>
