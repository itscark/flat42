<template>
    <div
        class="alert
         alert-danger
         d-flex
         justify-content-center"
    >
        <div class="text-center">
            <p>{{ errors.message }}</p>
            <button
                @click="onSubmit(errors.url)"
                class="btn btn-outline-warning"
                v-if="errors.btn"
            >
                {{ errors.btn }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["errors"],

    methods: {
        onSubmit(url) {
            window.location = url;
        }
    }
};
</script>
