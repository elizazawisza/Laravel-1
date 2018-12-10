<template>
    <div id="add">
        <form id="edytowanie" method="post" class="spis-form" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <div class="container">
                <div class="row justify-content-center ">
                    <div v-if=form.zdjecie>
                        <img :src="`/storage/zdjecia/${this.form.zdjecie}`" height="200px"/>
                    </div>
                </div>
            </div>
            <nazwa :value="form.nazwa" :change="changeNazwa">
            </nazwa>
            <div class="alert-danger">{{error_nazwa}}</div>
            <rok :value="form.rok" :change="changeRok">
            </rok>
            <div class="alert-danger">{{error_rok}}</div>
            <cena :value="form.cena" :change="changeCena">
            </cena>
            <div class="alert-danger">{{error_cena}}</div>
            <pamiec :value="form.pamiec" :change="changePamiec">
            </pamiec>
            <div class="alert-danger">{{error_pamiec}}</div>
            <kolor :value="form.kolor" :change="changeKolor">
            </kolor>
            <div class="alert-danger">{{error_kolor}}</div>
            <przekatna :value="form.przekatna" :change="changePrzekatna">
            </przekatna>
            <div class="alert-danger">{{error_przekatna}}</div>
            <zdjecie :value="form.zdjecie" :change="changeFile">
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

        },
        computed:{
            getId(){
                return this.$route.params.id;
            },
        },
        mounted() {
            console.log(this.form.zdjecie);
            axios.get('/kolekcja/kolekcjaapiEdit/'+this.getId)
                .then((response) => {
                    this.form = response.data;
                    console.log(this.form.zdjecie)
                })
                .catch(function (error) {
                    console.log("error", error);
                    console.log(error.response);
                });
        },

        methods: {
            changeRok(rok) {
                this.form.rok = rok;
            },
            changeNazwa(nazwa) {
                this.form.nazwa = nazwa;
            },
            changePamiec(pamiec) {
                this.form.pamiec = pamiec;
            },
            changeCena(cena) {
                this.form.cena = cena;
            },
            changeKolor(kolor) {
                this.form.kolor = kolor;
            },
            changePrzekatna(przekatna) {
                this.form.przekatna = przekatna;
            },
            changeFile(zdjecie) {
                console.log(zdjecie.name);
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
                        if(response.data.success){
                            window.alert("Zdjęcie zostało zaktualizowane");
                            console.log("udało sie");
                            this.form.zdjecie = zdjecie.name;
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
                formData.append('nazwa', this.form.nazwa);
                formData.append('rok', JSON.stringify(this.form.rok));
                formData.append('cena', this.form.cena);
                formData.append('pamiec', this.form.pamiec);
                formData.append('kolor', this.form.kolor);
                formData.append('przekatna', JSON.stringify(this.form.przekatna));
                formData.append('zdjecie', this.form.zdjecie);
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