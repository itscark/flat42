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
        <grocery v-if="visibleGrocery"></grocery>
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
