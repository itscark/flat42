import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import './utilities/scrolloverflow.min';
import 'vue-flash-message/dist/vue-flash-message.min.css';
import BootstrapVue from 'bootstrap-vue'
import Form from './utilities/Form';
import VueFlashMessage from 'vue-flash-message';


window.$ = window.jQuery = require('jquery');
window.Vue = Vue;
window.axios = axios;
window.Form = Form;

Vue.use(VueRouter);

Vue.use(BootstrapVue);
Vue.use(VueFlashMessage);


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}