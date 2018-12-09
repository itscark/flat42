<template>
    <div>
        <h2>Jährlich</h2>

        <div v-for="item in this.yearly">
            <p>{{ item.title }}</p>

            <!--es werden keine Tage angegeben, sondern nur wann-->

        </div>
    </div>
</template>

<script>
    export default {

        props:['yearly'],

        mounted(){
            console.log()
        },
    }
</script>