<template>
    <div class="mt-lg-5">
        <div class="row justify-content-around">
            <button class="btn btn-outline-primary" @click="showCreateForm">
                <i class="fas fa-plus"></i> WG erstellen
            </button>
            <button class="btn btn-outline-primary" @click="showJoinForm">
                <i class="fas fa-sign-in-alt"></i> WG beitreten
            </button>
        </div>

        <div class="mt-5">
            <createWg v-if="this.showCreate"></createWg>
            <joinWg v-if="this.showJoin"></joinWg>
        </div>
    </div>
</template>

<script>
import createWg from "./create-wg";
import joinWg from "./join-wg";

export default {
    name: "RegisterWg",

    components: {
        createWg,
        joinWg
    },

    data() {
        return {
            showCreate: true,
            showJoin: false
        };
    },

    methods: {
        showCreateForm() {
            this.showJoin = false;
            this.showCreate = true;
        },
        showJoinForm() {
            this.showCreate = false;
            this.showJoin = true;
        }
    }
};
</script>
