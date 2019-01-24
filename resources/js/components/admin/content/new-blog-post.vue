<template>
    <div>
        <h2>Neuer Blog Post</h2>
        <form
            method="post"
            @submit.prevent="onSubmit"
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
                    <label for="text">Text</label>
                    <textarea
                        class="form-control"
                        id="text"
                        name="text"
                        v-model="form.text"
                        rows="3"
                    ></textarea>
                    <div
                        class="invalid-feedback"
                        v-if="form.errors.has('text')"
                        v-text="form.errors.get('text')"
                    ></div>
                </div>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="published" name="published" v-model="form.published" id="published">
                <label class="form-check-label" for="published">
                    Veröffentlichen
                </label>
            </div>
            <button class="btn btn-outline-success" type="submit">
                <i class="fas fa-check"></i> Veröffentlichen
            </button>
        </form>
    </div>
</template>
<script>
export default {
    name: "newBlogPost",
    data() {
        return {
            form: new Form({
                title: "",
                text: "",
            })
        };
    },
    mounted() {
        this.form.title = this.title;
        this.form.text = this.text;
    },
    methods: {
        onSubmit() {
            this.form.post("api/admin/blog").then(response => {
                console.log("post submitted");
            });
        }
    }
};
</script>
