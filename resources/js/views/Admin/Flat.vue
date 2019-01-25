<template>
    <searchTab
            v-if="this.show"
            :items="this.flats"
            :placeholder="'Wohngemeinschaft suchen ...'"
            :axiosUrl="'admin/flat/'"
            :name="'Flat'"
    >
        >
        <template slot="header">
            <h2>Wohngemeinschaften</h2>
        </template>
    </searchTab>
</template>
<script>
    import searchTab from "../../components/admin/search-tab.vue";
    export default {
        name: 'Flats',
        components:{
            searchTab,
        },
        data(){
          return{
              flats: null,
              show: false,
          }
        },
        created(){
            this.getData();
        },
        methods:{
            getData(){
                axios.get('admin/flats')
                    .then(response => {
                        this.flats = response.data;
                        this.show = true;
                    })
                    .catch(errors =>{
                    })
            }
        }
    }
</script>