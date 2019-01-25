<template>
    <div>
        <eventHeader
                @toggleVisible="hideToggle()"
                :toddleHide="this.toggleHide"
        ></eventHeader>
        <transition
                mode="out-in"
                enter-active-class="animated fadeIn faster"
                leave-active-class="animated fadeOut faster"
                v-if="toggleHide"
        >
            <div>
                <div v-for="item in vueEvents">
                    <event :item="item" @deleteEvent="deleteItem"></event>
                </div>

                <eventTabs
                        :prevEvents="this.prevEvents"
                        :delEvents="this.delEvents"
                        class="mt-5"
                ></eventTabs>
            </div>
        </transition>

        <transition
                mode="out-in"
                enter-active-class="animated fadeIn faster"
                leave-active-class="animated fadeOut faster"
                v-else
        >
            <createEvent @eventCreated="addEventToList"></createEvent>
        </transition>
    </div>
</template>

<script>
    import event from "../components/events/event";
    import eventHeader from "../components/events/event-header.vue";
    import eventTabs from "../components/events/event-tabs";
    import createEvent from "../components/events/create-event.vue";

    export default {
        name: "Events",

        data() {
            return {
                vueEvents: null,
                prevEvents: [],
                delEvents: [],
                toggleHide: true,
            };
        },

        components: {
            event,
            eventHeader,
            eventTabs,
            createEvent
        },

        mounted() {
          this.getData();
        },

        methods: {
            getData(){
                axios.get("api/events").then(response => {
                    this.vueEvents = response.data;
                });

                axios
                    .get("api/events/prev-events")
                    .then(response => (this.prevEvents = response.data));

                axios
                    .get("api/events/del-events")
                    .then(response => (this.delEvents = response.data));
            },

            deleteItem(id) {
                if (confirm('Möchtest du das Event wirklich löschen?')) {
                    axios.delete("api/events/" + id).then(response => {
                        this.flash("Event abgesagt!", "error", {
                            timeout: 3000
                        });
                        this.deletedEvent = response.data;
                        this.delEvents.push(this.deletedEvent);
                        this.vueEvents = this.vueEvents.filter(event => {
                            return event.id !== id;
                        });
                    })
                        .catch(errors => {
                            this.flash(errors.response.data, "error", {
                                timeout: 3000
                            });
                        });
                    ;
                }
            },

            hideToggle() {
                this.toggleHide = !this.toggleHide;
            },

            addEventToList(item) {
                this.flash("Event erstellt!", "success", {
                    timeout: 3000
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
