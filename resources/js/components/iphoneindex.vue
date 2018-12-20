<template>
    <div id="index">
        <div class="tabela">

            <table v-if="form[0]">
                <tr>
                    <th>Lp</th>
                    <th>Nazwa</th>
                    <th>Rok</th>
                    <th>Cena</th>
                    <th>Pamięć</th>
                    <th>Kolor</th>
                    <th>Przekątna</th>
                    <th></th><th>Opcje</th><th></th><th>Kolejność</th>
                </tr>
                <tr v-for="(element, index) in form ">
                    <td>{{element.kolejka}}</td>
                    <td>{{element.nazwa}}</td>
                    <td>{{element.rok}}</td>
                    <td>{{element.cena}}</td>
                    <td>{{element.pamiec}}</td>
                    <td>{{element.kolor}}</td>
                    <td>{{element.przekatna}}</td>
                    <td>
                        <router-link class="przycisk_podglad" v-bind:to="{name: 'iphoneshow', params:{id:element.id}}"><button>Podgląd</button></router-link>
                    </td>
                    <td>
                        <router-link class="przycisk_edytuj" v-bind:to="{name: 'iphoneedit', params:{id:element.id}}"><button>Edytuj</button></router-link>
                    </td>
                    <td>
                        <button class="button przycisk_usun" type="submit" @click="usuwanie(element.id)">Usuń</button>
                    </td>
                    <td>
                        <button class="button gora" type="submit" @click="dogory(index)">↑</button>
                        <button class="button dol" type="submit" @click="wdol(index)">↓</button>
                    </td>
                </tr>
            </table>
            <table v-else>
                <th>Brak rekordów</th>
            </table>
        </div>
        <div class="button">
            <router-link :to="{name: 'iphoneadd'}"><button id="dodawanie" type="submit" name="przycisk" value="dodawanie">Przejdź do strony dodawania</button></router-link>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    export default {
        props:[],
        data: function () {
            return {
            }
        },
        beforeMount(){
            this.loadForm();
        },
       mounted(){


        },
        computed: {
            ...mapState('Lista',['form']),

            setform(){
                this.$store.commit('getForm');
            }
        },

        methods:{
            ...mapActions('Lista',['loadForm']),
            usuwanie:function (form) {
                var odp = confirm("Na pewno chcesz usunąć ten telefon z kolekcji?");
                let vn = this;
                if(odp===true){
                    axios.post('kolekcja/'+ form ,{
                        _method : 'DELETE'
                    })
                        .then(function(response){
                            if (response.data.success) {}
                            window.alert("Telefon został usunięty");
                            vn.$router.go();
                        })
                        .catch(function (error) {
                            console.log("error",error);
                            console.log(error.response.data);
                        });
                }
                else{
                    window.alert("Telefon nie został usunięty");
                }
            },
            dogory:function(index){
                if(index===0){
                    window.alert("Nie można zmienić położenia danego rekordu");
                }else{
                    let current = this.form[index];
                    current.kolejka--;
                    let tmp = this.form[index-1];
                    this.form[index-1].kolejka++;
                    this.form.sort((a,b)=>a.kolejka>b.kolejka ? 1 : -1);
                    this.zamien(current, tmp);
                }
            },
            wdol:function(index){
                let dlugosc = this.form.length;
                if(index===dlugosc-1){
                    window.alert("Nie można zmienić położenia danego rekordu");
                }else{
                    let current = this.form[index];
                    current.kolejka++;
                    let tmp = this.form[index+1];
                    this.form[index+1].kolejka--;
                    this.form.sort((a,b)=>a.kolejka>b.kolejka ? 1 : -1);
                    this.zamien(tmp, current);
                }
            },
            zamien:function(form1, form2){
                let data = [];
                data.push({id: form1.id, kolejka: form1.kolejka});
                data.push({id: form2.id, kolejka: form2.kolejka});
                axios.patch('kolekcjaChangeOrder',{data})
                    .then(function (response){
                    })
                    .catch(function (error) {
                        console.log("error",error);
                    });
            }
        }
    }
</script>