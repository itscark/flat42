//Imports
import "./bootstrap";
import router from './routes';
import errors from './components/errors/errors.vue';
import homePage from './components/homepage/home-vue.vue';
import info from './components/wg-info.vue';
import wgRegister from './components/register/wg-register.vue';
import admin from './components/admin/admin.vue';
import shopping from './views/Shopping.vue';
import cleaning from './views/Cleaning.vue';
import events from './views/Events.vue';
import home from './views/Home.vue';
import {SimpleSVG} from 'vue-simple-svg'
/*import SimpleSVG from "vue-simple-svg";*/


router.beforeEach((to, from, next) => {
    document.title = to.meta.title;
    next() ;
});


// Components
Vue.component('simple-svg', SimpleSVG);
Vue.component('my-component', errors);
Vue.component('home', homePage);
Vue.component('wg-info', info);
Vue.component('wg-register', wgRegister);
Vue.component('admin-page', admin);
Vue.component('shopping', shopping);
Vue.component('cleaning', cleaning);
Vue.component('events', events);
Vue.component('statuses', home);

new Vue({
    el: "#app",
    router,
    data: {
        showModal: false
    }
});