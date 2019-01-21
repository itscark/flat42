<template>
<div>
    <h2 class=" mb-3">Mitglieder</h2>
    <div class="input-group input-group-lg mb-3">
        <input type="text" class="form-control" v-model="search" placeholder="User suchen ..."/>
    </div>
    <ul class="list-group">
        <li class="list-group-item" v-for="item in filtered">
            {{item.name}}
        </li>
    </ul>
</div>
</template>

<script>
    export default {
        name:'Users',
        props:['users'],
        data(){
            return {
                user: this.users,
                search:'',
            }
        },
        computed:{
            filtered:function(){
                return this.user.filter(item => {
                    return item.name.match(new RegExp(this.search, 'i'))
                });
            }
        }

    }
</script>