<template>
    <div
        class="alert
         alert-danger
         d-flex
         justify-content-center"
    >
        <div class="text-center">
            <p>{{ errors.message }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["errors"],

    methods: {
       /* onSubmit(url) {
            window.location = url;
        }*/
    }
};
</script>
