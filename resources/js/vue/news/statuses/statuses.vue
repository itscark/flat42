<template>
    <div>
        <addStatus @completed="addStatus"></addStatus>

        <div v-for="item in status">
            <status :item="item"></status>
        </div>
    </div>
</template>

<script>
    import status from './status.vue'
    import addStatus from './add-status.vue'

    export default {
        props: ['news'],

        components: {
            status,
            addStatus
        },

        data() {
            return {
                show: false,
                status: this.news,
            }
        },

        methods: {
            addStatus(status){
                this.status.unshift(status)
            }
        },
    }
</script>