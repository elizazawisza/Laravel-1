<template>
<div id="show">

    <div class="tabela_podglad">
        <table>
            <thead>
            <tr>
                <th>Zdjęcie</th>
                <td>
                    <img v-if="form.zdjecie!=''" :src="`/storage/${form.zdjecie}`" height="200px"/>
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
        mounted(){
            let app = this;
            let rid = app.$route.params.id;
            axios.get('/kolekcja/kolekcjaapiShow/' + rid)
                .then((response)=>{
                    this.form=response.data;
                })
                .catch(function (error) {
                    console.log("error",error);
                    console.log(error.response);
                });
        },
        methods:{
            powrot:function(e){
                let vn = this;
                e.preventDefault();
                vn.$router.replace('/kolekcja');
                //window.location.href=this.basicroute;
            }
        }
    }
</script>

<style scoped>

</style>