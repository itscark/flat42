<template>
    <div>
        <h2>Wöchentlich</h2>

        <div v-for="item in this.weekly">
            <p>{{ item.title }}</p>

        </div>
    </div>
</template>

<script>
    export default {

       props:['weekly'],

        mounted(){
            console.log()
        },


    }
</script>