
import Vue from 'vue'
import Vuex from 'vuex'
import beerStore from "./beerStore";
import feedbackStore from "./feedbackStore";

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        beerStore,
        feedbackStore
    }
});

export default store;
