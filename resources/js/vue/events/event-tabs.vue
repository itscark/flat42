<template>
    <vue-tabs>

        <v-tab title="Vergangene Events">
            <div class="list-group mt-3">
                <div class="border-bottom row row-color pt-3 pb-3"
                     v-for="item in this.prevEvents">
                    <div class="col align-self-center">{{ newDate(item.date) }}</div>
                    <div class="col align-self-center">{{item.title}}</div>
                    <div class="col align-self-center">
                        <button  class="btn btn-outline-info mr-3"><i class="fas fa-info"></i> Info</button>
                    </div>
                </div>
            </div>
        </v-tab>

        <v-tab title="Abgesagte Events">
            <div class="list-group mt-3">
                <div class="border-bottom row row-color pt-3 pb-3 "
                     v-for="item in this.delEvents">
                    <div class="col align-self-center">{{ newDate(item.date) }}</div>
                    <div class="col align-self-center">{{item.title}}</div>
                    <div class="col align-self-center">
                        <button  class="btn btn-outline-info mr-3"><i class="fas fa-info"></i> Info</button>
                    </div>
                </div>
            </div>
        </v-tab>
    </vue-tabs>
</template>
<style scoped>
    .row-color:nth-child(odd){
        background-color: #f8f8f8;
    }
</style>
<script>

    import moment from 'moment';

    //local registration
    import {VueTabs, VTab} from 'vue-nav-tabs/dist/vue-tabs.js';
    //you can also import this in your style tag
    import 'vue-nav-tabs/themes/vue-tabs.css';

    export default {
        components: {
            VueTabs,
            VTab
        },

        data() {
            return {
                prevEvents: [],
                delEvents: [],
            }
        },

        mounted() {
            axios.get('api/events/prev-events')
                .then(response => this.prevEvents = response.data);

            axios.get('api/events/del-events')
                .then(response => this.delEvents = response.data);
        },
        methods: {
            newDate(date){
                return moment.utc(date).calendar(null, {
                    sameDay: '[Heute]',
                    nextDay: '[Morgen]',
                    nextWeek: '[Nächste Woche]',
                    lastDay: '[Gestern]',
                    lastWeek: 'Letzte Woche',
                    sameElse: 'DD.MM.YYYY'
                });
            }
        }
    }
</script>