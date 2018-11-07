
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

Vue.component('iphoneadd', require('./components/iphoneadd.vue'));
Vue.component('pamiec', require('./components/pamiec.vue'));
Vue.component('cena', require('./components/cena.vue'));
Vue.component('nazwa', require('./components/nazwa.vue'));
Vue.component('rok', require('./components/rok.vue'));
Vue.component('przekatna', require('./components/przekatna.vue'));
Vue.component('przycisk', require('./components/przycisk.vue'));
Vue.component('kolor', require('./components/kolor.vue'));
Vue.component('iphoneedit', require('./components/iphoneedit.vue'));
Vue.component('iphoneshow', require('./components/iphoneshow.vue'));
Vue.component('zdjecie', require('./components/zdjecie.vue'));
Vue.component('iphoneindex', require('./components/iphoneindex.vue'));




const app = new Vue({
    el: '#app'
});
