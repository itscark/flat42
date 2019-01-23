<template>
    <div>
        <form
            class="row"
            method="post"
            @keydown="form.errors.clear($event.target.name)"
        >
            <div class="col-6 align-self-center">
                <p class="">{{ item.name }} von {{ item.user.name }}</p>
            </div>
            <div class="col-3 align-self-center">
                <p>{{ item.price }} €</p>
            </div>
            <div class="col-3 form-group">
                <input
                    class="form-control"
                    type="number"
                    step="0.01"
                    name="price"
                    id="price"
                    v-model.trim="form.price"
                    placeholder="Preis..."
                    @blur="onSubmit(item.id)"
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('price')"
                    v-text="form.errors.get('price')"
                ></div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        items:null,
    },
    data() {
        return {
            item: this.items,
            response_data: [],
            form: new Form({
                price: ""
            }),

        };
    },

    mounted() {},
    methods: {
        onSubmit(id) {
            this.form
                .post("api/cart/item/" + id)
                .then(response =>{
                    this.response_data = response;
                    this.item.price =  this.response_data.price;
                });
        }
    }
};
</script>
