<template>
    <div>
        <transition
                name="fade"
                mode="out-in"
                enter-active-class="animated fadeIn faster"
                leave-active-class="animated fadeOut faster"
                v-if="editing"
        >
            <editEvent
                    :item="this.item"
                    @editing="hideEditing"

                    @completed="updateRecord"
            ></editEvent>
        </transition>
        <transition
                name="fade"
                mode="out-in"
                enter-active-class="animated fadeIn faster"
                leave-active-class="animated fadeOut faster"
                v-else
        >
            <div class="grid-wrapper align-items-center mb-4">
                <div class="item-left">
                    <p>hosted by {{ item.user ? item.user.name : item.user_name}}</p>
                    <p class="date">{{ formatDate(item.date) }}</p>
                </div>
                <div class="item-middle pl-4">
                    <h2>{{ item.title }}</h2>
                    <p>{{ item.body }}</p>
                </div>
                <div class="item-right">
                    <button
                            class="btn btn-outline-secondary"
                            @click="editing = true"
                    >
                        <i class="far fa-edit"></i> Edit
                    </button>

                    <button class="btn btn-outline-danger mt-2" @click="deleteItem">
                        <i class="far fa-trash-alt"></i> Event absagen
                    </button>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    import moment from "moment";
    import editEvent from "./edit-event.vue";

    export default {
        name: "event",
        props: {
            item: {
                title: "",
                body: "",
                date: null
            }
        },
        components: {
            editEvent
        },

        data() {
            return {
                editing: false
            };
        },
        methods: {
            formatDate(time) {
                return moment.utc(time).locale("de").fromNow();
            },
            hideEditing() {
                this.editing = false;
            },
            updateRecord(item) {
                this.item.title = item.title;
                this.item.body = item.body;
                this.item.date = item.date;
            },
            deleteItem() {
                this.$emit("deleteEvent", this.item.id);
            }
        }
    };
</script>
