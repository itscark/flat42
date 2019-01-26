<template>
    <div>
        <div class="row mt-5 align-items-center">
            <div class="col-md-3 item-left">
                <p class="date">{{ postedOn(this.item) }}</p>
                <p>
                    {{
                    this.item.user ? this.item.user.name : this.item.user_name
                    }}
                    schreibt...
                </p>
            </div>

            <div class="col-md-6 pl-md-4 item-middle">
                <p>{{ this.item.title }}</p>
            </div>
            <div class="col-md-3">
                <div class="ml-auto w-100">
                    <button
                            type="button"
                            class="btn btn-outline-primary btn-sm w-100"
                            @click="showHideComments()"
                    >
                        <i class="fas fa-comments"></i> Kommentare
                    </button>
                </div>
            </div>

        </div>
        <transition
                name="fade"
                mode="out-in"
                enter-active-class="animated fadeInUp faster"
                leave-active-class="animated fadeOutDown faster"
        >
            <comment-status v-if="this.showHide" :status="this.item"></comment-status>
        </transition>
    </div>
</template>

<script>
    import moment from "moment";
    import commentStatus from "./comments.vue";

    export default {
        props: ["item", 'showHide'],
        components: {
            commentStatus
        },

        methods: {
            postedOn(time) {
                return moment
                    .utc(time.created_at)
                    .locale("de")
                    .fromNow();
            },
            showHideComments() {
                this.showHide = !this.showHide
            }
        }
    };
</script>
