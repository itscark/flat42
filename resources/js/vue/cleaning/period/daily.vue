<template>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Täglich</h2>
            <p v-for="item in this.daily"
               class="card-text"><i class="far fa-circle"></i> {{ item.title }}</p>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['daily']

    }
</script>