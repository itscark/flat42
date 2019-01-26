<template>
    <b-card no-body>
        <b-tabs pills card>
            <b-tab title="Startseite" active>
                <landingPage></landingPage>
            </b-tab>
            <b-tab title="Users" >
                <users></users>
            </b-tab>
            <b-tab title="WGs">
                <flats></flats>
            </b-tab>
        </b-tabs>
    </b-card>
</template>

<script>
import searchTab from "../components/admin/search-bar.vue";
import landingPage from "./Admin/Landingpage.vue";
import flats from './Admin/Flat.vue';
import users from './Admin/Users.vue';

export default {
    name: "Admin-Page",

    props: ["users", "flats"],

    components: {
        searchTab,
        landingPage,
        users,
        flats,
    },

    data() {
        return {
            user: this.users,
            flat: this.flats
        };
    }
};
</script>
