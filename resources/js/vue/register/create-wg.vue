<template>
    <div>
        <form action="" method="post" @submit.prevent="onSubmit"
              @keydown="form.errors.clear($event.target.name)">
            <h2 class="mb-5">WG erstellen!</h2>
            <div class="form-group col-md">
                <label for="name">WG Name</label>
                <input class="form-control" type="text" name="name" id="name" v-model="form.name" value="">
                <div class="invalid-feedback" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></div>
            </div>

            <div class="col-md">
                <button class="btn btn-outline-success" type="submit" :disabled="form.errors.any()"><i
                        class="fas fa-check"></i> WG erstellen
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'createWG',

        data() {
            return {
                form: new Form({
                    name: '',
                }),
            }
        },
        methods: {
            onSubmit() {
                this.form.post('/api/register/create', '/')
            },
        }
    }
</script>