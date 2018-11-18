<template>
    <form @submit.prevent="onSubmit" class="row">
        <div class="form-group col-6">
            <input class="form-control" type="text" name="title" id="title" placeholder="Was willst du mitteilen?">
        </div>
        <div class="col">
            <button class="btn btn-outline-dark" type="submit"><i class="fas fa-plus"></i> Status posten</button>
        </div>
    </form>
</template>

<script>

    export default {
        data() {
            return {
                form: new Form({ title: ''})
            }
        },

        methods: {
            onSubmit() {

            }
        }
    }
</script>