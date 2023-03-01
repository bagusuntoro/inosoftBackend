import Vue from 'vue';
import VueRouter from 'vue-router';
import { routes } from './routes';

require('./bootstrap');

window.Vue = require('vue').default;

// convigurasi axios
// import { Form, HasError, AlertError } from 'vform';
// window.Form = Form;
// Vue.component(HasError.name, HasError);
// Vue.component(AlertError.name, AlertError);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('parent-component', require('./components/ParentComponent.vue').default);
Vue.component('table-component', require('./components/table/TableComponent.vue').default);
Vue.component('input-component', require('./components/Form/InputComponent.vue').default);
Vue.component('Update-component', require('./components/Form/UpdateComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});
const app = new Vue({
    el: '#app',
    router
});
