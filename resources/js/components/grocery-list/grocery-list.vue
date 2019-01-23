<template>
    <div>
        <div
                class="list-group-item d-flex justify-content-between"
        >
            <p class=" mb-0">
                {{ item.user.name }} {{ postedOn(item.date) }}
            </p>

            <button
                    type="button"
                    class="btn btn-outline-primary btn-sm"
                    @click="show = !show"
            >
                <i class="fas fa-info-circle"></i> Info anzeigen
            </button>
        </div>
        <div class="list-group">
            <groceryDetails
                    :item="item"
                    :listItemId="item.uniq_id"
                    v-if="show"
            ></groceryDetails>
        </div>
    </div>
</template>

<script>
    import moment from "moment";
    import groceryDetails from "./grocery-details.vue";

    export default {
        components: {
            groceryDetails
        },

        props: ["item"],

        data() {
            return {
                show: false,
                listItems: []
            };
        },

        methods: {
            postedOn(status) {
                return moment.utc(status).locale("de").fromNow();
            }
        }
    };
</script>
