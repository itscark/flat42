<template>
    <div>
        <eventHeader></eventHeader>
        <div v-for="item in vueEvents">
            <event :item="item" @deleteEvent="deleteItem"></event>
        </div>

        <eventTabs class="mt-5"></eventTabs>
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
            vueEvents: this.events
        };
    },

    components: {
        event,
        eventHeader,
        eventTabs
    },

    mounted() {},

    methods: {
        deleteItem(id) {
            axios.delete("api/events/" + id).then(response => {});
            this.vueEvents = this.vueEvents.filter(event => {
                return event.id !== id;
            });
        }
    }
};
</script>
