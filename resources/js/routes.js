import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/Home.vue'),
        meta:{title: 'Flat42 - Home'}
    },
    {
        path: '/shopping',
        component: require('./views/Shopping.vue'),
        meta:{title: 'Flat42 - Shopping'}
    },
    {
        path: '/events',
        component: require('./views/Events.vue'),
        meta:{title: 'Flat42 - Events'}
    },
    {
        path: '/cleaning',
        component: require('./views/Cleaning.vue'),
        meta:{title: 'Flat42 - Cleaning'}
    }
];



export default new VueRouter({
    routes,
    linkActiveClass: 'active'
});