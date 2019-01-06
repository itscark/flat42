<template>
    <div>
        <form
            @submit.prevent="onSubmit"
            class="card"
            @keydown="form.errors.clear($event.target.name)"
        >
            <div class="card-header"><h2>Tätigkeit hinzufügen</h2></div>
            <div class="card-body">
                <div class="form-group">
                    <input
                        class="form-control input-sm"
                        type="text"
                        name="body"
                        id="body"
                        placeholder="Was ist zu tun ?"
                        v-model="form.title"
                    />
                    <div
                        class="invalid-feedback"
                        v-if="form.errors.has('title')"
                        v-text="form.errors.get('title')"
                    ></div>
                </div>

                <div class="form-group">
                    <label for="period">Die Häufigkeit auswählen...</label>
                    <select
                        class="form-control"
                        id="period"
                        v-model="form.period"
                    >
                        <option v-for="item in this.period" :value="item.id">{{
                            item.name
                        }}</option>
                    </select>
                    <div
                        class="invalid-feedback"
                        v-if="form.errors.has('period')"
                        v-text="form.errors.get('period')"
                    ></div>
                </div>

                <div class="form-group">
                    <button
                        class="btn btn-outline-dark btn-sm"
                        type="submit"
                        :disabled="form.errors.any()"
                    >
                        <i class="fas fa-plus"></i> Tätigkeit hinzufügen
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    props: ["period"],

    data() {
        return {
            form: new Form({
                title: "",
                period: []
            }),
            toDo: []
        };
    },

    methods: {
        onSubmit() {
            this.form
                .post("api/cleaning/")
                .then(toDo => this.$emit("completed", toDo));
        }
    }
};
</script>
