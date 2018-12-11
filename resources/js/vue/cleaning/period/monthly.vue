<template>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Monatlich</h2>
            <p class="card-text"
               v-for="item in this.monthly"><i class="far fa-circle"></i> {{ item.title }}</p>

        </div>
    </div>
</template>

<script>
    export default {

        props: ['monthly'],

        mounted() {
            console.log()
        },

    }
</script>