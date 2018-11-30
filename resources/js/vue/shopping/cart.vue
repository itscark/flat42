<template>
    <div>
        <div v-for="item in cart_items">
            <div>
                {{ item.name }} {{ item.user.name }}
            </div>
        </div>
        <form action="">
            <button class="btn btn-outline-success">Fertig</button>
        </form>
    </div>
</template>


<script>
    export default {
        props: {
            cart_items: null,
        },
        mounted() {
        },

        methods: {

        }
    };
</script>
