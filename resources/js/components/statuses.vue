<template>
    <div class="grid-wrapper align-items-center">
        <div class="item-left">
            <p class="date">{{ postedOn(status) }}</p>
            <p>{{status.user.name}} schreibt...</p>
        </div>

        <div class="item-middle">
            <p>{{status.title}}</p>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        props: ['news'],
        data() {
            return {
                status: this.news
            }
        },
        methods:{
            postedOn(status){
                return moment(status.created_at).startOf('hour').fromNow();
            }
        }
    }
</script>