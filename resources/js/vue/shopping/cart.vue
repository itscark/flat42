<template>
    <div>
        <h1>Was gibt es einzukaufen: </h1>
        <div v-for="items in cart_items">
            <priceForm :items="items"></priceForm>
        </div>
        <form @submit.prevent="submit">
            <button class="btn btn-outline-success">Fertig</button>
        </form>
    </div>
</template>


<script>
    import priceForm from './cart/priceForm';

    export default {
        components: {
            priceForm
        },
        props: {
            cart_items: null,
        },
        mounted() {

        },

        data() {
            return {
                errors: {},
            }
        },

        methods: {

            submit() {
                return this.onSubmit(this.cart_items[0].uniq_id)
            },

            onSubmit(id) {
                axios
                    .post('cart/' + id)
                    .then(
                      //  window.location = '/shopping'
                    )
                    .catch(error => {
                        this.onFail(error.response.data);
                        reject(error.response.data);
                    })
            },
        }
    };
</script>
