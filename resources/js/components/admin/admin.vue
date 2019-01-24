<template>
    <b-card no-body>
        <b-tabs pills card>
            <b-tab title="Users" active>
                <searchTab
                    :items="this.user"
                    :placeholder="'User suchen ...'"
                    :axiosUrl="'api/admin/users/'"
                    :name="'User'"
                >
                    <template slot="header">
                        <h2>User</h2>
                    </template>
                </searchTab>
            </b-tab>
            <b-tab title="WGs">
                <searchTab
                    :items="this.flat"
                    :placeholder="'Wohngemeinschaft suchen ...'"
                    :axiosUrl="'api/admin/flat/'"
                    :name="'Flat'"
                >
                    >
                    <template slot="header">
                        <h2>Wohngemeinschaften</h2>
                    </template>
                </searchTab>
            </b-tab>
            <b-tab title="Blog">
                <newBlogPost></newBlogPost>
                <searchTab
                        :items="this.blog"
                        :placeholder="'Blog Beiträge durchsuchen ...'"
                        :axiosUrl="'api/admin/flat/'"
                        :name="'Blog'"
                >
                    >
                    <template slot="header">
                        <h2>Blog Beiträge</h2>
                    </template>
                </searchTab>
            </b-tab>
        </b-tabs>
    </b-card>
</template>

<script>
import searchTab from "./content/search-tab.vue";
import newBlogPost from './content/new-blog-post.vue';

export default {
    name: "Admin-Page",

    props: ["users", "flats", 'blogs'],

    components: {
        searchTab,
        newBlogPost
    },

    data() {
        return {
            user: this.users,
            flat: this.flats,
            blog: this.blogs,
        };
    }
};
</script>
