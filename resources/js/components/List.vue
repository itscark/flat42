<template>
    <div class="container mt-4">
        <div>
            <h1>Shopping list</h1>
                <app-item
                        v-for="item in items"
                        :item="item"
                        :key="item.id"
                        @deleteEvent="deleteItemHandler"
                        @updateEvent="updateItemHandler">
                </app-item>
                <app-new-item
                        @createEvent="createEventHandler">
                </app-new-item>
        </div>

        <div class="row mt-4">
            <form class="mx-auto" action="" method="post">
                <button :disabled="submitted" @click="disableButton" class="btn btn-outline-success" type="submit">Einkaufen gehen</button>
            </form>
        </div>
    </div>

</template>

<script>
    import appItem from "./Item";
    import appNewItem from "./NewItem";

    export default {
        data() {
            return {
                items: [],
                errors: [],
                submitted: true,
            };
        },
        components: {
            appItem,
            appNewItem
        },

        mounted() {
            axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

            axios
                .get("api/items")
                .then(response => {
                    this.items = response.data;
                    this.disableButton(this.items);
                })
        },

        methods: {
            deleteItemHandler(id) {
                axios
                    .delete(`/shopping/${id}`)
                    .then(response => {
                    });
                this.items = this.items.filter(item => {
                    return item.id !== id;
                });
                this.disableButton(this.items);
            },
            updateItemHandler(item) {
                axios
                    .put(`/shopping/${item.id}`, item)
                    .then(response => {
                    })
            },
            createEventHandler(newItem) {
                axios
                    .post("/shopping", newItem)
                    .then(response => {
                        this.items.push(response.data);
                        newItem.name = "";
                        newItem.quantity = null;
                        this.disableButton(this.items);
                    })
            },
            disableButton(data) {
                if (data.length == 0) {
                    this.$set(this, 'submitted', true)
                } else {
                    this.$set(this, 'submitted', false)
                }
            },
        }
    };
</script>
