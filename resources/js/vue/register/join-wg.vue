<template>
    <div>
        <form
            action=""
            method="post"
            @submit.prevent="onSubmit"
            @keydown="form.errors.clear($event.target.name)"
        >
            <h2 class="mb-5">WG beitreten</h2>
            <div class="form-group col-md">
                <label for="token">WG Token</label>
                <input
                    class="form-control"
                    type="text"
                    name="token"
                    id="token"
                    v-model="form.token"
                    value=""
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('token')"
                    v-text="form.errors.get('token')"
                ></div>
            </div>

            <div class="col-md">
                <button
                    class="btn btn-outline-success"
                    type="submit"
                    :disabled="form.errors.any()"
                >
                    <i class="fas fa-check"></i> WG beitreten
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "joinWg",
    data() {
        return {
            form: new Form({
                token: ""
            })
        };
    },
    methods: {
        onSubmit() {
            this.form
                .post("/api/register/join")
                .then(() => {
                    window.location = "/";
                })
                .catch(response => {
                    console.log(response.error);
                });
        }
    }
};
</script>
