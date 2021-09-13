window.Vue = require('vue').default;
window.axios = require('axios');
window._ = require('lodash');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


//Components
window.Vue.component('exceptions-index', require('./components/Exceptions/Index.vue').default);

const app = new Vue({
    el: "#app",
});
