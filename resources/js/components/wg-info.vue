<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        <div>
                            <h4 class="modal-title">
                                {{ this.flatInfo && this.flatInfo.name }}
                            </h4>
                            <small class="text-muted">WG - Info</small>
                        </div>
                        <button class="close" @click="$emit('close')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>
                            WG-Token:
                            <strong>{{
                                this.flatInfo && this.flatInfo.flat_token
                            }}</strong>
                        </p>

                        <p>
                            WG-Mitglieder:
                            <strong>{{ userInfo && userInfo.length }}</strong>
                        </p>

                        <form
                            class="form-inline"
                            @submit.prevent="onSubmit"
                            @keydown="form.errors.clear($event.target.name)"
                        >
                            <div class="form-group mr-3">
                                <label for="newMember" class="sr-only"
                                    >Einen Freund einladen:</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="newMember"
                                    placeholder="E-Mail Adresse ... "
                                    v-model="form.email"
                                />
                                <div
                                    class="invalid-feedback"
                                    v-if="form.errors.has('email')"
                                    v-text="form.errors.get('email')"
                                ></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Freund hinzufügen
                                </button>
                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button
                            class="btn btn-outline-success"
                            @click="$emit('close')"
                        >
                            <i class="fas fa-check"></i> Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "WG-Info",
    data() {
        return {
            flatInfo: null,
            userInfo: null,
            form: new Form({
                email: ""
            })
        };
    },
    mounted() {
        axios
            .get("api/wg-info")
            .then(response => {
                this.flatInfo = response.data["flatInfo"];
                this.userInfo = response.data["userInfo"];
            })
            .catch();
    },

    methods: {
        onSubmit() {
            this.form.post("invite").then(() => {
                console.log("done");
            });
        }
    }
};
</script>

<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}

.modal-container {
    width: 90%;
    max-width: 500px;
    margin: 0 auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
}

.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
