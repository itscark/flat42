<template>
    <div
        class="alert
         alert-danger
         d-flex
         justify-content-center
mt-4"

    >
        <div class="text-center">
            <p>{{ errors.message }}</p>
            <button
                    @click="onSubmit()"
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
       onSubmit() {
           this.$emit('showCart', this.errors.showCart)
        }
    }
};
</script>
