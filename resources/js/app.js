
import Vue from 'vue';
import router from './routes';
const { default: VueRouter } = require('vue-router');
import Index from './index.vue';
import moment from 'moment';
import StarRating from './components/shared/components/StarRating.vue';
require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(VueRouter);

Vue.filter('fromNow', value => moment(value).fromNow());
Vue.component('star-rating', StarRating);
const app = new Vue({
    el: '#app',
    router,
    components: {
        'index' : Index
    }
});
