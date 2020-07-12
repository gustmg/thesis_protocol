export default {
    namespaced: true,
    state: {
        thesisProtocols: [], //List of all thesis protocols
    },

    getters: {
        getThesisProtocolsByEvaluatorId: state => evaluatorId => {
            return state.thesisProtocols.filter(thesisProtocol => {
                return thesisProtocol.thesis_protocol_evaluator_id === evaluatorId
            })
        },
    },

    mutations: {
        SET_THESIS_PROTOCOLS(state, thesisProtocols) {
            state.thesisProtocols = thesisProtocols
        },
    },

    actions: {
        fetchThesisProtocols: function({ commit }) {
            axios
                .get('/thesis_protocols')
                .then(response => {
                    commit('SET_THESIS_PROTOCOLS', response.data.thesis_protocols)
                })
                .catch(function(error) {
                    console.log(error)
                })
        },

        setEvaluatorToThesisProtocol: function({ dispatch }, { thesisProtocolId, evaluatorId }) {
            axios
                .put('/thesis_protocols/' + thesisProtocolId, {
                    thesis_protocol_evaluator_id: evaluatorId,
                })
                .then(response => {
                    dispatch('fetchThesisProtocols')
                })
                .catch(function(error) {
                    console.log(error)
                })
        },
    },
}
