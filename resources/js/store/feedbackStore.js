export default {
    namespaced: true,
    state: {
        loadingAnimation: false,
    },

    actions: {
        showLoadingAnimation(context) { context.commit('setLoadingAnimation', true); },
        hideLoadingAnimation(context) { context.commit('setLoadingAnimation', false); }
    },

    mutations: {
        setLoadingAnimation(state, bool) {
            return state.loadingAnimation = bool;
        },
    }
}
