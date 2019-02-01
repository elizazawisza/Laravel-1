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
                    console.log(response.data)
                    commit('updateImie', response.data.imie);
                    commit('updateNazwisko', response.data.nazwisko);
                    commit('updateEmail', response.data.email);
                    commit('updateNumer', response.data.numer_telefonu);
                    commit('updateTelefon1', response.data.kolekcja);
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
        updateTelefon1(state, telefon_id){
            console.log("Tutaj")
            console.log(telefon_id.length)
            var tmp=[];
            for(var i=0; i<telefon_id.length; i++){
                tmp.push(telefon_id[i].id);
            }
            state.telefon_id = tmp
        },
        updateTelefon2(state, telefon_id){
            state.telefon_id.push(telefon_id);
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
