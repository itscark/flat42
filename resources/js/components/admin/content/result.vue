<template>
    <div>
        <div v-show="showEdit" class="row">
            <p class="col">{{ item.name }}</p>
            <div class="col mr-auto">
                <button
                        type="button"
                        class="btn btn-outline-info"
                        @click="showEdit = !showEdit"
                >
                    <i class="fas fa-info"></i> Info
                </button>

                <button
                        type="button"
                        class="btn btn-outline-danger"
                        @click="emitDeleteItem(item.id)"
                >
                    <i class="fas fa-trash-alt"></i> Löschen
                </button>
            </div>
        </div>
        <div v-if="!showEdit">
            <button
                    type="button"
                    class="btn btn-outline-info mb-2"
                    @click="showEdit = !showEdit"
            >
                <i class="fas fa-times"></i> close
            </button>

            <div v-if="this.axiosUrlResult == 'api/admin/users/'">
                <editUser :item="item"
                      @completedUpdate="updateRecordUser"></editUser>
            </div>

            <div v-else>
                <editFlat :item="item"
                          @completedUpdateFlat="updateRecordFlat"></editFlat>
            </div>


        </div>
    </div>

</template>
<script>
    import editUser from './edit-user.vue';
    import editFlat from './edit-flat.vue';

    export default {
        components: {
            editUser,
            editFlat,
        },
        name: 'result',
        props: ['item', 'axiosUrlResult'],
        data() {
            return {
                showEdit: true
            }
        },
        mounted(){
            console.log('result: ' + this.axiosUrlResult)
        },
        methods: {
            emitDeleteItem(id) {
                this.$emit("emitDeleteItem", id)
            },
            updateRecordUser(response) {
                this.showEdit = !this.showEdit;
                this.item.name = response.name;
            },

            updateRecordFlat(response) {
                this.showEdit = !this.showEdit;
                this.item.name = response.name;
            }
        }
    }
</script>