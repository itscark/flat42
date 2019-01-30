<template>
    <div>
        <div v-if="this.show">
            <h3>Geplante Events</h3>
            <div class="card-deck mb-5">
                <div class="card" v-for="item in this.event">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ item.title }}
                            <small class="text-muted">{{ postedOn(item.date) }}</small>
                        </h5>
                        <p class="card-text">{{ item.body }}</p>
                    </div>
                </div>
            </div>
        </div>
        <h3 v-else>Keine geplanten Events</h3>
    </div>
</template>

<script>
    import moment from "moment";
    export default {

        data(){
            return{
                event:null,
                show: false,
            }
        },

        methods: {
            postedOn(time) {
                return moment.utc(time).locale("de").fromNow();
            },
        },

        created() {
            axios.get('api/home/events')
                .then(response => {
                    if(response.data.length > 0){
                        this.event = response.data;
                        this.show = true;
                    } else{
                       this.show = false
                    }


                });
        },
    };
</script>
