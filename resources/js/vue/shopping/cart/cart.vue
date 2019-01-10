<template>
    <div>
        <h1>Was gibt es einzukaufen:</h1>
        <div v-for="items in cart_items">
            <priceForm :items="items"></priceForm>
        </div>

        <errors v-if="errors" :errors="this.errors"></errors>

        <form @submit.prevent="submit" :disabled="isDisabled">
            <button class="btn btn-outline-success">Fertig</button>
        </form>
    </div>
</template>

<script>
import priceForm from "./price-form";
import errors from "../../components/errors.vue";

export default {
    components: {
        priceForm,
        errors
    },
    props: {
        cart_items: null
    },
    data() {
        return {
            errors: null
        };
    },

    methods: {
        submit() {
            return this.onSubmit(this.cart_items[0].uniq_id);
        },

        onSubmit(id) {
            axios.post("cart/" + id).then(response => {
                if (response.data.message) {
                    this.errors = response.data;
                } else if (response.data.redirect) {
                    console.log("redirect");
                    window.location = response.data.redirect;
                }
            });
        }
    },

    computed: {
        isDisabled() {
            if (this.errors) {
                return true;
            }
            return false;
        }
    }
};
</script>
