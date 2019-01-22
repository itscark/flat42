<template>
    <div>
        <div class="mt-3 mb-3">
            <h1>Erstellen</h1>
        </div>
        <form
            action=""
            method="post"
            @submit.prevent="onSubmit"
            @keydown="form.errors.clear($event.target.name)"
            @change="form.errors.clear($event.target.name)"
        >
            <div class="form-group col-md">
                <label for="title">Titel</label>
                <input
                    class="form-control"
                    type="text"
                    name="title"
                    id="title"
                    v-model="form.title"
                    value=""
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('title')"
                    v-text="form.errors.get('title')"
                ></div>
            </div>
            <div class="form-group col-md">
                <label for="body">Schreib etwas nettes</label>
                <textarea
                    class="form-control"
                    name="body"
                    v-model="form.body"
                    id="body"
                    placeholder="Poste etwas neues"
                ></textarea>
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('body')"
                    v-text="form.errors.get('body')"
                ></div>
            </div>

            <div class="form-group col-md-4">
                <label for="date">Wann findet es statt</label>
                <input
                    v-model="form.date"
                    class="form-control"
                    type="date"
                    id="date"
                    name="date"
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('date')"
                    v-text="form.errors.get('date')"
                ></div>
            </div>

            <div class="col-md">
                <button
                    class="btn btn-outline-success"
                    type="submit"
                    :disabled="form.errors.any()"
                >
                    <i class="fas fa-plus"></i> Event planen
                </button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    name: "createEvent",
    data() {
        return {
            form: new Form({
                title: "",
                body: "",
                date: ""
            })
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post("../api/events/create")
                .then(item=>{
                    this.$emit('eventCreated', item)
                });
        }
    }
};
</script>
