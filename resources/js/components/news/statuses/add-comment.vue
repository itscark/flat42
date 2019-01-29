<template>
    <form
        @submit.prevent="onSubmit"
        class="form-row"
        @keydown="form.errors.clear($event.target.name)"
        @change="form.errors.clear($event.target.name)"
    >
        <div class="form-group col-md-6">
            <input
                class="form-control input-sm"
                type="text"
                name="body"
                id="body"
                placeholder="Kommentar"
                v-model="form.body"
            />
            <div
                class="invalid-feedback"
                v-if="form.errors.has('body')"
                v-text="form.errors.get('body')"
            ></div>
        </div>
        <div class="form-group col-md-6">
            <button
                class="btn btn-outline-dark  w-100"
                type="submit"
                :disabled="form.errors.any()"
            >
                <i class="fas fa-plus"></i> Kommentar posten
            </button>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        status
    },
    data() {
        return {
            form: new Form({
                body: ""
            })
        };
    },
    methods: {
        onSubmit() {
            this.form
                .post("api/home/" + this.status.id)
                .then(status => this.$emit("completed", status))
                .catch(errors => {
                    this.flash(errors.body, "error", {
                        timeout: 3000
                    });
                });
        }
    }
};
</script>
