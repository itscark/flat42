<template>
    <div>
        <form
            action=""
            method="patch"
            @submit.prevent="onSubmit"
            class="grid-wrapper align-items-center mb-4"
            @keydown="form.errors.clear($event.target.name)"
            @change="form.errors.clear($event.target.name)"
        >
            <div class="item-left">
                <p>hosted by {{ item.user ? item.user.name : item.user_name }}</p>
                <p class="date"></p>
            </div>
            <div class="item-middle pl-4">
                <h2>Edit Event</h2>
                <div class="form-group">
                    <label for="title">Titel</label>
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
                <div class="form-group ">
                    <label for="body">Body</label>
                    <input
                        class="form-control"
                        type="text"
                        name="body"
                        id="body"
                        v-model="form.body"
                    />
                    <div
                        class="invalid-feedback"
                        v-if="form.errors.has('body')"
                        v-text="form.errors.get('body')"
                    ></div>
                </div>

                <div class="form-group ">
                    <label for="date">Date</label>
                    <input
                        class="form-control"
                        type="date"
                        name="date"
                        id="date"
                        v-model="form.date"
                    />
                    <div
                        class="invalid-feedback"
                        v-if="form.errors.has('date')"
                        v-text="form.errors.get('date')"
                    ></div>
                </div>
            </div>
            <div class="item-right">
                <a class="btn  btn-outline-danger" href="#" role="button" @click.prevent="hideEditing"
                    ><i class="fas fa-times"></i> Cancel
                </a>

                <button class="btn btn-outline-success mt-2" type="submit">
                    <i class="fas fa-check"></i> Save
                </button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    name: "EditEvent",
    props: ["item"],
    data() {
        return {
            form: new Form({
                title: "",
                body: "",
                date: ""
            })
        };
    },
    mounted() {
        this.setVariables()
    },
    methods: {

        setVariables(){
            this.form.title = this.item.title;
            this.form.body = this.item.body;
            this.form.date = this.item.date;
        },

        hideEditing() {
            this.$emit("editing", false);
        },
        onSubmit() {
            this.form.patch("api/events/" + this.item.id).then(thatItem => {
                this.flash("Event aktualisiert!", "success", {
                    timeout: 3000
                });
                this.hideEditing();
                this.$emit("completed", thatItem);
            }).catch(errors => {
                this.flash("Event nicht aktualisiert!", "error", {
                    timeout: 3000
                });
            });
        }
    }
};
</script>
