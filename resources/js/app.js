/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./resources/bootstrap');
import Vue from 'vue'; // if this is not work add this =>  window.Vue = require('vue');

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

import axios from 'axios';
import VueAxios from 'vue-axios';
import Auth from './resources/Auth.js';

Vue.prototype.auth = Auth;
Vue.use(VueAxios, axios);

import MainPage from './pages/MainPage.vue';
import router from './routes';

 new Vue({
     el: '#app',
     router,
     render: h => h(MainPage),
 });
