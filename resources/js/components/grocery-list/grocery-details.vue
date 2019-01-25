<template>
    <div>
        <div class="list-group-item" v-for="listItem in listItems">
            <div class="row">
                <p class="col align-items-center ">
                    {{ listItem.quantity }}x {{ listItem.name }} von
                    {{ listItem.user.name }}
                </p>
                <p class="col align-middle ">Preis: {{ listItem.price }} €</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["listItemId"],
    data() {
        return {
            listItems: null
        };
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios
                .get("api/shopping/grocery-history/" + this.listItemId)
                .then(response => (this.listItems = response.data));
        }
    }
};
</script>
