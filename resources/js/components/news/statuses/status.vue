<template>
    <div>
        <div class="grid-wrapper align-items-center">
            <div class="item-left">
                <p class="date">{{ postedOn(this.item) }}</p>
                <p>
                    {{
                        this.item.user ? this.item.user.name : this.item.user_name
                    }}
                    schreibt...
                </p>
            </div>

            <div class="item-middle pl-4">
                <p>{{ this.item.title }}</p>

                <div class="row">
                    <div class="ml-auto">
                        <button
                            type="button"
                            class="btn btn-outline-primary btn-sm"
                            @click="showHideComments()"
                        >
                            <i class="fas fa-comments"></i> Kommentare
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <transition
            name="fade"
            mode="out-in"
            enter-active-class="animated fadeInUp faster"
            leave-active-class="animated fadeOutDown faster"
        >
            <comment-status v-if="this.show" :status="this.item"></comment-status>
        </transition>
    </div>
</template>

<script>
import moment from "moment";
import commentStatus from "./comments.vue";

export default {
    props: ["item"],
    components: {
        commentStatus
    },

    data() {
        return {
            show: false
        };
    },

    methods: {
        postedOn(time) {
            return moment
                .utc(time.created_at)
                .locale("de")
                .fromNow();
        },
        showHideComments(){
            this.show = !this.show
        }
    }
};
</script>
