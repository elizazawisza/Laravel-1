export const moduleIphone = {
    namespaced: true,
    state: {
        nazwa: '',
        cena: '',
        rok: '',
        kolor: '',
        zdjecie: '',
        przekatna: '',
        pamiec: ''

    },
    actions:{
        loadPhone({commit},id){
            axios.get('/kolekcja/kolekcjaapiEdit/'+id)
                .then(function (response){
                    commit('updateCena', response.data.cena);
                    commit('updateNazwa', response.data.nazwa);
                    commit('updateRok', response.data.rok);
                    commit('updateKolor', response.data.kolor);
                    commit('updateZdjecie', response.data.zdjecie);
                    commit('updatePrzekatna', response.data.przekatna);
                    commit('updatePamiec', response.data.pamiec);
                })
                .catch(function (error) {
                    console.log("error", error);
                    console.log(error.response);
                })
        }
    },
    mutations: {
        updateNazwa(state, nazwa){
            state.nazwa = nazwa;
        },
        updateCena(state, cena){
            state.cena = cena
        },
        updateRok(state,rok){
            state.rok = rok
        },
        updateKolor(state, kolor){
            state.kolor = kolor
        },
        updateZdjecie(state, zdjecie){
            state.zdjecie = zdjecie
        },
        updatePrzekatna(state, przekatna){
            state.przekatna = przekatna
        },
        updatePamiec(state, pamiec){
            state.pamiec = pamiec
        }
    },
    getters:{
        getNazwa(state){
            return state.form.nazwa;
        },
        getCena(state){
            return state.form.cena;
        },
        getRok(state){
            return state.form.rok;
        },
        getPamiec(state){
            return state.form.pamiec;
        },
        getPrzekatna(state){
            return state.form.przekatna;
        },
        getKolor(state){
            return state.form.kolor;
        },
        getZdjecie(state){
            return state.form.zdjecie;
        }
    }
};
