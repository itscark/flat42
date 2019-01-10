<template>
    <vue-tabs>
        <v-tab title="Vergangene Events">
            <div class="list-group mt-3">
                <div
                        class="border-bottom row row-color pt-3 pb-3"
                        v-for="item in this.prevEvents"
                >
                    <div class="col align-self-center">
                        {{ date(item.date) }}
                    </div>
                    <div class="col align-self-center">{{ item.title }}</div>
                    <div class="col align-self-center">{{ item.body }}</div>
                </div>
            </div>
        </v-tab>

        <v-tab title="Abgesagte Events">
            <div class="list-group mt-3">
                <div
                        class="border-bottom row row-color pt-3 pb-3 "
                        v-for="item in this.delEvents"
                >
                    <div class="col align-self-center">
                        {{ date(item.date) }}
                    </div>
                    <div class="col align-self-center">{{ item.title }}</div>
                    <div class="col align-self-center">{{ item.body }}</div>
                </div>
            </div>
        </v-tab>
    </vue-tabs>
</template>
<style scoped>
    .row-color:nth-child(odd) {
        background-color: #f8f8f8;
    }
</style>
<script>
    import moment from "moment";
    import {VueTabs, VTab} from "vue-nav-tabs/dist/vue-tabs.js";
    import "vue-nav-tabs/themes/vue-tabs.css";

    export default {
        components: {
            VueTabs,
            VTab
        },

        props:['prevEvents', 'delEvents'],

        data() {
            return {
                previousEvents: this.prevEvents,
                deletedEvents: this.delEvents,
            };
        },

        mounted() {
            /*        axios
                        .get("api/events/prev-events")
                        .then(response => (this.prevEvents = response.data));

                    axios
                        .get("api/events/del-events")
                        .then(response => (this.delEvents = response.data));*/
        },
        methods: {
            date(date) {
                return moment
                    .utc(date)
                    .locale("de")
                    .format("Do MMMM YYYY");
            },

            getEventInfo(id) {
                axios
                    .get("api/events/show/" + id)
                    .then(this.showEventInfo())
                    .catch();
            },

            showEventInfo() {
                console.log("show = true");
            }
        }
    };
</script>
