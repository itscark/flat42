<template>
    <div>
        <div class="grid-wrapper align-items-center">
            <div class="item-left">
                <p class="date">{{ postedOn(item) }}</p>
                <p>{{item.user.name}} schreibt...</p>
            </div>

            <div class="item-middle">
                <p>{{item.title}}</p>

                <div class="row">
                    <div class="ml-auto">
                        <button type="button" class="btn btn-outline-primary btn-sm" @click="show = !show"><i
                                class="fas fa-comments"></i> Kommentare
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <comment-status v-if="show" :status="status"></comment-status>
    </div>
</template>

<script>
    import moment from 'moment';
    import commentStatus from "./comments.vue";

    export default {
        props: ['item'],
        components: {
            commentStatus
        },

        data() {
            return {
                show: false,
                status: this.item
            }
        },

        methods: {
            postedOn(time) {
                return moment.utc(time.created_at).fromNow();
            }
        }
    }
</script>