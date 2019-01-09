<template>
    <div id="add">
        <v-form>
            <input type="hidden" name="_method">
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Nazwa</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-select id="nazwa" :items="name_items" v-model="nazwa" solo></v-select>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_nazwa}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Rok</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-select id="rok" :items="year_items" v-model="rok" solo></v-select>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_rok}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Cena</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="cena" type="number" v-model="cena" solo ></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_cena}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Pamięć</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-select id="pamiec" :items="memory_items" v-model="pamiec" solo></v-select>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_pamiec}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Kolor</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="kolor" type="text" v-model="kolor" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_kolor}}</div>
            <v-layout row>
                <v-flex xs4>
                    <v-subheader>Przekątna</v-subheader>
                </v-flex>
                <v-flex xs8>
                    <v-text-field id="przekatna" type="text" v-model="przekatna" solo></v-text-field>
                </v-flex>
            </v-layout>
            <div class="alert-danger">{{error_przekatna}}</div>
            <v-card-actions class="justify-center">
                <v-btn @click="clickDodaj" color="#53A4E6" dark >
                    Dodaj
                </v-btn>
            </v-card-actions>
        </v-form>
    </div>
</template>
<style>
    .application--wrap {
        background-color: #cceeff;
    }

</style>

<script>
    import { mapState } from 'vuex'
    export default {
        props: [],
        data: function () {
            return {
                error_przekatna: '',
                error_cena: '',
                error_kolor: '',
                error_nazwa: '',
                error_pamiec: '',
                error_rok: '',
                csrf_token: $('meta[name="csrf-token"]').attr('content'),
                year_items: ['2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018' ],
                memory_items: ['4 GB', '8 GB', '16 GB', '32 GB', '64 GB', '128 GB', '256 GB', '512 GB'],
                name_items: ['iPhone', 'iPhone 3G', 'iPhone 3GS', 'iPhone 4', 'iPhone 5', 'iPhone 5C', 'iPhone 5S', 'iPhone 6',
                    'iPhone 6+', 'iPhone 6S', 'iPhone 6S+', 'iPhone SE', 'iPhone 7', 'iPhone 7+', 'iPhone 8',
                    'iPhone 8+', 'iPhone X', 'iPhone XS', 'iPhone XSMax', 'iPhone XR' ],
            }
        },
        computed:{
            ...mapState('Iphone',['cena'], ['nazwa'], ['kolor'], ['przekatna'], ['pamiec'], ['rok']),
            nazwa: {
                get(){
                    return 'iPhone'
                },
                set(value){
                    console.log(value)
                    this.$store.commit('Iphone/updateNazwa', value)
                    console.log(this.$store.state.Iphone.nazwa)
                }
            },
            cena: {
                get(){
                    return this.$store.state.Iphone.cena
                },
                set(value){
                    this.$store.commit('Iphone/updateCena', value)
                }
            },
            rok: {
                get(){
                    return '2007'
                },
                set(value){
                    this.$store.commit('Iphone/updateRok', value)
                }
            },
            pamiec: {
                get(){
                    return '4 GB'
                },
                set(value){
                    this.$store.commit('Iphone/updatePamiec',value)
                }
            },
            kolor: {
                get(){
                    return this.$store.state.Iphone.kolor
                },
                set(value){
                    this.$store.commit('Iphone/updateKolor', value)
                }
            },
            przekatna: {
                get(){
                    return this.$store.state.Iphone.przekatna
                },
                set(value){
                    this.$store.commit('Iphone/updatePrzekatna', value)
                }
            }
        },
        methods:{
            clickDodaj:function(e){
                e.preventDefault();
                let vn = this;

                vn.error_przekatna = '';
                vn.error_cena = '';
                vn.error_kolor = '';
                vn.error_nazwa = '';
                vn.error_pamiec = '';
                vn.error_rok = '';
                axios.post('/kolekcja', {
                    nazwa: this.$store.state.Iphone.nazwa,
                    rok: this.$store.state.Iphone.rok,
                    cena: this.cena,
                    kolor: this.kolor,
                    przekatna: this.przekatna,
                    pamiec: this.$store.state.Iphone.pamiec,
                    action:'dodaj'
                })
                    .then(function (response) {
                        if (response.data.success) {
                            vn.message = response.data.message;
                            vn.nazwa = '';
                            vn.rok = '';
                            vn.cena = '';
                            vn.kolor = '';
                            vn.przekatna = '';
                            vn.pamiec = '';
                        }
                        window.alert("Telefon został dodany");
                        vn.$router.replace('/kolekcja');
                    })
                    .catch(function (error) {
                        console.log("error",error);
                        if(error.response.data.errors.przekatna)
                            vn.error_przekatna = error.response.data.errors.przekatna[0];
                        if(error.response.data.errors.cena)
                            vn.error_cena = error.response.data.errors.cena[0];
                        if(error.response.data.errors.kolor)
                            vn.error_kolor = error.response.data.errors.kolor[0];
                        if(error.response.data.errors.rok)
                            vn.error_rok = error.response.data.errors.rok[0];
                        if(error.response.data.errors.pamiec)
                            vn.error_pamiec = error.response.data.errors.pamiec[0];
                        if(error.response.data.errors.nazwa)
                            vn.error_nazwa = error.response.data.errors.nazwa[0];
                    });
            }
        }
    }
</script>
<style>

</style>