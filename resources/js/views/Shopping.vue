<template>
    <div>
        <transition
                name="fade"
                mode="out-in"
                enter-active-class="animated fadeIn faster"
                leave-active-class="animated fadeOut faster"
                v-if="this.showList"
        >
            <list @hideShowCart="showCart"></list>
        </transition>
        <transition
                name="fade"
                mode="out-in"
                enter-active-class="animated fadeIn faster"
                leave-active-class="animated fadeOut faster"
                v-else
        >
            <cart @postCartCompleted="cartCompleted"></cart>
        </transition>
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