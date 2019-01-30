<template>
    <div id="show">

        <div class="tabela_podglad">
            <table>
                <thead>
                <tr>
                    <th>Imię</th>
                    <td> {{form.imie}}</td>
                </tr>
                <tr>
                    <th>Nazwisko</th>
                    <td>{{form.nazwisko}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{form.email}}</td>
                </tr>
                <tr>
                    <th>Numer telefonu</th>
                    <td>{{form.numer_telefonu}}</td>
                </tr>
                </thead>
            </table>

        </div>
        <div id="button">
            <button id="powrot" type="submit" name="przycisk" value="powrot" @click="powrot">Powrot do spisu</button>
        </div>
    </div>
</template>
<style>
    .application--wrap {
        background-color: #cceeff;
    }
</style>
<script>
    export default {
        data: function () {
            return {
                form: {
                    imie: '',
                    nazwisko: '',
                    numer_telefonu: '',
                    email: '',
                }
            }
        },
        mounted(){
            let app = this;
            let rid = app.$route.params.id;
            axios.get('/pracownicy/pracownicyApiShow/' + rid)
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
                vn.$router.replace('/pracownicy');
            }
        }
    }
</script>

<style scoped>

</style>