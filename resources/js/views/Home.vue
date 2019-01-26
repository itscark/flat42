<template>
    <div>
        <h1>News</h1>
        <next-event></next-event>
        <h3 class="mt-4 mb-4">Was gibt es neues?</h3>
        <div>
            <addStatus @completed="addStatus"></addStatus>
            <div class="center-cube position-relative">
                <cube-spin
                    class="position-absolute mt-3"
                    v-show="this.showLoading"
                ></cube-spin>
            </div>
            <div v-for="item in this.status" v-show="!showLoading">
                <status :showHide="toggleComments" :item="item"></status>
            </div>
        </div>
    </div>
</template>

<script>
import status from "../components/news/statuses/status.vue";
import addStatus from "../components/news/statuses/add-status.vue";
import nextEvent from "../components/news/next-event.vue";

export default {
    props: ["news", "events"],

    components: {
        status,
        addStatus,
        nextEvent
    },

    data() {
        return {
            toggleComments: false,
            status: null,
            showLoading: true
        };
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get("api/home").then(response => {
                this.status = response.data;
            });
            setTimeout(() => {
                this.showLoading = false;
            }, 1000);
        },
        addStatus(status) {
            this.toggleComments = false;
            this.status.unshift(status);
        }
    }
};
</script>
