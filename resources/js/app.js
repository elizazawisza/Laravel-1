
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

import {moduleIphone} from './modules/telefon.js'
import {moduleLista} from './modules/listatelefony.js'
import {modulePracownik} from './modules/pracownik.js'
import {modulePracownicy} from './modules/pracownicy.js'

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(Vuetify);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const IphoneAdd = Vue.component('iphoneadd', require('./components/iphoneadd.vue'));
Vue.component('pamiec', require('./components/pamiec.vue'));
Vue.component('cena', require('./components/cena.vue'));
Vue.component('nazwa', require('./components/nazwa.vue'));
Vue.component('rok', require('./components/rok.vue'));
Vue.component('przekatna', require('./components/przekatna.vue'));
Vue.component('przycisk', require('./components/przycisk.vue'));
Vue.component('kolor', require('./components/kolor.vue'));
const EmplyeeAdd = Vue.component('employeeAdd', require('./components/employeeAdd.vue'));
const EmployeeEdit = Vue.component('employeeEdit', require('./components/employeeEdit.vue'));
const EmployeeIndex =Vue.component('employeeIndex', require('./components/employeeIndex.vue'));
const EmployeeShow = Vue.component('employeeShow', require('./components/employeeShow.vue'));
const IphoneEdit = Vue.component('iphoneedit', require('./components/iphoneedit.vue'));
const IphoneShow = Vue.component('iphoneshow', require('./components/iphoneshow.vue'));
Vue.component('zdjecie', require('./components/zdjecie.vue'));
const IphoneList = Vue.component('iphoneindex', require('./components/iphoneindex.vue'));

const routes = [
    {
        name: 'iphoneadd',
        path: '/kolekcja/create',
        component: IphoneAdd
    },
    {
        name: 'iphoneedit',
        path: '/kolekcja/:id/edit',
        component: IphoneEdit
    },
    {
        name: 'iphoneshow',
        path: '/kolekcja/:id',
        component: IphoneShow
    },
    {
        name: 'iphoneindex',
        path: '/kolekcja',
        component: IphoneList
    },
    {
        name: 'employeeIndex',
        path: '/pracownicy',
        component: EmployeeIndex
    },
    {
        name: 'employeeAdd',
        path: '/pracownicy/create',
        component: EmplyeeAdd
    },
    {
        name: 'employeeEdit',
        path: '/pracownicy/:id/edit',
        component: EmployeeEdit
    },
    {
        name: 'employeeShow',
        path: '/pracownicy/:id',
        component: EmployeeShow
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});


const store = new Vuex.Store({
    modules: {
        Iphone: moduleIphone,
        Lista: moduleLista,
        Pracownik: modulePracownik,
        Pracownicy: modulePracownicy
    }
});



const app = new Vue({router,store}).$mount('#app');
