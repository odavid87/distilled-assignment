export default {
    namespaced: true,
    state: {
        beer: null,
        beers: [],
        beerPages: {}
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
        loadBeers(context, payload = {}) {
            context.dispatch('feedbackStore/showLoadingAnimation', null, {root: true});
            let url = '/api/beer';
            if (payload.hasOwnProperty('next')) {
                url = context.state.beerPages.next_page_url;
            }
            if (payload.hasOwnProperty('prev')) {
                url = context.state.beerPages.prev_page_url;
            }
            axios.get(url)
                .then((response)=>{
                    context.commit('setState', {key: 'beers', value: response.data.data});
                    context.commit('setState', {key: 'beerPages', value: {
                        current_page: response.data.current_page,
                        last_page: response.data.last_page,
                        next_page_url: response.data.next_page_url,
                        prev_page_url: response.data.prev_page_url,
                    }});
                })
                .catch((error)=>{
                    alert('Error during taping your beer.')
                })
                .finally(() => {
                    context.dispatch('feedbackStore/hideLoadingAnimation', null, {root: true});
                });
        }
    },
    mutations: {
        setState(state, payload) {
            return state[payload.key] = payload.value;
        },
    }
}
