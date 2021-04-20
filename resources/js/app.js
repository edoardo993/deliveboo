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
        // proceedToBraintree(){

        // }
    }
})
