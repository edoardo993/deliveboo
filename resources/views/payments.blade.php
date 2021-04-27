<div class="container">

        <h3>Inserisci i tuoi dati</h3>

            <form action="{{ url('/checkout')}}" method="POST" id="payment-form" name='formUno' novalidate class="needs-validation">
            @csrf
            <div class="form-group">
                <label for="email">Indirizzo Email</label>
                <input type="email"
                    class="form-control"
                    id="email"
                    name="mail"
                    v-model='formData.email'
                    required
                >

            </div>

            <div class="form-group">
                <label for="customer_name">Nome destinatario</label>
                <input type="text"
                    class="form-control"
                    id="customer_name"
                    name="customer_name"
                    v-model='formData.name'
                    required
                >
            </div>

            <div class="form-group">
                <label for="address">Indirizzo di consegna</label>
                <input type="text"
                    class="form-control"
                    id="address"
                    name="address"
                    v-model='formData.address'
                    required
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
                    <option readonly selected v-for='plate in cartItem' :value="plate.id">@{{plate.id}}</option>
                </select>
            </div>

            <div class="form-group hide">
                <select class="select" multiple name="quantity[]">
                    <option readonly selected v-for='plate in cartItem' :value="plate.quantity">@{{plate.quantity}}</option>
                </select>
            </div>


            <div class="row hide">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amount">Totale</label>
                        <input type="text"
                            class="form-control"
                            id="amount"
                            name="amount"
                            readonly="readonly"
                            :value="total.toFixed(2)"
                        >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="cc_number" required>Numero carta di credito</label>

                    <div class="form-group" id="card-number">

                    </div>
                </div>

                <div class="col-md-6">
                    <label for="expiry" required>Data di scadenza</label>

                    <div class="form-group" id="expiration-date">

                    </div>
                </div>

                <div class="col-md-6">
                    <label for="cvv" required>CVV</label>

                    <div class="form-group" id="cvv">

                    </div>

                    <div class="invalid-feedback">
                        Inserisci una Partita Iva valida (11 cifre)
                    </div>
                </div>

            </div>

            <input id="nonce" name="payment_method_nonce" type="hidden"/>

            <button type="submit" class="btn btn-success"
                v-on:click="backToCart('paymentsContainer', 'overlay-container', 'items-container', 'payment-button', 'total-products-price')"
            >
                Torna al carrello
            </button>

            <button type="submit" class="btn btn-success">
                Procedi all'ordine @{{total.toFixed(2)}}€
            </button>

        </form>
    </div>
</div>
