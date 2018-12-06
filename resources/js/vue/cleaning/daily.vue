<template>
    <div>
        <h2>Täglich</h2>
    </div>
</template>

<script>
    export default {

        data(){
            return{
                daily:[],
            }
        },
        mounted(){
            axios.post('/api/cleaning/daily')
                .then(response => (this.daily = response.data))
        }
    }
</script>