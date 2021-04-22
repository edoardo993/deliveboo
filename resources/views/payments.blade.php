<div class="container">

        <h3>Inserisci i tuoi dati</h3>

        <form action="{{ url('/checkout') }}" method="POST" id="payment-form">
            @csrf

            <div class="form-group">
                <label for="email">Indirizzo Email</label>
                <input type="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="name_on_card">Nome destinatario</label>
                <input type="text"
                    class="form-control"
                    id="name_on_card"
                    name="name_on_card"
                >
            </div>

            <div class="form-group">
                <label for="address">Indirizzo di consegna</label>
                <input type="text"
                    class="form-control"
                    id="address"
                    name="address"
                >
            </div>

            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Indirizzo di consegna</label>
                        <input type="text"
                            class="form-control"
                            id="address"
                            name="address"
                        >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Città</label>
                        <input type="text"
                            class="form-control"
                            id="city"
                            name="city"
                        >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="province">Provincia</label>
                        <input type="text"
                            class="form-control"
                            id="province"
                            name="province"
                        >
                    </div>
                </div>

            </div> --}}

            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="postalcode">CAP</label>
                        <input type="text"
                            class="form-control"
                            id="postalcode"
                            name="postalcode"
                        >
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text"
                            class="form-control"
                            id="amount"
                            name="amount"
                            readonly="readonly"
                            :value="total"
                        >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="cc_number">Credit Card Number</label>

                    <div class="form-group" id="card-number">

                    </div>
                </div>

                <div class="col-md-6">
                    <label for="expiry">Expiry</label>

                    <div class="form-group" id="expiration-date">

                    </div>
                </div>

                <div class="col-md-6">
                    <label for="cvv">CVV</label>

                    <div class="form-group" id="cvv">

                    </div>
                </div>

            </div>

            <input id="nonce" name="payment_method_nonce" type="hidden"/>

            <button type="submit" class="btn btn-success confirm-order">
                Conferma ordine
            </button>

        </form>
    </div>
</div>
