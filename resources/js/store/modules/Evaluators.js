export default {
    namespaced: true,
    state: {
        evaluators: [],
    },

    mutations: {
        SET_EVALUATORS(state, evaluators) {
            state.evaluators = evaluators
        },
    },

    actions: {
        fetchEvaluators: function({ commit }) {
            axios
                .get('/evaluators')
                .then(response => {
                    commit('SET_EVALUATORS', response.data.evaluators)
                })
                .catch(function(error) {
                    console.log(error)
                })
        },
    },
}
