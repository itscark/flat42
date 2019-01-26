<template>
    <div>
        <h1>Was gibt es einzukaufen:</h1>
        <div v-for="items in cart_items">
            <priceForm :items="items"></priceForm>
        </div>

        <errors v-if="errors" :errors="this.errors" ></errors>

        <form @submit.prevent="submit">
            <button class="btn btn-outline-success w-100 mt-4">Fertig</button>
        </form>
    </div>
</template>

<script>
import priceForm from "./price-form";
import errors from "../../errors/errors.vue";

export default {
    components: {
        priceForm,
        errors
    },
    props: {

    },
    data() {
        return {
            errors: null,
            cart_items: null
        };
    },

    mounted(){
       this.getData();
    },

    methods: {
        getData(){
            axios.get('/api/cart').then(response => {
                this.cart_items = response.data
            });
        },
        submit() {
            return this.onSubmit(this.cart_items[0].uniq_id);
        },

        onSubmit(id) {
            axios.post("api/cart/" + id).then(response => {
                if (response.data.message) {
                    this.errors = response.data;
                } else if (response.data.redirect) {
                    this.$emit('postCartCompleted', id)
                }
            });
        }
    },

    computed: {
        isDisabled() {
            if (this.errors) {
                return true;
            } else {
                return false;
            }
        }
    }
};
</script>
