<template>
            <form autocomplete="off" class="row mx-auto">

                <div class="form-group col-md">
                    <input @change="inputChanged()" class="form-control" type="text" id="name" v-model="item.name">
                </div>
                <div class="form-group col-md">
                    <input @change="inputChanged()" type="number" class="form-control" id="quantity" v-model="item.quantity">
                </div>
                <!--
                Only show if user-id is the same as the Loggedin User
                -->
                <div class="form-group col-md" role="group" aria-label="Buttons">
                    <button @click="updateItem()" class="btn btn-outline-warning" type="button"><i aria-hidden="true"></i> <i class="far fa-edit"></i> Update</button>
                    <button @click="deleteItem()"  class="btn btn-outline-danger" type="button"><i aria-hidden="true"></i> <i class="far fa-trash-alt"></i> Delete</button>
                </div>
            </form>
</template>


<script>
    export default {
        props: {
            item: {}
        },
        data() {
            return {
                isDisabled: true
            };
        },
        methods: {
            deleteItem() {
                this.$emit("deleteEvent", this.item.id);
            },
            updateItem() {
                this.isDisabled = true;
                this.$emit("updateEvent", this.item);
            },
            inputChanged() {
                if (this.item.name.length < 3 || this.item.quantity < 1) {
                    this.isDisabled = true;
                } else {
                    this.isDisabled = false;
                }
            }
        }
    };
</script>
