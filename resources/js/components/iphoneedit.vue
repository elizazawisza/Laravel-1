<template>
    <div id="add">
            <v-form>
                <input type="hidden" name="_method" value="PATCH">
                <div class="container">
                    <div class="row justify-content-center ">
                        <div v-if=zdjecie>
                            <img :src="`/storage/${this.zdjecie}`" height="200px"/>
                        </div>
                    </div>
                </div>
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
                        <v-select id="pamiec" item-text="name" item-value="value" v-model="pamiec" v-bind:items="memory_items" solo></v-select>
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
                <zdjecie :value="form.zdjecie" :change="changeFile">
                </zdjecie>
                <div v-if="percentCompleted>0 && percentCompleted<100" class="progress">
                    <div class="progress-bar" role="progressbar" v-bind:style="{'width': percentCompleted+'%'}" aria-valuemax='100'>
                    </div>
                </div>
                <span v-if="percentCompleted>0 && percentCompleted<100" class="napis">{{percentCompleted}}% </span>
                <div class="alert-danger">{{error_zdjecie}}</div>
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
        props: [],
        data: function () {
            return {
                form: {
                    nazwa: '',
                    cena: '',
                    rok: '',
                    kolor: '',
                    przekatna: '',
                    pamiec: '',
                    zdjecie: '',
                    id: '',
                },
                error_przekatna: '',
                error_cena: '',
                error_kolor: '',
                error_nazwa: '',
                error_pamiec: '',
                error_rok: '',
                error_zdjecie: '',
                percentCompleted: '0',
                max : 100,
                year_items: ['2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018' ],
                memory_items: [{"name":"4 GB","value":4},
                    {"name":"8 GB","value":8},
                    {"name":"16 GB","value":16},
                    {"name":"32 GB","value":32},
                    {"name":"64 GB","value":64},
                    {"name":"128 GB","value":128},
                    {"name":"256 GB","value":256},
                    {"name":"512 GB","value":512}],
                name_items: ['iPhone', 'iPhone 3G', 'iPhone 3GS', 'iPhone 4', 'iPhone 5', 'iPhone 5C', 'iPhone 5S', 'iPhone 6',
                    'iPhone 6+', 'iPhone 6S', 'iPhone 6S+', 'iPhone SE', 'iPhone 7', 'iPhone 7+', 'iPhone 8',
                    'iPhone 8+', 'iPhone X', 'iPhone XS', 'iPhone XSMax', 'iPhone XR' ],
            }
        },
        beforeMount() {
            this.loadPhone(this.$route.params.id)
        },
        computed:{
            ...mapState('Iphone',['cena'], ['nazwa'], ['zdjecie'], ['kolor'], ['przekatna'], ['pamiec'], ['rok']),
            getId(){
                return this.$route.params.id;
            },
            nazwa: {
                get(){
                    return this.$store.state.Iphone.nazwa
                },
                set(value){
                    this.$store.commit('Iphone/updateNazwa', value)
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
                    return this.$store.state.Iphone.rok
                },
                set(value){
                    this.$store.commit('Iphone/updateRok', value)
                }
            },
            pamiec: {
                get(){
                    return this.$store.state.Iphone.pamiec
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
            },
            zdjecie: {
                get() {
                    return this.$store.state.Iphone.zdjecie
                },
                set(value){
                    this.$store.commit('Iphone/updateZdjecie', value)
                }
            }
        },
        methods: {
            ...mapActions('Iphone',['loadPhone']),

            changeFile(zdjecie) {
                let vn = this;
                let config = {
                    onUploadProgress: function(progressEvent) {
                        vn.percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                    }
                };
                let formData = new FormData();
                let rid = this.$route.params.id;
                formData.append('nazwa', this.nazwa);
                formData.append('rok', JSON.stringify(this.rok));
                formData.append('cena', this.cena);
                formData.append('pamiec', this.pamiec);
                formData.append('kolor', this.kolor);
                formData.append('przekatna', JSON.stringify(this.przekatna));
                formData.append('zdjecie', zdjecie);
                formData.append('_method', 'PATCH');
                axios.post('/kolekcja/kolekcjaapiPhotoUpdate/'+rid, formData, config)
                    .then( response=> {
                        if(response.data){
                            window.alert("Zdjęcie zostało zaktualizowane");
                            this.zdjecie = response.data;
                        }
                    })
                    .catch(function (error) {
                    });
            },
            clickZaktualizuj: function (e) {
                e.preventDefault();
                var vn = this;

                vn.error_przekatna = '';
                vn.error_cena = '';
                vn.error_kolor = '';
                vn.error_nazwa = '';
                vn.error_pamiec = '';
                vn.error_rok = '';
                vn.error_zdjecie = '';
                let rid = this.$route.params.id;
                let formData = new FormData();
                formData.append('nazwa', this.nazwa);
                formData.append('rok', this.rok);
                formData.append('cena', this.cena);
                formData.append('pamiec', this.pamiec);
                formData.append('kolor', this.kolor);
                formData.append('przekatna', this.przekatna);
                formData.append('zdjecie', this.zdjecie);
                formData.append('_method', 'PATCH');
                axios.post('/kolekcja/'+rid, formData)
                    .then(function (response) {
                        if (response.data.success) {
                            vn.nazwa = '';
                            vn.rok = '';
                            vn.cena = '';
                            vn.kolor = '';
                            vn.przekatna = '';
                            vn.pamiec = '';
                            window.alert("Telefon został zaktualizowany");
                            vn.$router.replace('/kolekcja');

                        }
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        if (error.response.data.errors.cena)
                            vn.error_cena = error.response.data.errors.cena[0];
                        if (error.response.data.errors.kolor)
                            vn.error_kolor = error.response.data.errors.kolor[0];
                        if (error.response.data.errors.rok)
                            vn.error_rok = error.response.data.errors.rok[0];
                        if (error.response.data.errors.pamiec)
                            vn.error_pamiec = error.response.data.errors.pamiec[0];
                        if (error.response.data.errors.nazwa)
                            vn.error_nazwa = error.response.data.errors.nazwa[0];
                        if (error.response.data.errors.zdjecie)
                            vn.error_zdjecie = error.response.data.errors.zdjecie[0];
                        if (error.response.data.errors.przekatna)
                            vn.error_przekatna = error.response.data.errors.przekatna[0];

                    });
            }
        }
    }
</script>