<template>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Wöchentlich</h2>
            <p class="card-text" v-for="item in this.weekly">
                <i class="far fa-circle"></i> {{ item.title }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["weekly"],

    mounted() {
        console.log();
    }
};
</script>
