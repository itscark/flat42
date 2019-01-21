<template>
    <div>
        <div class="mb-3">
            <slot name="header"></slot>
        </div>
        <div class="input-group input-group-lg mb-3">
            <input type="text" class="form-control" v-model="search" :placeholder="this.placeholder"/>
        </div>

        <ul class="list-group">
            <li class="list-group-item list-group-item-action row" v-for="item in filtered">
                <p>{{item.name}}</p>
                <button type="button" class="btn btn-outline-info">Info</button>
                <button type="button" class="btn btn-outline-danger" @click="deleteItem(item.id)">Löschen</button>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['items', 'placeholder', 'axiosUrl'],
        data() {
            return {
                item: this.items,
                search: '',
            }
        },

        methods:{
          deleteItem(id){
              console.log(id),
              axios.delete(this.axiosUrl + id)
                  .then(response => {
                      console.log(response)
                  })
          },
        },

        computed: {
            filtered: function () {
                return this.item.filter(item => {
                    return item.name.match(new RegExp(this.search, 'i'))
                });
            }
        }
    }
</script>