<div class="container">

    {{-- <div class="col-md-6 offset-md-3"> --}}

        <h3>Inserisci i tuoi dati</h3>

        {{-- <div class="spacer"></div> --}}

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            <h2>andata senza ritorno</h2>
        @endif

        @if(count($errors) > 0)
            <h2>ritorno senza andata</h2>
        @endif

        {{-- <form action="{{ url('/checkout') }}" method="POST" id="payment-form" name='formUno'> --}}
            <form action="{{ route('orders.store') }}" method="POST" id="payment-form" name='formUno'>
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="email">Indirizzo Email</label>
                <input type="email" class="form-control" id="email"  v-model='formData.email'>

            </div>

            <div class="form-group">
                <label for="customer_name">Nome destinatario</label>
                <input type="text"
                    class="form-control"
                    id="customer_name"
                    name="customer_name"
                    v-model='formData.name'
                >
            </div>

            <div class="form-group">
                <label for="address">Indirizzo di consegna</label>
                <input type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    v-model='formData.address'
                >
            </div>

            <div class="form-group">
                <input type="text"
                    class="form-control hide"
                    id="restaurant_id"
                    name="restaurant_id"
                    value='{{$restaurant->id}}'
                    readonly
                >
            </div>

            <div class="form-group">
                <select class="select hide" multiple name="plates[]">
                        <option readonly selected v-for='id in cartItemIds' :value="id">@{{id}}</option>
                </select>
            </div>


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


            <button type="submit" class="btn btn-success" >

                Submit Payment
            </button>

        </form>
    </div>
</div>
