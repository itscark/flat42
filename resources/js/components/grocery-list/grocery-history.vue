<template>
    <div class="mt-4">
        <div class="row">
            <button
                class="btn btn-outline-dark mx-auto"
                @click="visibleGrocery = !visibleGrocery"
            >
                Vergangene Bestellungen anzeigen
            </button>
        </div>
        <transition  mode="out-in" enter-active-class="animated fadeInUp fast" leave-active-class="animated fadeOutDown faster">
        <grocery v-if="visibleGrocery"></grocery>
        </transition>
    </div>
</template>

<script>
import grocery from "./grocery";

export default {
    components: {
        grocery
    },

    data() {
        return {
            visibleGrocery: false
        };
    }
};
</script>
