import "./bootstrap";
import router from './routes';

router.beforeEach((to, from, next) => {
   document.title = to.meta.title;
   next() ;
});

//Components
Vue.component('errors', require('./components/errors.vue'));
Vue.component('wg-info', require('./components/wg-info.vue'));
Vue.component('home-vue', require('./components/homepage/home-vue.vue'));
Vue.component('wg-register', require('./components/register/wg-register.vue'));
Vue.component('next-event', require('./components/news/next-event.vue'));
Vue.component('app-list', require('./components/shopping/app-list.vue'));
Vue.component('statuses', require('./views/Home.vue'));
Vue.component('cart', require('./components/shopping/cart/cart.vue'));
Vue.component('grocery-history', require('./components/grocery-list/grocery-history.vue'));

/*Vue.component('create-event', require('./vue/events/create-event.vue'));*/
Vue.component('admin-page', require('./components/admin/admin.vue'));
Vue.component('shopping', require('./views/Shopping.vue'));
Vue.component('cleaning', require('./views/Cleaning.vue'));
Vue.component('events', require('./views/Events.vue'));

new Vue({
    el: "#app",
    router,
    data: {
        showModal: false
    }
});
