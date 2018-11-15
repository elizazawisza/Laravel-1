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
                       <a :href="`${basicroute}/${element.id}`" class="przycisk_podglad"><button>Podgląd</button></a>
                    </td>
                    <td>
                        <a :href="`${basicroute}/${element.id}/edit`" class="przycisk_edytuj"><button>Edytuj</button></a>
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
            <button id="dodawanie" type="submit" name="przycisk" value="dodawanie" @click="dodawanie">Przejdź do strony dodawania</button>
        </div>
    </div>
</template>

<script>
    export default {
        props:['data', 'basicroute'],
        data: function () {
            return {
                form:this.data,

            }
        },
        beforeMount(){
        },
        methods:{
            dodawanie:function(e){
                e.preventDefault();
                window.location.href=(this.basicroute+'/create');
            },
            usuwanie:function (form) {
                var odp = confirm("Na pewno chcesz usunąć ten telefon z kolekcji?");
                if(odp===true){
                    axios.post(this.basicroute +'/'+ form ,{
                        _method : 'DELETE'
                    })
                        .then((response)=> {
                            if (response.data.success) {}
                            window.alert("Telefon został usunięty");
                            window.location.href=(this.basicroute);
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
                    this.form[index-1].kolejka++;
                    this.form.sort((a,b)=>a.kolejka>b.kolejka ? 1 : -1);
                }
            },
            wdol:function(index){
                let dlugosc = this.data.length;
                console.log(dlugosc);
                if(index===dlugosc-1){
                    window.alert("Nie można zmienić położenia danego rekordu");
                }else{
                    let current = this.form[index];
                    current.kolejka++;
                    this.form[index+1].kolejka--;
                    this.form.sort((a,b)=>a.kolejka>b.kolejka ? 1 : -1);
                }
            }
        }
    }
</script>