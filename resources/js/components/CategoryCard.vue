<template>

    <div>

        <div class="single-card-category"  v-on:click="searchCategory(categories.name)">

            <!--
                da implementare tramite chiamata API a tabella img
                fatta in DB (come sfondo o come img normale)
            -->
            <img>

            <h3 class="category-name">{{ categories.name }}</h3>

        </div>

    </div>

</template>

<script>
    export default {
        name: 'category-card',
        data(){
            return{
             results:[]
            }
        },
        methods:{
            searchCategory(category){
            const self = this;
            this.category = category;
            axios
            .get('http://127.0.0.1:8000/api/restaurants/search?str=' + self.category)
            .then(function(result) {
               console.log(result.data)
               self.results = result.data;
            });

        }
        },
        props: {
            categories: Object,
        },
    }
</script>
