<template>
    <div>
        <div class="row featurette">
            <div class="col-md-7">

                <h2 class="featurette-heading">{{ content.title }}</h2>
                <span class="text-muted">{{ content.subtitle }}</span>
                <p class="lead">{{ content.body }}</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" :src="content.img_url"
                     alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">
    </div>
</template>

<script>
    export default {
        props: ['content'],
    };
</script>