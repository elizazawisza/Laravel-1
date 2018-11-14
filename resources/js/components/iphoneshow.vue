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
        props:['data', 'basicroute'],
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
                }
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
        },
        methods:{
            powrot:function(e){
                e.preventDefault();
                window.location.href=(this.basicroute);
            }
        }
    }
</script>

<style scoped>

</style>