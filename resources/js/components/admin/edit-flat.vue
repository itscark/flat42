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
                <label for="flat_token">Flat Token</label>
                <p
                    class="form-control"
                    type="text"
                    id="flat_token"
                    >{{form.flat_token}}</p>
            </div>

            <div class="form-group col-md-6">
                <label for="name">Flat Name</label>
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
                name: ""
            })
        };
    },
    mounted() {
        this.form.name = this.item.name;
        this.form.flat_token = this.item.flat_token;
    },
    methods: {
        onSubmit() {
            this.form.patch("admin/flat/" + this.item.id).then(response => {
                this.$emit("completedUpdateFlat", response);
            });
        }
    }
};
</script>
