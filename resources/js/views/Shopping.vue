<template>
    <div>
        <app-list v-if="this.showList" @hideShowCart="showCart"></app-list>
        <cart v-else @postCartCompleted="cartCompleted"></cart>
    </div>
</template>b

<script>
    export default {
        name:"Shopping",
        data(){
            return{
                showList: true,
            }
        },
        methods:{
            showCart(){
                this.showList = !this.showList;
            },
            cartCompleted(){
                this.showList = !this.showList;
            }
        }

    }
</script>