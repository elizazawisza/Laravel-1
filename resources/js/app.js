
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


Vue.use(VueRouter);
Vue.use(Vuex);

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
    }
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

const moduleIphone = {
    namespaced: true,
    state: {
        nazwa: '',
        cena: '',
        rok: '',
        kolor: '',
        zdjecie: '',
        przekatna: '',
        pamiec: ''

    },
    actions:{
        loadPhone({commit},id){
            axios.get('/kolekcja/kolekcjaapiEdit/'+id)
                .then(function (response){
                    commit('updateCena', response.data.cena);
                    commit('updateNazwa', response.data.nazwa);
                    commit('updateRok', response.data.rok);
                    commit('updateKolor', response.data.kolor);
                    commit('updateZdjecie', response.data.zdjecie);
                    commit('updatePrzekatna', response.data.przekatna);
                    commit('updatePamiec', response.data.pamiec);
                })
                .catch(function (error) {
                    console.log("error", error);
                    console.log(error.response);
                })
        }
    },
    mutations: {
        updateNazwa(state, nazwa){
            state.nazwa = nazwa;
        },
        updateCena(state, cena){
            state.cena = cena
        },
        updateRok(state,rok){
            state.rok = rok
        },
        updateKolor(state, kolor){
            state.kolor = kolor
        },
        updateZdjecie(state, zdjecie){
            state.zdjecie = zdjecie
        },
        updatePrzekatna(state, przekatna){
            state.przekatna = przekatna
        },
        updatePamiec(state, pamiec){
            state.pamiec = pamiec
        }
    },
    getters:{
        getNazwa(state){
            return state.form.nazwa;
        },
        getCena(state){
            return state.form.cena;
        },
        getRok(state){
            return state.form.rok;
        },
        getPamiec(state){
            return state.form.pamiec;
        },
        getPrzekatna(state){
            return state.form.przekatna;
        },
        getKolor(state){
            return state.form.kolor;
        },
        getZdjecie(state){
            return state.form.zdjecie;
        }
    }
};


const moduleLista = {
    namespaced: true,
    state: {
        form:[]
    },
    actions:{
        loadForm ({ commit }) {
            axios.get('kolekcjaapiIndex')
                .then(function (response){
                    commit('setForm', response.data)
                })
        }
    },
    mutations:{
        setForm(state, form){
            state.form = form;
        }
    },
    getters: {
        getForm(state){
            return state.form;
        }
    }
};

const store = new Vuex.Store({
    modules: {
        Iphone: moduleIphone,
        Lista: moduleLista
    }
});



const app = new Vue({router,store}).$mount('#app');
