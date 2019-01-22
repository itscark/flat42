<template>
    <div class="row align-items-center mb-4">
        <h1>Events</h1>
        <div class="ml-auto">
            <button
                type="button"
                class=" btn btn-outline-success"
                @click="toggleVisibl"
                v-if="this.toddleHide"
            >
                <i class="fas fa-plus"></i> Event erstellen
            </button>
            <button
                type="button"
                class=" btn btn-outline-danger"
                @click="toggleVisibl"
                v-else
            >
                <i class="fas fa-chevron-left"></i> Zurück
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "eventHeader",
    props: ["toddleHide"],
    methods: {
        toggleVisibl() {
            this.$emit("toggleVisible");
        }
    }
};
</script>
