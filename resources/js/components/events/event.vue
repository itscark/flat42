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
            <div class="row mt-5 align-items-center">
                <div class="col-md-3 item-left">
                    <p class="date">{{ formatDate(item.date) }}</p>
                    <p>hosted by {{ item.user ? item.user.name : item.user_name}}</p>
                </div>

                <div class="col-md-6 pl-md-4 item-middle">
                    <h2>{{ item.title }}</h2>
                    <p>{{ item.body }}</p>
                </div>
                <div class="col-md-3">
                    <div class="ml-auto">
                    <button
                            class="btn btn-outline-secondary mt-2 w-100"
                            @click="editing = true"
                    >
                        <i class="far fa-edit"></i> Bearbeiten
                    </button>

                    <button class="btn btn-outline-danger mt-2 w-100" @click="deleteItem">
                        <i class="far fa-trash-alt"></i> Event absagen
                    </button>
                    </div>
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
