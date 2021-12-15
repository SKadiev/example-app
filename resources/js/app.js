
import Vue from 'vue';
import router from './routes';
const { default: VueRouter } = require('vue-router');
import Index from './index.vue';
import moment from 'moment';
require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(VueRouter);

Vue.filter('fromNow', value => moment(value).fromNow());

const app = new Vue({
    el: '#app',
    router,
    components: {
        'index' : Index
    }
});
