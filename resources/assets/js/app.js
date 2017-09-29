window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

import Vue from 'vue'
import App from './App.vue'
import router from './router'

const app = new Vue({
    el: '#root',
    template: `<app></app>`,
    components: { App },
    router
});
