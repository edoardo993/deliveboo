<template>

    <div>

        <div class="single-restaurant">

            <img v-if="results.pic_url.length > 20"
                class="single-restaurant-img"
                :src="results.pic_url"
            >

            <img v-else
                class="single-restaurant-img"
                src="https://www.associazioneostetriche.it/wp-content/uploads/2018/05/immagine-non-disponibile.png"
            >

            <div class="single-restaurant-misc">
                <h5 class="restaurant-name">{{ results.business_name }}</h5>
                <p class="restaurant-description">{{ results.description }}</p>
                <p class="restaurant-address">{{ results.address }}</p>
                <p class="restaurant-hours">{{ results.opening_hours }}</p>


                <!--

                    qua dovremo ciclare le categorie dell'oggetto

                -->

                <!-- <p class="restaurant-category"
                    :v-for="category in categories"
                    :key="category"
                >{{ category }}</p> -->
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: 'prova',
        props: {
            results: Object,
            categories: Array
        }
    }
</script>
