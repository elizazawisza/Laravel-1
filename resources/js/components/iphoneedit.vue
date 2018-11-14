<template>
    <div id="add">
        <form id="edytowanie" method="post" class="spis-form" :action="this.route" enctype="multipart/form-data" >
            <input type="hidden" name="_method" value="PATCH">
            <div v-if=form.zdjecie>
                <img :src="`/storage/zdjecia/${form.zdjecie}`" height="200px"/>
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
            <div class="alert-danger">{{error_zdjecie}}</div>
            <div id="button">
                <button id="zaktualizuj" type="submit" name="przycisk" value="zaktualizuj" @click="clickZaktualizuj">Zaktualizuj</button>
            </div>
        </form>
    </div>
</template>

<script>

    export default {
        props: ['route','data'],
        data: function () {
            return {
                form:{
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

            }
        },
        beforeMount(){
            this.form = this.data;
        },
        mounted(){
            this.nazwa = this.data.nazwa;
            this.cena = this.data.cena;
            this.rok = this.data.rok;
            this.pamiec = this.data.pamiec;
            this.przekatna = this.data.przekatna;
            this.kolor = this.data.kolor;
            this.zdjecie = this.data.zdjecie;
            this.id = this.data.id;
        },
        methods:{
            changeNazwa(nazwa){
                this.nazwa=nazwa;
            },
            changeRok(rok){
                this.rok=rok;
            },
            changePamiec(pamiec){
                this.pamiec=pamiec;
            },
            changeCena(cena){
                this.cena=cena;
            },
            changeKolor(kolor){
                this.kolor=kolor;
            },
            changePrzekatna(przekatna){
                this.przekatna=przekatna;
            },
            changeFile(zdjecie){
                this.zdjecie=zdjecie;
            },
            clickZaktualizuj:function(e){
                e.preventDefault();

                var vn = this;
                vn.error_przekatna = '';
                vn.error_cena = '';
                vn.error_kolor = '';
                vn.error_nazwa = '';
                vn.error_pamiec = '';
                vn.error_rok = '';
                vn.error_zdjecie = '';
                let formData = new FormData();
                formData.append('nazwa', this.nazwa);
                formData.append('rok', JSON.stringify(this.rok));
                formData.append('cena', this.cena);
                formData.append('pamiec', this.pamiec);
                formData.append('kolor', this.kolor);
                formData.append('przekatna', JSON.stringify(this.przekatna));
                formData.append('zdjecie', this.zdjecie);
                formData.append('_method', 'PATCH');
                console.log(this.route);
                axios.post(this.route,formData)
                    .then(function (response) {
                        if (response.data.success) {
                            vn.nazwa = '';
                            vn.rok = '';
                            vn.cena = '';
                            vn.kolor = '';
                            vn.przekatna = '';
                            vn.pamiec = '';
                        }
                        window.alert("Telefon został zaktualizowany");
                        window.location.href=('http://kolekcja.local/kolekcja');
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
                        if(error.response.data.errors.zdjecie)
                            vn.error_zdjecie = error.response.data.errors.zdjecie[0];

                    });
            }
        }
    }
</script>
<style>

</style>