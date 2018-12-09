<template>
    <div>
        <h2>Täglich</h2>

        <div v-for="item in this.daily">
            <p> {{ item.title }}</p>

            <!--es werden keine Tage angegeben, sondern nur wann-->

        </div>
    </div>
</template>

<script>
    export default {

        props: ['daily']

    }
</script>