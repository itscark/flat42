<template>

    <div class="card-deck mb-5">
        <div class="card" v-for="item in this.event">
            <div class="card-body">
                <h5 class="card-title">{{ item.title }}
                    <small class="text-muted">{{ postedOn(item.date) }}</small>
                </h5>
                <p class="card-text">{{ item.body }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        props: ['event'],

        methods: {
            postedOn(time) {
                return moment.utc(time).fromNow();
            }
        }
    }
</script>