<template>
    <div>
        <eventHeader></eventHeader>
        <div v-for="item in vueEvents">
            <event :item="item" @deleteEvent="deleteItem"></event>
        </div>

        <eventTabs
            :prevEvents="this.prevEvents"
            :delEvents="this.delEvents"
            class="mt-5"
        ></eventTabs>
    </div>
</template>

<script>
import event from "./event";
import eventHeader from "./event-header.vue";
import eventTabs from "./event-tabs";

export default {
    name: "Events",

    props: ["events"],

    data() {
        return {
            vueEvents: this.events,
            prevEvents: [],
            delEvents: []
        };
    },

    components: {
        event,
        eventHeader,
        eventTabs
    },

    mounted() {
        axios
            .get("api/events/prev-events")
            .then(response => (this.prevEvents = response.data));

        axios
            .get("api/events/del-events")
            .then(response => (this.delEvents = response.data));
    },

    methods: {
        deleteItem(id) {
            axios.delete("api/events/" + id).then(response => {
                this.deletedEvent = response.data;
                console.log(this.deletedEvent);
                this.delEvents.push(this.deletedEvent);
                this.vueEvents = this.vueEvents.filter(event => {
                    return event.id !== id;
                });
            });


        }
    }
};
</script>
