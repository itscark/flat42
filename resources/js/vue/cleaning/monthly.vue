<template>
    <div>
        <h2>Monatlich</h2>

        <div v-for="item in this.monthly">
            <p>{{ item.title }}</p>
            <!--es werden keine Tage angegeben, sondern nur wann-->
        </div>
    </div>
</template>

<script>
    export default {

       props:['monthly'],

        mounted(){
            console.log()
        },

    }
</script>