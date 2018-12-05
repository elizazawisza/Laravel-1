<template>
<div id="show">

    <div class="tabela_podglad">
        <table>
            <thead>
            <tr>
                <th>Zdjęcie</th>
                <td>
                    <img v-if="form.zdjecie!=''" :src="`/storage/zdjecia/${form.zdjecie}`" height="200px"/>
                    <img v-else :src="`/storage/Apple.png`" height="100px"/>
                </td>
            </tr>
            <tr>
                <th>Nazwa</th>
                <td> {{form.nazwa}}</td>
            </tr>
            <tr>
                <th>Rok</th>
                <td>{{form.rok}}</td>
            </tr>
            <tr>
                <th>Cena</th>
                <td>{{form.cena}}</td>
            </tr>
            <tr>
                <th>Pamięć</th>
                <td>{{form.pamiec}}</td>
            </tr>
            <tr>
                <th>Kolor</th>
                <td>{{form.kolor}}</td>
            </tr>
            <tr>
                <th>Przekątna</th>
                <td>{{form.przekatna}}</td>
            </tr>
            </thead>
        </table>

    </div>
    <div id="button">
        <button id="powrot" type="submit" name="przycisk" value="powrot" @click="powrot">Powrot do spisu</button>
    </div>
</div>
</template>
<script>
    export default {
        props:[],
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
                }
            }
        },
        beforeMount() {
        },
        mounted(){
            let app = this;
            let rid = app.$route.params.id;
            console.log(rid);
            axios.get('/kolekcja/' + rid)
                .then((response)=>{
                    console.log(response)
                    this.form=response.data;
                    this.nazwa = this.form.nazwa;
                    this.cena = this.form.cena;
                    this.rok = this.form.rok;
                    this.pamiec = this.form.pamiec;
                    this.przekatna = this.form.przekatna;
                    this.kolor = this.form.kolor;
                    this.zdjecie = this.form.zdjecie;
                    console.log(response.data)
                    console.log(this.form.nazwa)
                    console.log(form.nazwa);
                })
                .catch(function (error) {
                    console.log("error",error);
                    console.log(error.response);
                });
        },
        methods:{
            powrot:function(e){
                e.preventDefault();
                //window.location.href=this.basicroute;
            }
        }
    }
</script>

<style scoped>

</style>