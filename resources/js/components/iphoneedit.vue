<template>
    <div id="add">
        <form id="edytowanie" method="post" class="spis-form" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <div class="container">
                <div class="row justify-content-center ">
                    <div v-if=zdjecie>
                        <img :src="`/storage/${this.zdjecie}`" height="200px"/>
                    </div>
                </div>
            </div>
            <nazwa v-model="nazwa" >
            </nazwa>
            {{nazwa}}
            <div class="alert-danger">{{error_nazwa}}</div>
            <rok v-model="rok">
            </rok>
            {{rok}}
            <div class="alert-danger">{{error_rok}}</div>
            <cena v-model="cena" >
            </cena>
            {{cena}}
            <div class="alert-danger">{{error_cena}}</div>
            <pamiec v-model="pamiec" >
            </pamiec>
            {{pamiec}}
            <div class="alert-danger">{{error_pamiec}}</div>
            <kolor v-model="kolor" >
            </kolor>
            {{kolor}}
            <div class="alert-danger">{{error_kolor}}</div>
            <przekatna v-model="przekatna" >
            </przekatna>
            {{przekatna}}
            <div class="alert-danger">{{error_przekatna}}</div>
            <zdjecie v-model="zdjecie" >
            </zdjecie>
            <div v-if="percentCompleted>0 && percentCompleted<100" class="progress">
                <div class="progress-bar" role="progressbar" v-bind:style="{'width': percentCompleted+'%'}" aria-valuemax='100'>
                </div>
            </div>
            <span v-if="percentCompleted>0 && percentCompleted<100" class="napis">{{percentCompleted}}% </span>
            <div class="alert-danger">{{error_zdjecie}}</div>
            <div id="button">
                <button id="zaktualizuj" type="submit" name="przycisk" value="zaktualizuj" @click="clickZaktualizuj">
                    Zaktualizuj
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
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
                get(){
                    return this.$store.state.Iphone.zdjecie
                },
                set(value){
                    console.log("Tutaj aktualizuje zdjęcie " + value)
                    this.$store.commit('Iphone/updateZdjecie', value)
                    this.changeFile(value)
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
                formData.append('nazwa', this.form.nazwa);
                formData.append('rok', JSON.stringify(this.form.rok));
                formData.append('cena', this.form.cena);
                formData.append('pamiec', this.form.pamiec);
                formData.append('kolor', this.form.kolor);
                formData.append('przekatna', JSON.stringify(this.form.przekatna));
                formData.append('zdjecie', zdjecie);
                formData.append('_method', 'PATCH');
                axios.post('/kolekcja/kolekcjaapiPhotoUpdate/'+rid, formData, config)
                    .then( response=> {
                        if(response.data){
                            window.alert("Zdjęcie zostało zaktualizowane");
                            this.form.zdjecie = response.data;
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
<style>

</style>