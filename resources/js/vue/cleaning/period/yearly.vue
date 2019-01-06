<template>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Jährlich</h2>
            <p class="card-text" v-for="item in this.yearly">
                <i class="far fa-circle"></i>{{ item.title }}
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["yearly"],

        mounted() {
            console.log();
        }
    };
</script>
