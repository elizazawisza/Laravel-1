<template>
    <div id="add">
        <v-form>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Imię</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="imie" type="text" v-model="imie" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_imie}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Nazwisko</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="nazwisko" type="text" v-model="nazwisko" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_nazwisko}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>E-mail</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="email" type="email" v-model="email" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_email}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Numer telefonu</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="numer" type="text" v-model="numer" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_numer}}</div>
            <v-card-actions class="justify-center">
                <v-btn @click="clickDodaj" color="#53A4E6" dark >
                    Dodaj
                </v-btn>
            </v-card-actions>

        </v-form>
    </div>
</template>

<script>
    import { mapState } from 'vuex'
    export default {
        data: function () {
            return {
                error_imie: '',
                error_nazwisko: '',
                error_email: '',
                error_numer: '',
                csrf_token: $('meta[name="csrf-token"]').attr('content'),
            }
        },
        computed:{
            ...mapState('Pracownik', ['imie', 'nazwisko', 'email', 'numer']),
            imie: {
                get(){
                },
                set(value){
                    this.$store.commit('Pracownik/updateImie', value)
                }
            },
            nazwisko: {
                get(){
                },
                set(value){
                    this.$store.commit('Pracownik/updateNazwisko', value)
                }
            },
            email: {
                get(){
                },
                set(value){
                    this.$store.commit('Pracownik/updateEmail', value)
                }
            },
            numer: {
                get(){
                },
                set(value){
                    this.$store.commit('Pracownik/updateNumer',value)
                }
            }
        },
        methods:{
            clickDodaj:function(e){
                e.preventDefault();
                let vn = this;
                vn.error_imie = '';
                vn.error_nazwisko = '';
                vn.error_email = '';
                vn.error_numer = '';

                axios.post('/pracownicy', {
                    imie: this.$store.state.Pracownik.imie,
                    nazwisko: this.$store.state.Pracownik.nazwisko,
                    email: this.$store.state.Pracownik.email,
                    numer_telefonu: this.$store.state.Pracownik.numer_telefonu,
                    action:'dodaj'
                })
                    .then(function (response) {
                        if (response.data.success) {
                            vn.message = response.data.message;
                            vn.imie = '';
                            vn.nazwisko = '';
                            vn.email = '';
                            vn.numer_telefonu = '';
                        }
                        console.log("Jestem tutaj"),
                        window.alert("Pracownik został dodany");
                        vn.$router.replace('/pracownicy');
                    })
                    .catch(function (error) {
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