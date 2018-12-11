<template>
    <div>
        <div v-for="item in status">
            <status :item="item"></status>
        </div>
    </div>
</template>

<script>
    import status from './status.vue'

    export default {
        props: ['news'],
        components: {
            status,
        },

        data() {
            return {
                show: false,
                status: this.news,
            }
        }
    }
</script>