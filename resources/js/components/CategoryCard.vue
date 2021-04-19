<template>

    <div>

        <div class="single-card-category">

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
        props: {
            categories: Object
        }
    }
</script>
