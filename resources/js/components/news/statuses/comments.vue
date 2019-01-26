<template>
    <div class="mt-4">
        <div v-for="comment in comments">
            <p>
                {{ comment.body }} von
                {{ comment.user ? comment.user.name : comment.user_name }}
                <span
                    role="button"
                    class="btn ml-3 text-danger"
                    @click="deleteComment(comment.id)"
                    ><i class="fas fa-minus-circle"></i
                ></span>
            </p>
        </div>

        <addStatusComment
            @completed="addComment"
            :status="status"
        ></addStatusComment>
    </div>
</template>

<script>
import addStatusComment from "./add-comment.vue";

export default {
    components: {
        addStatusComment
    },

    props:['status'],

    data() {
        return {
            comments: []
        };
    },

    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios
                .get("api/home/" + this.status.id)
                .then(response => (this.comments = response.data));
        },
        addComment(status) {
            this.comments.push(status);
        },

        deleteRequest(id){
            axios
                .delete(`api/home/comment/${id}`)
                .then(response => {
                    this.flash('Kommentar gelöscht!', "success", {
                        timeout: 3000
                    });
                    this.comments = this.comments.filter(item => {
                        return item.id !== id;
                    });
                })
                .catch(errors => {
                    this.flash(errors.response.data, "error", {
                        timeout: 3000
                    });
                });
        },

        deleteComment(id) {

            this.$dialog
                .confirm("Willst du den Kommenatr wirklich löschen?")
                .then(dialog => {
                    this.deleteRequest(id);
                    dialog.close();
                })
                .catch(() => {});
        }
    }
};
</script>
