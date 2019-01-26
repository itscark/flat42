<template>
    <form
        method="patch"
        @submit.prevent="submit"
        class="align-items-center mb-4"
        @keydown="form.errors.clear($event.target.name)"
        @change="form.errors.clear($event.target.name)"
    >
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input
                    class="form-control"
                    type="text"
                    name="title"
                    id="title"
                    v-model="form.title"
                />
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('title')"
                    v-text="form.errors.get('title')"
                ></div>
            </div>

            <div class="form-group col-md-12">
                <label for="body">Body</label>
                <textarea
                    class="form-control"
                    type="text"
                    name="body"
                    id="body"
                    v-model="form.body"
                    rows="4"
                ></textarea>
                <div
                    class="invalid-feedback"
                    v-if="form.errors.has('body')"
                    v-text="form.errors.get('body')"
                ></div>
            </div>
        </div>
        <a
            v-if="this.show"
            @click.prevent="submit"
            role="button"
            href="#"
            class="btn btn-outline-warning"
        >
            <i class="fas fa-pen"></i> Update
        </a>
        <button v-else class="btn btn-outline-danger" type="submit" @click="onSubmit">
            <i class="fas fa-check"></i> Bitte Bestätigen!
        </button>

        <hr class="m-5" />
    </form>
</template>
<script>
export default {
    name: "landing-section",

    props: ["items"],
    data() {
        return {
            show: true,
            form: new Form({
                title: "",
                body: ""
            })
        };
    },
    mounted() {
        this.setVariables();
    },
    methods: {
        setVariables() {
            this.form.title = this.items.title;
            this.form.body = this.items.body;
        },

        submit(){
            this.show = false;
        },

        onSubmit() {
            this.form
                .patch("admin/welcome/" + this.items.id)
                .then(response => {
                    this.form.title = response.title;
                    this.form.body = response.body;
                    this.show = true;
                    this.flash("Eintrag aktualisiert!", "success", {
                        timeout: 3000
                    });
                })
                .catch(error => {
                    this.flash("Eintrag nicht aktualisiert!", "error", {
                        timeout: 3000
                    });
                });
        },
        hideButton() {
            this.show = false;
        }
    }
};
</script>
