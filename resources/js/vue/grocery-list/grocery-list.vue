<template>
    <div>
        <div class="list-group-item list-group-item-action d-flex justify-content-between">
            <p class=" mb-0"><span class="badge badge-primary badge-pill">{{ listItems.length }}</span> | {{item.user.name}} {{ postedOn(item) }}</p>

            <button type="button" class="btn btn-outline-primary btn-sm" @click="show = !show">
                <i class="fas fa-comments"></i>
                Info anzeigen
            </button>
        </div>
        <groceryDetails :item="item"
                        :listItems="listItems"
                        v-if="show"></groceryDetails>
    </div>
</template>


<script>
    import moment from 'moment';
    import groceryDetails from "./grocery-details.vue";

    export default {
        components: {
            groceryDetails,
        },

        props: ['item'],

        data(){
            return{
                show:false,
                listItems:[],
            }
        },

        created(){
            axios
                .get('/shopping/grocery-history/' + this.item.uniq_id)
                .then(response => this.listItems = response.data);
        },

        methods: {
            postedOn(status) {
                return moment(status.date).locale("de").fromNow();
            },
        }
    };
</script>
