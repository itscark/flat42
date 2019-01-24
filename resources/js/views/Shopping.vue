<template>
    <div>
        <list v-if="this.showList" @hideShowCart="showCart"></list>
        <cart v-else @postCartCompleted="cartCompleted"></cart>
    </div>
</template>b

<script>
    import list from '../components/shopping/app-list.vue';
    import cart from '../components/shopping/cart/cart.vue';

    export default {
        name: "Shopping",
        components: {
            list,
            cart,
        },
        data() {
            return {
                showList: true,
            }
        },
        methods: {
            showCart() {
                this.showList = !this.showList;
            },
            cartCompleted() {
                this.showList = !this.showList;
            }
        }

    }
</script>