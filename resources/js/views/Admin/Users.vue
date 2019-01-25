<template>
    <searchTab
            v-if="this.show"
            :items="this.user"
            :placeholder="'User suchen ...'"
            :axiosUrl="'admin/users/'"
            :name="'User'"
    >
        <template slot="header">
            <h2>User</h2>
        </template>
    </searchTab>
</template>
<script>
    import searchTab from "../../components/admin/search-tab.vue";
    export default {
        name: 'Users',
        components:{
            searchTab,
        },
        data(){
          return {
              user: null,
              show: false,
          }
        },
        methods:{
            getData(){
                axios.get('admin/users')
                    .then(response => {
                        this.user = response.data;
                        this.show = true
                    })
                    .catch(errors => {})
            }
        },
        created() {
            this.getData()
        }
    }
</script>