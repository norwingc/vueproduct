/*jshint esversion: 6 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

import Vue from 'vue'

import App from './App.vue'
import router from './router'

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
