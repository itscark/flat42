<template>
    <div>
        <eventHeader
            @toggleVisible="hideToggle"
            :toddleHide="this.toggleHide"
        ></eventHeader>
        <div v-if="toggleHide">
            <div v-for="item in vueEvents">
                <event :item="item" @deleteEvent="deleteItem"></event>
            </div>

            <eventTabs
                :prevEvents="this.prevEvents"
                :delEvents="this.delEvents"
                class="mt-5"
            ></eventTabs>
        </div>

        <create-event v-else @eventCreated="addEventToList"></create-event>
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
            delEvents: [],
            toggleHide: true
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
                this.flash('Event gelöscht!', 'error', {
                    timeout: 3000,
                });
                this.deletedEvent = response.data;
                this.delEvents.push(this.deletedEvent);
                this.vueEvents = this.vueEvents.filter(event => {
                    return event.id !== id;
                });
            });
        },

        hideToggle() {
            this.toggleHide = !this.toggleHide;
        },

        addEventToList(item) {
            this.flash('Event erstellt!', 'success', {
                timeout: 3000,
            });
            this.vueEvents.unshift(item);
            this.hideToggle();
        },

        addStatus(status) {
            this.status.unshift(status);
        }
    }
};
</script>
