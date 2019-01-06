<template>
    <div>
        <div v-for="comment in comments">
            <p>
                {{ comment.body }} by
                {{ comment.user ? comment.user.name : comment.user_name }}
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
        }
    }
};
</script>
