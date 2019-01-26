<template>
    <transition name="fade">
    <div class="list-group cleaning-list-group">
        <div>
            <slot class="" name="title"></slot>
        </div>
        <div>
            <slot v-for="item in this.items" class="">
                <div class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <p class="align-self-center">
                            <i class="far fa-hand-point-right"></i>
                            {{ item.title }}
                        </p>
                        <button @click="deleteItem(item.id)" class="btn btn-link align-self-center">
                            <i class="fas fa-minus-circle text-danger"></i>
                        </button>
                    </div>
                </div>
            </slot>
        </div>
    </div>
    </transition>

</template>
<script>
    export default {
        name: "period",
        props: ["items"],

        methods:{
            deleteItem(id) {
                this.$dialog
                    .confirm("Willst du das Item wirklich löschen?")
                    .then(dialog => {
                        this.$emit("deleteEvent", id);
                        dialog.close();
                    })
                    .catch(() => {});
            },
        }
    };
</script>

<style scoped>


    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }

    .list-group {
        border: none;
        padding: 0.75rem 0.75rem 0.75rem 1.25rem;
        margin: 1.25rem 0;
        height: fit-content;
    }

    .list-group-item {
        border-left: none;
        border-right: none;
        border-radius: 0px;
    }

    .list-group-item:first-child {
        border-top: none;
    }

    .list-group-item:last-child{
        border-bottom: none;
    }


    .d-flex p {
        margin-bottom: 0;
    }

    @media only screen and (min-width: 680px) {
        .list-group {
            margin: 1.25rem;
        }
    }
</style>
