<template>
    <div id="index">
        <div class="tabela">
            <table>
                <tr>
                    <th>Lp</th>
                    <th>Nazwa</th>
                    <th>Rok</th>
                    <th>Cena</th>
                    <th>Pamięć</th>
                    <th>Kolor</th>
                    <th>Przekątna</th>
                    <th></th><th>Opcje</th><th></th>
                </tr>
                <tr v-for="(form, index) in form ">
                    <td>{{index+1}}</td>
                    <td>{{form.nazwa}}</td>
                    <td>{{form.rok}}</td>
                    <td>{{form.cena}}</td>
                    <td>{{form.pamiec}}</td>
                    <td>{{form.kolor}}</td>
                    <td>{{form.przekatna}}</td>
                    <td>
                       <a :href="`/kolekcja/${form.id}`" class="przycisk_podglad"><button>Podgląd</button></a>
                    </td>
                    <td>
                        <a :href="`/kolekcja/${form.id}/edit`" class="przycisk_edytuj"><button>Edytuj</button></a>
                    </td>
                    <td>
                        <button class="button przycisk_usun" type="submit" @click="usuwanie(form.id)">Usuń</button>
                    </td>
                    <td>
                        <button type="submit" @click="dogory()">↑</button>
                    </td>
                    <td>
                        <button type="submit" @click="wdol()">↓</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="button">
            <button id="dodawanie" type="submit" name="przycisk" value="dodawanie" @click="dodawanie">Przejdź do strony dodawania</button>
        </div>
    </div>
</template>

<script>
    export default {
        props:['data'],
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
                    id:'',
                }
            }
        },
        beforeMount(){
            this.form = this.data;
            console.log(this.data);
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
            dodawanie:function(e){
                e.preventDefault();
                window.location.href=('http://kolekcja.local/kolekcja/create');
            },
            usuwanie:function (form) {
                axios.post(`http://kolekcja.local/kolekcja/` + form ,{
                    _method : 'DELETE'
                })
                    .then(function (response) {
                        if (response.data.success) {}
                        window.alert("Telefon został usunięty");
                        window.location.href=('http://kolekcja.local/kolekcja');
                    })
                    .catch(function (error) {
                        console.log("error",error);
                        console.log(error.response.data);

                    });
            },
            dogory:function(e){
                console.log(e)
            },
            wdol:function(e){
                
            }
        }
    }
</script>
