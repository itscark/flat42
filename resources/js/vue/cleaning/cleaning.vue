<template>
    <div>
        <daily :daily="toDos[0]"></daily>
        <weekly :weekly="toDos[1]"></weekly>
        <monthly :monthly="toDos[2]"></monthly>
        <yearly :yearly="toDos[3]"></yearly>
        <newItem :period="period"
                 @completed="addToDo"></newItem>

    </div>
</template>
<script>

    import daily from './daily.vue';
    import weekly from './weekly.vue';
    import monthly from './monthly.vue';
    import yearly from './yearly.vue';
    import newItem from './newItem.vue';


    export default {
        components: {
            daily,
            weekly,
            monthly,
            yearly,
            newItem,
        },

        props: ['period'],

        data() {
            return {
                toDos: [],
            }
        },

        mounted() {
            axios.get('cleaning/details')
                .then(response => (this.toDos = response.data))
        },

        methods: {
            addToDo(toDo) {
                if (toDo.period_id == 1) {
                    this.toDos[0].push(toDo);
                } else if (toDo.period_id == 2) {
                    this.toDos[1].push(toDo);
                } else if (toDo.period_id == 3) {
                    this.toDos[2].push(toDo);
                } else if (toDo.period_id == 4) {
                    this.toDos[3].push(toDo);
                }
            }
        },


    }
</script>