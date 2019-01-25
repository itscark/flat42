<template>
    <div>
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
                v-bind:status="status"
        ></addStatusComment>
    </div>
</template>

<script>
    import addStatusComment from "./add-comment.vue";

    export default {
        components: {
            addStatusComment
        },

        props: {
            status
        },

        data() {
            return {
                comments: []
            };
        },

        mounted() {
            axios
                .get("api/home/" + this.status.id)
                .then(response => (this.comments = response.data));
        },
        methods: {
            addComment(status) {
                this.comments.push(status);
            },
            deleteComment(id) {
                if (confirm("Willst du den Kommenatr wirklich löschen?")) {
                    axios
                        .delete(`api/home/comment/${id}`)
                        .then(response => {
                            this.comments = this.comments.filter(item => {
                                return item.id !== id;
                            });
                        })
                        .catch(errors => {
                            this.flash(errors.response.data, "error", {
                                timeout: 3000
                            });
                        });
                }
            }
        }
    };
</script>
