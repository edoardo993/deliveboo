<div class="container">
    <div class="col-md-6 offset-md-3">
        <h1>Payment Form</h1>
        <div class="spacer"></div>

        @if (session()->has('success_message'))
            {{-- <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div> --}}
            <h2>andata senza ritorno</h2>
        @endif

        @if(count($errors) > 0)
            <h2>ritorno senza andata</h2>
        @endif
        <form action="{{ url('/checkout') }}" method="POST" id="payment-form">
            @csrf
            <div class="form-group">
                <label for="email">Indirizzo Email</label>
                <input type="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="name_on_card">Nome destinatario</label>
                <input type="text" class="form-control" id="name_on_card" name="name_on_card">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Indirizzo di consegna</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Città</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="province">Provincia</label>
                        <input type="text" class="form-control" id="province" name="province">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="postalcode">CAP</label>
                        <input type="text" class="form-control" id="postalcode" name="postalcode">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
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

            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button type="submit" class="btn btn-success">Submit Payment</button>
        </form>
    </div>
</div>
