<template>
    <div id="add">
        <form id="dodawanie" method="post" class="spis-form" :action="'iphoneadd'">
            <input type="hidden" name="_token" :value="csrf_token">
            <nazwa v-model="nazwa" >
            </nazwa>
            <div class="alert-danger">{{error_nazwa}}</div>
            <rok v-model="rok">
            </rok>
            <div class="alert-danger">{{error_rok}}</div>
            <cena v-model="cena" >
            </cena>
            <div class="alert-danger">{{error_cena}}</div>
            <pamiec v-model="pamiec" >
            </pamiec>
            <div class="alert-danger">{{error_pamiec}}</div>
            <kolor v-model="kolor" >
            </kolor>
            <div class="alert-danger">{{error_kolor}}</div>
            <przekatna v-model="przekatna" >
            </przekatna>
            <div class="alert-danger">{{error_przekatna}}</div>
            <div id="button">
                <button id="dodaj" type="submit" name="przycisk" value="dodaj" @click="clickDodaj">Dodaj</button>
            </div>
        </form>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'
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
            }
        },
        computed:{
            ...mapState('Iphone',['cena'], ['nazwa'], ['zdjecie'], ['kolor'], ['przekatna'], ['pamiec'], ['rok']),
            nazwa: {
                get(){
                    return 'iPhone'
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
                    return '2007'
                },
                set(value){
                    this.$store.commit('Iphone/updateRok', value)
                }
            },
            pamiec: {
                get(){
                    return '4'
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