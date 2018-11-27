<template>
    <div>
        <div class="grid-wrapper align-items-center">
            <div class="item-left">
                <p class="date">{{ postedOn(status) }}</p>
                <p>{{status.user.name}} schreibt...</p>
            </div>

            <div class="item-middle">
                <p>{{status.title}}</p>

                <div class="row">
                    <div class="ml-auto">
                        <button type="button" class="btn btn-outline-primary btn-sm" @click="show = !show">Kommentare
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <comment-status v-if="show" v-bind:status="status"></comment-status>
    </div>
</template>

<script>
    import moment from 'moment';
    import commentStatus from "./commentStatus.vue";

    export default {
        props: ['news'],
        components: {
            commentStatus
        },

        data() {
            return {
                show: false,
                status: this.news
            }
        },
        methods: {
            postedOn(status) {
                return moment.utc(status.created_at).fromNow();
            }
        }
    }
</script>