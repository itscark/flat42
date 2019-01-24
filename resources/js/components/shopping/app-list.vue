<template>
    <div>
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
                <form @submit.prevent="onSubmit" class="mx-auto" method="post">
                <button class="btn btn-outline-success" type="submit">
                    <i class="fas fa-shopping-cart"></i> Einkaufen gehen
                </button>
                </form>
            </div>

            <errors
                v-if="errors"
                :errors="this.errors"
                @showCart="toggleCart"
            ></errors>
        </div>

        <history></history>
    </div>
</template>

<script>
import grocery from "../grocery-list/grocery";
import appItem from "./Item";
import appNewItem from "./NewItem";
import errors from "../errors/errors";
import history from '../grocery-list/grocery-history.vue';

export default {
    name: "Shopping-list",
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
        errors,
        history
    },

    mounted() {
        axios.get("api/items").then(response => {
            this.items = response.data;
            this.disableButton(this.items);
        });
    },

    methods: {
        toggleCart(item) {
            this.$emit("hideShowCart", item);
        },
        deleteItemHandler(id) {
            axios.delete(`api/shopping/${id}`).then(response => {
                this.flash("Item von der Liste entfernt!", "error", {
                    timeout: 3000
                });
            });
            this.items = this.items.filter(item => {
                return item.id !== id;
            });
            this.disableButton(this.items);
        },
        updateItemHandler(item) {
            axios.put(`api/shopping/${item.id}`, item).then(response => {
                this.flash("Item aktualisiert!", "success", {
                    timeout: 3000
                });
            });
        },
        createEventHandler(newItem) {
            axios.post("api/shopping", newItem).then(response => {
                this.flash("Item zur Liste hinzugefügt!", "success", {
                    timeout: 3000
                });
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
            if (confirm("Hast du alles auf die Liste geschrieben?")) {
                axios
                    .post("api/cart")
                    .then(response => {
                        if (response.data.message) {
                            this.errors = response.data;
                        } else if (response.data.redirect) {
                            this.$emit('hideShowCart')
                        }
                    })
                    .catch(errors => {
                        this.flash(errors.response.data, "error", {
                            timeout: 3000
                        });
                    });
            }
        }
    }
};
</script>
