<template>
    <div>
        <h1>Putzplan</h1>
        <div class="card-wrapper mt-3">
            <period :items="toDos['daily']" @deleteEvent="deleteItem">
                <h2 slot="title">Täglich</h2>
            </period>

            <period :items="toDos['weekly']" @deleteEvent="deleteItem">
                <h2 slot="title">Wöchentlich</h2>
            </period>

            <period :items="toDos['monthly']" @deleteEvent="deleteItem">
                <h2 slot="title">Monatlich</h2>
            </period>

            <period :items="toDos['yearly']" @deleteEvent="deleteItem">
                <h2 slot="title">Jährlich</h2>
            </period>
        </div>

        <div>
            <button
                type="button"
                class="btn btn-outline-danger btn-size mt-5"
                @click="showHideButton"
                v-if="this.show"
            >
                <i class="fas fa-times"></i> Schließen
            </button>

            <button
                type="button"
                class="btn btn-outline-success btn-size mt-5"
                @click="showHideButton"
                v-else
            >
                <i class="fas fa-plus"></i> Tätigkeit hinzufügen
            </button>
        </div>

        <transition
            mode="out-in"
            enter-active-class="animated fadeInUp faster"
            leave-active-class="animated fadeOutDown faster"
        >
            <newItem v-if="show" @completed="addToDo"></newItem>
        </transition>
    </div>
</template>
<script>
import newItem from "../components/cleaning/new-item.vue";
import period from "../components/period.vue";

export default {
    components: {
        newItem,
        period
    },

    data() {
        return {
            toDos: [],
            removedToDo: {},
            show: false
        };
    },

    mounted() {
        this.getData();
    },

    methods: {
        getData() {
            axios
                .get("api/cleaning/details")
                .then(response => (this.toDos = response.data));
        },
        showHideButton() {
            this.show = !this.show;
        },
        addToDo(toDo) {
            this.flash("Tätigkeit hinzugefügt!", "success", {
                timeout: 3000
            });
            if (toDo.period_id === 1) {
                this.toDos["daily"].push(toDo);
            } else if (toDo.period_id === 2) {
                this.toDos["weekly"].push(toDo);
            } else if (toDo.period_id === 3) {
                this.toDos["monthly"].push(toDo);
            } else if (toDo.period_id === 4) {
                this.toDos["yearly"].push(toDo);
            }
        },
        deleteItem(id) {
            axios.delete(`api/cleaning/${id}`).then(response => {
                this.flash("Tätigkeit gelöscht!", "info", {
                    timeout: 3000
                });
                this.removedToDo = response.data;
                if (this.removedToDo.period_id == 1) {
                    this.toDos["daily"] = this.toDos["daily"].filter(item => {
                        return item.id !== id;
                    });
                } else if (this.removedToDo.period_id == 2) {
                    this.toDos["weekly"] = this.toDos["weekly"].filter(item => {
                        return item.id !== id;
                    });
                } else if (this.removedToDo.period_id == 3) {
                    this.toDos["monthly"] = this.toDos["monthly"].filter(
                        item => {
                            return item.id !== id;
                        }
                    );
                } else if (this.removedToDo.period_id == 4) {
                    this.toDos["yearly"] = this.toDos["yearly"].filter(item => {
                        return item.id !== id;
                    });
                }
            });
        }
    }
};
</script>

<style scoped>
.btn-size {
    width: 100%;
    height: 50px;
}

.card-wrapper {
    display: grid;
    grid-template-columns: 1fr;
    grid-auto-rows: minmax(min-content, max-content);
}

@media only screen and (min-width: 680px) {
    .card-wrapper {
        grid-template-columns: 1fr 1fr;
    }
}
</style>
