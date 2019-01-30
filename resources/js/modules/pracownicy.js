export const modulePracownicy = {
    namespaced: true,
    state: {
        form:[]
    },
    actions:{
        loadForm ({ commit }) {
            axios.get('pracownicyapiIndex')
                .then(function (response){
                    commit('setForm', response.data)
                })
        }
    },
    mutations:{
        setForm(state, form){
            state.form = form;
        }
    },
    getters: {
        getForm(state){
            return state.form;
        }
    }
};
