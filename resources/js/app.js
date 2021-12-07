
import Vue from 'vue';
import router from './routes';
const { default: VueRouter } = require('vue-router');
import Index from './index.vue';
require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router,
    components: {
        'index' : Index
    }
});
