<template>
    <div class="container mt-4">
        <div>
            <h1>Shopping list</h1>
            <app-item
                    v-for="item in items"
                    :item="item"
                    :key="item.id"
                    @deleteEvent="deleteItemHandler"
                    @updateEvent="updateItemHandler"
            >
            </app-item>
            <app-new-item @createEvent="createEventHandler"></app-new-item>
        </div>

        <div class="row mt-4" v-if="!this.errors">
            <form
                    @submit.prevent="onSubmit"
                    class="mx-auto"
                    method="post"
            >
                <button class="btn btn-outline-success" type="submit">
                    <i class="fas fa-shopping-cart"></i> Einkaufen gehen
                </button>
            </form>
        </div>

        <errors v-if="errors" :errors="this.errors"></errors>
    </div>
</template>

<script>
    import grocery from "../grocery-list/grocery";
    import appItem from "./Item";
    import appNewItem from "./NewItem";
    import errors from "../components/errors";

    export default {
        data() {
            return {
                items: [],
                errors: null,
                submitted: true
            };
        },
        components: {
            appItem,
            appNewItem,
            grocery,
            errors
        },

        mounted() {
            axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
            axios.get("api/items").then(response => {
                this.items = response.data;
                this.disableButton(this.items);
            });
        },

        methods: {
            deleteItemHandler(id) {
                axios.delete(`/shopping/${id}`).then(response => {
                });
                this.items = this.items.filter(item => {
                    return item.id !== id;
                });
                this.disableButton(this.items);
            },
            updateItemHandler(item) {
                axios.put(`/shopping/${item.id}`, item).then(response => {
                });
            },
            createEventHandler(newItem) {
                axios.post("/shopping", newItem).then(response => {
                    this.items.push(response.data);
                    newItem.name = "";
                    newItem.quantity = null;
                    this.disableButton(this.items);
                });
            },
            disableButton(data) {
                if (data.length == 0) {
                    this.$set(this, "submitted", true);
                } else {
                    this.$set(this, "submitted", false);
                }
            },

            onSubmit() {
                if (confirm('Hast du alles auf die Liste geschrieben?')) {
                    axios.post("cart").then(response => {
                        if (response.data.message) {
                            this.errors = response.data;
                        } else if (response.data.redirect) {
                            window.location = response.data.redirect;
                        }
                    });
                }
            }
        }
    };
</script>
