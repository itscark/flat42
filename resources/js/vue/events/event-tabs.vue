<template>
 <b-tabs>
        <b-tab title="Vergangene Events" active>
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
        </b-tab>
        <b-tab title="Abgesagte Events" >
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
        </b-tab>
    </b-tabs>

</template>
<style scoped>
    .row-color:nth-child(odd) {
        background-color: #f8f8f8;
    }
</style>
<script>
    import moment from "moment";

    export default {
        components: {
        },

        props:['prevEvents', 'delEvents'],

        data() {
            return {
                previousEvents: this.prevEvents,
                deletedEvents: this.delEvents,
            };
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
