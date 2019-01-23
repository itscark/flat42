import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';

window.Vue = Vue;
Vue.use(VueRouter);
window.axios = axios;


window._ = require('lodash');
window.$ = window.jQuery = require('jquery');

require('bootstrap');


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

//Form
import Form from './utilities/Form';
window.Form = Form;

//flash message
import VueFlashMessage from 'vue-flash-message';
Vue.use(VueFlashMessage);
require('vue-flash-message/dist/vue-flash-message.min.css');

//fullpagejs
require("./utilities/scrolloverflow.min");

//Simple SVG
import { SimpleSVG } from "vue-simple-svg";
Vue.component("simple-svg", SimpleSVG);

//Bootstrap Vue
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

