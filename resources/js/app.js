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

Vue.component('app-list', require('./components/List.vue'));
Vue.component('feature_left', require('./components/feature_left.vue'));
Vue.component('feature_right', require('./components/feature_right.vue'));
Vue.component('add-status', require('./components/add-status.vue'));
Vue.component('statuses', require('./components/statuses.vue'));

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


