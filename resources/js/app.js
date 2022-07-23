import _ from 'lodash';
window._ = _;

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');
import vuetify from './vuetify' // path to vuetify export
Vue.prototype._ = _;
import Vuex from 'vuex';
Vue.use(Vuex);

import store from './store/storeConfig';

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import { VApp, VRow, VCol, VCard, VCardText, VImg, VIcon } from "vuetify/lib";
Vue.component('v-app', VApp);
Vue.component('v-row', VRow);
Vue.component('v-col', VCol);
Vue.component('v-card', VCard);
Vue.component('v-card-text', VCardText);
Vue.component('v-img', VImg);
Vue.component('v-icon', VIcon);

const app = new Vue({
    vuetify,
    store
}).$mount('#app');
