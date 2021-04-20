<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BRAINTREE</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('partials.modal-payments-success')

            @include('partials.modal-payments-error')
        <div class="container">

            {{-- form per aggiungere indirizzo spedizione --}}
            <form>

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

            </form>
            {{-- end form per aggiungere indirizzo spedizione --}}

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="dropin-container"></div>
                    <button id="submit-button">Request payment method</button>
                </div>
            </div>




        </div>
    <script>
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
                    alert('Payment ciao!');
                }
            }, 'json');
        });
    });
});
</script>
</body>
</html>
