export default {
    namespaced: true,
    state: {
        beer: null,
    },
    actions: {
        loadRandomBeer(context) {
            context.dispatch('feedbackStore/showLoadingAnimation', null, {root: true});
            axios.get(`/api/beer/random`)
            .then((response)=>{
                context.commit('setState', {key: 'beer', value: response.data});
            })
            .catch((error)=>{
                alert('Error during taping your beer.')
            })
            .finally(() => {
                context.dispatch('feedbackStore/hideLoadingAnimation', null, {root: true});
            });
        },
    },
    mutations: {
        setState(state, payload) {
            return state[payload.key] = payload.value;
        },
    }
}
