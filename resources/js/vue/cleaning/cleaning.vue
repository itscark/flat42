<template>
    <div>
        <daily></daily>
        <weekly></weekly>
        <monthly></monthly>
        <yearly></yearly>
    </div>
</template>
<script>

    import daily from './daily.vue';
    import weekly from './weekly.vue';
    import monthly from './monthly.vue';
    import yearly from './yearly.vue';


    export default {
        components: {
            daily,
            weekly,
            monthly,
            yearly,
        },

    }
</script>