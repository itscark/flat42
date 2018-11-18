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

window.Vue = require('vue');

Vue.component('app-list', require('./components/List.vue'));
Vue.component('feature_left', require('./components/feature_left.vue'));
Vue.component('feature_right', require('./components/feature_right.vue'));
Vue.component('add-status', require('./components/add-status.vue'));
Vue.component('statuses', require('./components/statuses.vue'));

class Errors {
    constructor() {
        this.errors = {};
    }

    get(field) {
        if (_.has(this.errors, 'errors.' + field)) {
            return this.errors.errors[field][0];
        }
    }

    clear(field) {
        if (field) {
            if (field && _.has(this.errors, 'errors.' + field)) {
                delete this.errors.errors[field];
                return;
            }
            return;
        }

        this.errors = {};
    }

    has(field) {
        return _.has(this.errors, 'errors.' + field);
        /* return this.errors.hasOwnProperty(field);*/
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    record(errors) {
        this.errors = errors;
    }
}


class Form {
    constructor(data) {
        this.origonalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    data() {
        let data = Object.assign({}, this);

        delete data.originalData;
        delete data.errors;
        return data;


        /* Still in testing
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }*/

    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
        this.errors.clear();
    }

    post(url, nextLocation) {
        return this.submit('post', url, nextLocation);
    }

    delete(url, nextLocation) {
        return this.submit('delete', url, nextLocation);
    }

    get(url, nextLocation) {
        return this.submit('get', url, nextLocation);
    }

    submit(requestType, url, nextLocation) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    resolve(response.data);
                    window.location = nextLocation
                })
                .catch(error => {
                    this.onFail(error.response.data);

                    reject(error.response.data);
                })

        });
    }

    onSuccess(data) {
        this.reset();

    }

    onFail(errors) {
        this.errors.record(errors);
    }
}

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


