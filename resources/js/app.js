import Form from "./utilities/Form";
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('next-event', require('./vue/news/next-event.vue'));
Vue.component('app-list', require('./vue/shopping/List.vue'));
Vue.component('feature_left', require('./vue/homepage/feature-left.vue'));
Vue.component('feature_right', require('./vue/homepage/feature-right.vue'));
Vue.component('add-status', require('./vue/news/statuses/add-status.vue'));
Vue.component('statuses', require('./vue/news/statuses/statuses.vue'));
Vue.component('cart', require('./vue/shopping/cart/cart.vue'));
Vue.component('grocery-history', require('./vue/grocery-list/grocery-history.vue'));
Vue.component('cleaning', require('./vue/cleaning/cleaning.vue'));


const app = new Vue({
    el: '#app',

    data: {
        form: new Form({
            title: '',
            body: '',
            date: '',
        })
    },

    methods: {
        onSubmit() {
            this.form.post('/events/create', '/events')
        }
    }
});


