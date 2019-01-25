<template>
    <div>
        <div v-for="item in this.items">
            <landingSection :items="item"></landingSection>
        </div>
    </div>
</template>
<script>
    import landingSection from '../../components/admin/landing-page-section.vue'
export default {
    name: "landingPage",

    components :{
        landingSection
    },

    data() {
        return {
            items: [],
        };
    },

    mounted() {
        this.getData();
    },

    methods: {
        getData() {
            axios.get("admin/welcome").then(response => {
                this.items = response.data;
            });
        }
    },

};
</script>
