<template>
    <div id="add">
        <form id="dodawanie" method="post" class="spis-form" :action="this.route">
            <input type="hidden" name="_token" :value="csrf_token">
            <nazwa :value="nazwa" :change="changeNazwa">
            </nazwa>
            <div class="alert-danger">{{error_nazwa}}</div>
            <rok :value="rok" :change="changeRok">
            </rok>
            <div class="alert-danger">{{error_rok}}</div>
            <cena :value="cena" :change="changeCena">
            </cena>
            <div class="alert-danger">{{error_cena}}</div>
            <pamiec :value="pamiec" :change="changePamiec">
            </pamiec>
            <div class="alert-danger">{{error_pamiec}}</div>
            <kolor :value="kolor" :change="changeKolor">
            </kolor>
            <div class="alert-danger">{{error_kolor}}</div>
            <przekatna :value="przekatna" :change="changePrzekatna">
            </przekatna>
            <div class="alert-danger">{{error_przekatna}}</div>
            <div id="button">
                <button id="dodaj" type="submit" name="przycisk" value="dodaj" @click="clickDodaj">Dodaj</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['route', 'basicroute', 'logoutroute'],
        data: function () {
            return {
                nazwa: 'iPhone',
                cena: '',
                rok: '2007',
                kolor: '',
                przekatna: '',
                pamiec: '4',
                error_przekatna: '',
                error_cena: '',
                error_kolor: '',
                error_nazwa: '',
                error_pamiec: '',
                error_rok: '',
                csrf_token: $('meta[name="csrf-token"]').attr('content'),
            }
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
            clickDodaj:function(e){
                e.preventDefault();
                let vn = this;
                vn.error_przekatna = '';
                vn.error_cena = '';
                vn.error_kolor = '';
                vn.error_nazwa = '';
                vn.error_pamiec = '';
                vn.error_rok = '';
                console.log(vn.logoutroute);
                axios.post(this.route, {
                    nazwa: this.nazwa,
                    rok: this.rok,
                    cena: this.cena,
                    kolor: this.kolor,
                    przekatna: this.przekatna,
                    pamiec: this.pamiec,
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
                        window.location.href=vn.basicroute;
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