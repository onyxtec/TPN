/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


import { ValidationProvider } from 'vee-validate';
import { ValidationObserver, localize } from 'vee-validate';
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('client-login-component', require('./components/ClientLogin/ClientLoginComponent.vue').default);
Vue.component('client-register-component', require('./components/ClientLogin/ClientRegisterComponent.vue').default);
Vue.component('peer-register-component', require('./components/PeerLogin/PeerRegisterComponent.vue').default);
Vue.component('peer-login-component', require('./components/PeerLogin/PeerLoginComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
