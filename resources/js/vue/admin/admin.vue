<template>
    <b-card no-body>
        <b-tabs pills card>
            <b-tab title="Users" active>
                <searchTab :items="this.user"
                           :placeholder="'User suchen ...'"
                           :axiosUrl="'api/admin/users/'">
                    <template slot="header">
                        <h2>User</h2>
                    </template>
                </searchTab>
            </b-tab>
            <b-tab title="WGs">
                <searchTab
                        :items="this.flat"
                        :placeholder="'Wohngemeinschaft suchen ...'"
                        :axiosUrl="'api/admin/flat/'">
                    >
                    <template slot="header">
                        <h2>Wohngemeinschaften</h2>
                    </template>
                </searchTab>
            </b-tab>
        </b-tabs>
    </b-card>
</template>

<script>
    import searchTab from "../components/search-tab.vue";

    export default {
        name: "Admin-Page",

        props: ["users", "flats"],

        components: {
            searchTab
        },

        data() {
            return {
                user: this.users,
                flat: this.flats
            };
        }
    };
</script>
