<template>
    <form autocomplete="off" class="row mx-auto">
        <div class="form-group col-md">
            <input
                class="form-control"
                v-model="newItem.name"
                type="text"
                placeholder="Produkt..."
            />
        </div>

        <div class="form-group col-md">
            <input
                class="form-control"
                v-model="newItem.quantity"
                type="number"
                min="0"
                placeholder="Menge..."
            />
        </div>

        <div role="group" aria-label="Buttons" class="col-md">
            <button
                @click="createItem()"
                class="btn btn-outline-primary"
                type="button"
                :disabled="isDisabled"
            >
                <i class="fas fa-plus"></i> Hinzufügen
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            newItem: {
                name: "",
                quantity: null
            }
        };
    },
    methods: {
        createItem() {
            this.$emit("createEvent", this.newItem);
        }
    },
    computed: {
        isDisabled() {
            if (this.newItem.name.length < 2 || this.newItem.quantity < 1) {
                return true;
            }
            return false;
        }
    }
};
</script>
