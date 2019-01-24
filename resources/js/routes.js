import VueRouter from 'vue-router';

let routes = [
    {
        path: '/home',
        component: require('./views/Home.vue').default,
        meta:{title: 'Flat42 - Home'}
    },
    {
        path: '/shopping',
        component: require('./views/Shopping.vue').default,
        meta:{title: 'Flat42 - Shopping'}
    },

    {
        path: '/events',
        component: require('./views/Events.vue').default,
        meta:{title: 'Flat42 - Events'}
    },
    {
        path: '/cleaning',
        component: require('./views/Cleaning.vue').default,
        meta:{title: 'Flat42 - Cleaning'}
    },

    //Define Meta Title for not Vue Routes
    {
        path: '/admin',
        meta:{title: 'Flat42 - Admin'}
    },
    {
        path: '/',
        meta: {title: 'Flat42'}
    },
    {
        path: '/blog',
        meta: {title: 'Flat42 - Blog'}
    }, {
        path: '/login',
        meta: {title: 'Flat42 - Login'}
    },
    {
        path: '/register',
        meta: {title: 'Flat42 - Register'}
    },
    {
        path: '/register/*',
        meta: {title: 'Flat42 - Register'}
    },
    {
        path: '/register/wg',
        meta: {title: 'Flat42 - Register - WG'}
    },

    {
        path: '*',
        component: require('./components/errors/404.vue').default,
        meta: {title: 'Flat42 - Page not found!'}
    }
];


export default new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: 'active'
});