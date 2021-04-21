/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
window.Vue = Vue;
require('./bootstrap');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cases',require('./components/Cases.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    data: {
        results:[],
        categories: [],
        userSearch: '',
    },
    mounted() {
            axios
              .get('http://127.0.0.1:8000/api/categories')
              .then((result) => {
                console.log(result.data)
                this.categories = result.data;
            });
    },
    methods:{
        search() {
            this.results = [];
            this.searchrestaurant();
        },
        searchrestaurant() {
        const self = this;
        axios
            .get('http://127.0.0.1:8000/api/restaurants/search?str=' + self.userSearch)
            .then(function(result) {
                console.log(result.data)
                self.results = result.data;
                self.userSearch = '';
            });
        },
        searchCategory(category){
            this.userSearch = category;
            console.log(category);
            const self = this;
            axios
            .get('http://127.0.0.1:8000/api/restaurants/search?str=' + self.userSearch)
            .then(function(result) {
                console.log(result.data)
                self.results = result.data;
                self.userSearch = '';
            });

        },
        singleRestaurant(restaurant){
            return window.location.href='http://127.0.0.1:8000/single-restaurant/' + restaurant.id
        }
    }
  })

  const root = new Vue({
    el: '#root',
    data: {
        // array contenente il nome ed il prezzo del piatto
        cartItem: [],

        // variabile totale iniziale impostata a zero
        total: 0,

        // array contenente i prezzi dei piatti selezionati
        totalPlatesPrices: [],

        index: 0
    },
    mounted() {
            // axios
            //   .get('http://127.0.0.1:8000/api/categories')
            //   .then((result) => {
            //     console.log(result.data)
            //     this.categories = result.data;
            // });
    },
    methods: {
        newItem(item){
            console.log(item)
            this.cartItem.push(item.name);
            console.log(this.cartItem);
            this.totalPlatesPrices.push(item.price);
            this.totalOrderPrice();
        },
        totalOrderPrice(){
            this.total=0;
            for(var x=0; x<this.totalPlatesPrices.length; x++){
                this.total+=parseFloat(this.totalPlatesPrices[x]);
            }
            console.log(this.total)
        },
        deletePlate(index){
            this.index=index;
            console.log(this.index);
            this.totalPlatesPrices.splice(this.index, 1);
            this.cartItem.splice(this.index, 1);
            this.totalOrderPrice()
        },
        proceedToBraintree(idName){
            let paymentsForm=document.getElementById(idName);
            paymentsForm.classList.remove('hide')
        }
    }
})

// var button = document.querySelector('#submit-button');
//         braintree.dropin.create({
//             authorization: "sandbox_x6mvdvj5_r7czy6mhvckbb4v2",
//             container: '#dropin-container'
//             }, function (createErr, instance) {
//                 button.addEventListener('click', function () {
//                 instance.requestPaymentMethod(function (err, payload) {
//                 $.get("{{ route('payment.make') }}", {payload}, function (response) {
//                 if (response.success) {
//                     alert('Payment successfull!');
//                 } else {
//                     $("#error-modal").modal();
//                 }
//             }, 'json');
//         });
//     });
// });

var form = document.querySelector('#payment-form');
      var submit = document.querySelector('input[type="submit"]');

      braintree.client.create({
        authorization: 'sandbox_x6mvdvj5_r7czy6mhvckbb4v2'
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          console.error(clientErr);
          return;
        }

        // This example shows Hosted Fields, but you can also use this
        // client instance to create additional components here, such as
        // PayPal or Data Collector.

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

              // If this was a real integration, this is where you would
              // send the nonce to your server.
              // console.log('Got a nonce: ' + payload.nonce);
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          }, false);
        });

        // Create a PayPal Checkout component.
        braintree.paypalCheckout.create({
            client: clientInstance
        }, function (paypalCheckoutErr, paypalCheckoutInstance) {

        // Stop if there was a problem creating PayPal Checkout.
        // This could happen if there was a network error or if it's incorrectly
        // configured.
        if (paypalCheckoutErr) {
          console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
          return;
        }

        // Set up PayPal with the checkout.js library
        paypal.Button.render({
          env: 'sandbox', // or 'production'
          commit: true,

          payment: function () {
            return paypalCheckoutInstance.createPayment({
              // Your PayPal options here. For available options, see
              // http://braintree.github.io/braintree-web/current/PayPalCheckout.html#createPayment
              flow: 'checkout', // Required
              amount: 13.00, // Required
              currency: 'USD', // Required
            });
          },

          onAuthorize: function (data, actions) {
            return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {

              // Submit `payload.nonce` to your server.
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          },

          onCancel: function (data) {
            console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
          },

          onError: function (err) {
            console.error('checkout.js error', err);
          }
        }, '#paypal-button').then(function () {
          // The PayPal button will be rendered in an html element with the id
          // `paypal-button`. This function will be called when the PayPal button
          // is set up and ready to be used.

        });

        });
      });


