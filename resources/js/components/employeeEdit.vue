<template>
    <div id="add">
        <v-form>
            <input type="hidden" name="_method" value="PATCH">
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Imię</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="imie"  v-model="imie" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_imie}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Nazwisko</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="nazwisko" v-model="nazwisko" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_nazwisko}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Email</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="email" type="email" v-model="email" solo ></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_email}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Numer telefonu</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="numer" v-model="numer" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_numer}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Telefon</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-select id="telefon"  item-text="name" item-value="value"  v-bind:items="telefon_items"  v-model="telefon" multiple solo></v-select>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_telefon}}</div>
            <v-card-actions class="justify-center">
                <v-btn @click="clickZaktualizuj" color="#53A4E6" dark >
                    Zaktualizuj
                </v-btn>
            </v-card-actions>
        </v-form>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'
    export default {
        data: function () {
            return {
                error_imie: '',
                error_nazwisko: '',
                error_email: '',
                error_numer: '',
                error_telefon: '',
                csrf_token: $('meta[name="csrf-token"]').attr('content'),
                telefon_items:[],
                tmp:[]
            }
        },
        beforeMount() {
            let vn = this;
            axios.get('http://kolekcja.local/kolekcjaapiIndex')
                .then(function (response){
                    for(var i=0; i<response.data.length; i++) {
                        vn.telefon_items.push({ "name":response.data[i].nazwa, "value": response.data[i].id});
                    }
                }),
                this.loadEmployee(this.$route.params.id)
        },
        computed:{
            ...mapState('Pracownik', ['imie', 'nazwisko', 'email', 'numer']),
            imie: {
                get(){
                    return this.$store.state.Pracownik.imie
                },
                set(value){
                    this.$store.commit('Pracownik/updateImie', value)
                }
            },
            nazwisko: {
                get(){
                    return this.$store.state.Pracownik.nazwisko
                },
                set(value){
                    this.$store.commit('Pracownik/updateNazwisko', value)
                }
            },
            email: {
                get(){
                    return this.$store.state.Pracownik.email
                },
                set(value){
                    this.$store.commit('Pracownik/updateEmail', value)
                }
            },
            numer: {
                get(){
                    return this.$store.state.Pracownik.numer_telefonu
                },
                set(value){
                    this.$store.commit('Pracownik/updateNumer',value)
                }
            },
            telefon: {
                get(){
                    return this.$store.state.Pracownik.telefon_id
                },
                set(value){
                    this.$store.commit('Pracownik/updateTelefon2',value)
                }
            },
        },
        methods:{
            ...mapActions('Pracownik',['loadEmployee']),
            clickZaktualizuj:function(e){
                e.preventDefault();
                let vn = this;
                vn.error_imie = '';
                vn.error_nazwisko = '';
                vn.error_email = '';
                vn.error_numer = '';
                vn.error_telefon = '';

                let rid = this.$route.params.id;
                let formData = new FormData();
                formData.append('imie', this.imie);
                formData.append('nazwisko', this.nazwisko);
                formData.append('email', this.email);
                formData.append('numer_telefonu', this.numer);
                formData.append('telefon_id', this.telefon);
                formData.append('_method', 'PATCH');
                axios.post('/pracownicy/'+rid, formData)
                    .then(function (response) {
                        if (response.data.success) {
                            vn.message = response.data.message;
                            vn.imie = '';
                            vn.nazwisko = '';
                            vn.email = '';
                            vn.numer_telefonu = '';
                        }
                        console.log("Jestem tutaj"),
                            window.alert("Pracownik został zaktualizowany");
                        vn.$router.replace('/pracownicy');
                    })
                    .catch(function (error) {
                        console.log("Błąd")
                        console.log(error.response.data);
                        if(error.response.data.errors.imie){
                            vn.error_imie = error.response.data.errors.imie[0];
                        }
                        if(error.response.data.errors.nazwisko)
                            vn.error_nazwisko = error.response.data.errors.nazwisko[0];
                        if(error.response.data.errors.email)
                            vn.error_email = error.response.data.errors.email[0];
                        if(error.response.data.errors.numer_telefonu)
                            vn.error_numer = error.response.data.errors.numer_telefonu[0];

                    });
            }
        }
    }
</script>

<style scoped>
    .v-input__slot {
        margin-bottom: 0px !important;
    }
    .layout{
        margin-bottom: -25px;
        margin-top: 15px;
    }
</style>