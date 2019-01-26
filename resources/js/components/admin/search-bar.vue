<template>
    <div>
        <div class="mb-3"><slot name="header"></slot></div>
        <div class="input-group input-group-lg mb-3">
            <input
                type="text"
                class="form-control"
                v-model="search"
                :placeholder="this.placeholder"
            />
        </div>

        <ul class="list-group">
            <li
                class="list-group-item"
                v-for="item in filtered"
            >
                <result :item="item"
                        :axiosUrlResult="axiosUrl"
                @emitDeleteItem="deleteItem"
                ></result>
            </li>
        </ul>
    </div>
</template>

<script>
import result from "./search-result.vue";
export default {
    components: {
        result
    },

    props: ["items", "placeholder", "axiosUrl", "name"],
    data() {
        return {
            item: this.items,
            search: "",
            hideInfo: true
        };
    },

    methods: {
        deleteItem(id) {
            if (confirm("Wollen sie den Eintrag wirklich löschen?")) {
                axios
                    .delete(this.axiosUrl + id)
                    .then(() => {
                        this.item = this.item.filter(item => {
                            return item.id !== id;
                        });
                        this.flashError(this.name + " gelöscht!", {
                            timeout: 5000
                        });
                    })
                    .catch(error => {
                        this.flashError(error.response.data, {
                            timeout: 5000
                        });
                    });
            }
        }
    },

    computed: {
        filtered: function() {
            return this.item.filter(item => {
                if (item.name){
                    return item.name.match(new RegExp(this.search, "i"));
                } else if (item.title){
                    return item.title.match(new RegExp(this.search, "i"));
                }
            });
        }
    }
};
</script>
