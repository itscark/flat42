<template>
    <form
        method="patch"
        @submit.prevent="onSubmit"
        class="align-items-center mb-4"
        @keydown="form.errors.clear($event.target.name)"
        @change="form.errors.clear($event.target.name)"
    >
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input
                    class="form-control"
                    type="text"
                    name="name"
                    id="name"
                    v-model="form.name"
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('name')"
                    v-text="form.errors.get('name')"
                ></div>
            </div>

            <div class="form-group col-md-6">
                <label for="role">Rolle</label>
                <select
                    class="form-control"
                    type="text"
                    name="role"
                    id="role"
                    v-model="form.role"
                >
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('role')"
                    v-text="form.errors.get('role')"
                ></div>
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input
                    class="form-control"
                    type="email"
                    name="email"
                    id="email"
                    v-model="form.email"
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('email')"
                    v-text="form.errors.get('email')"
                ></div>
            </div>

            <div class="form-group col-md-6">
                <label for="flat_id">Flat ID</label>
                <input
                    class="form-control"
                    type="text"
                    name="flat_id"
                    id="flat_id"
                    v-model="form.flat_id"
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('flat_id')"
                    v-text="form.errors.get('flat_id')"
                ></div>
            </div>

            <div class="form-group col-md-6">
                <label for="cart_id">Cart ID</label>
                <input
                    class="form-control"
                    type="text"
                    name="cart_id"
                    id="cart_id"
                    v-model="form.cart_id"
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('cart_id')"
                    v-text="form.errors.get('cart_id')"
                ></div>
            </div>
        </div>
        <button class="btn btn-outline-success" type="submit">
            <i class="fas fa-check"></i> Save
        </button>
    </form>
</template>

<script>
export default {
    name: "edit-result",
    props: ["item"],
    data() {
        return {
            form: new Form({
                name: "",
                role: "",
                email: "",
                flat_id: "",
                cart_id: ""
            })
        };
    },
    mounted() {
        this.form.name = this.item.name;
        this.form.role = this.item.role;
        this.form.email = this.item.email;
        this.form.flat_id = this.item.flat_id;
        this.form.cart_id = this.item.cart_id;
    },
    methods: {
        onSubmit() {
            this.form.patch("api/admin/user/" + this.item.id).then(response => {
                this.$emit("completedUpdate", response);
            });
        }
    }
};
</script>
