require("./bootstrap");


require("./utilities/scrolloverflow.min");

//Simple SVG
import { SimpleSVG } from "vue-simple-svg";
Vue.component("simple-svg", SimpleSVG);

//Components
Vue.component('errors', require('./vue/components/errors.vue'));
Vue.component('wg-info', require('./vue/wg-info.vue'));
Vue.component('home-vue', require('./vue/homepage/home-vue.vue'));
Vue.component('wg-register', require('./vue/register/wg-register.vue'));
Vue.component('next-event', require('./vue/news/next-event.vue'));
Vue.component('app-list', require('./vue/shopping/List.vue'));
Vue.component('statuses', require('./vue/news/statuses/statuses.vue'));
Vue.component('cart', require('./vue/shopping/cart/cart.vue'));
Vue.component('grocery-history', require('./vue/grocery-list/grocery-history.vue'));
Vue.component('cleaning', require('./vue/cleaning/cleaning.vue'));
Vue.component('events', require('./vue/events/events.vue'));
Vue.component('create-event', require('./vue/events/create-event'));


const app = new Vue({
    el: "#app",
    data: {
        showModal: false
    }
});
