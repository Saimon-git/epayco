import Vue from "vue";
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueApollo from 'vue-apollo';
import Vuex from "vuex";
import Client from './apollo/client';
import Router from './router';
import createPersistedState from "vuex-persistedstate";
import VeeValidate from 'vee-validate';
import {Validator} from 'vee-validate';

import 'vue-toast-notification/dist/theme-default.css';

Vue.component('dashboard', require('./views/dashboard/index').default);

Vue.use(VueRouter);
Vue.use(VueApollo);
Vue.use(Vuex);
Vue.use(VeeValidate, {errorBagName: 'vErrors'});

const apolloProvider = new VueApollo({
    defaultClient: Client,
});


window.app = new Vue({
    el: '#app',
    router: Router,
    apolloProvider
});
