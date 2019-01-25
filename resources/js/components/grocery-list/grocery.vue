<template>
    <div class="mt-4">
        <div v-for="item in grocery_list">
            <groceryList :item="item"></groceryList>
        </div>
    </div>
</template>

<script>
import groceryList from "./grocery-list.vue";

export default {
    components: {
        groceryList
    },
    data() {
        return {
            item: null,
            grocery_list: null,
            show: false
        };
    },

    mounted() {
        this.getData();
    },

    methods: {
        getData() {
            axios
                .get("/api/shopping/grocery-history")
                .then(response => (this.grocery_list = response.data));
        }
    }
};
</script>
