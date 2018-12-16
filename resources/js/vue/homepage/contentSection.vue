<template>
    <div class="section fp-auto-height-responsive" :id="this.sectionId">
        <div class="grid">
            <simple-svg
                    :filepath="this.filepath"
                    :width="'100%'"
                    :height="'100%'"
                    :id="this.title"
                    :class="this.classes"
                    class="grid-content img"
            />
            <div class="grid-content text">
                <div>
                    <h2 class="opacity" :class="this.title">{{ this.title }}</h2>
                    <p class="opacity" :class="this.title">{{ this.content }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

    .grid {
        display: grid;
        grid-gap: 40px;
        min-height: 600px;
        grid-template-areas: "img" "text";
    }

    .grid-content {
        justify-self: center;
        align-self: center;
    }

    .img {
        grid-area: img;
    }

    .text {
        grid-area: text;
        text-align: justify;
    }

    @media screen and (min-width: 600px) {
        .grid {
            grid-template-columns: 1fr 1fr;
            grid-template-areas: "img text";
        }

        .grid-content {
            width: 100%;
        }
    }
</style>

<script>
    export default {

        props:['filepath', 'title', 'content', 'classes', 'sectionId'],

        data(){
            return{

            }
        }
    }
</script>