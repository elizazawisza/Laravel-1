export const modulePracownik = {
    namespaced: true,
    state: {
        imie: '',
        nazwisko: '',
        email: '',
        numer_telefonu: '',
        telefon_id: '',
    },
    actions:{
        loadEmployee({commit},id){
            axios.get('/pracownicy/pracownicyApiEdit/'+id)
                .then(function (response){
                    commit('updateImie', response.data.imie);
                    commit('updateNazwisko', response.data.nazwisko);
                    commit('updateEmail', response.data.email);
                    commit('updateNumer', response.data.numer_telefonu);
                    commit('updateTelefon', response.data.telefon_id);
                })
                .catch(function (error) {
                    console.log("error", error);
                    console.log(error.response);
                })
        }
    },
    mutations: {
        updateImie(state, imie){
            state.imie = imie;
        },
        updateNazwisko(state, nazwisko){
            state.nazwisko = nazwisko
        },
        updateEmail(state,email){
            state.email = email
        },
        updateNumer(state, numer_telefonu){
            state.numer_telefonu = numer_telefonu
        },
        updateTelefon(state, telefon_id){
            state.telefon_id = telefon_id
        }
    },
    getters:{
        getImie(state){
            return state.form.imie;
        },
        getNazwisko(state){
            return state.form.nazwisko;
        },
        getEmail(state){
            return state.form.email;
        },
        getNumer(state){
            return state.form.numer_telefonu;
        },
        getTelefon(state){
            return state.form.telefon_id;
        }
    }
};
