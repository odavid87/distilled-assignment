import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import Ripple from 'vuetify/lib/directives/ripple';

Vue.use(Vuetify, {
    directives: {
        Ripple,
    },
});

const opts = {
    icons: {
        iconfont: 'mdi', // default - only for display purposes
    }
}

export default new Vuetify(opts)
