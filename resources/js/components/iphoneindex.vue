<template>
    <div id="index">
            <v-data-table :headers="headers" :items="form" >
                <template slot="items" slot-scope="props">
                    <td>{{ props.item.kolejka }}</td>
                    <td class="text-xs-right">{{ props.item.nazwa }}</td>
                    <td class="text-xs-right">{{ props.item.rok }}</td>
                    <td class="text-xs-right">{{ props.item.cena }}</td>
                    <td class="text-xs-right">{{ props.item.pamiec }}</td>
                    <td class="text-xs-right">{{ props.item.kolor }}</td>
                    <td class="text-xs-right">{{ props.item.przekatna }}</td>
                    <td class="text-xs-right">
                        <router-link  v-bind:to="{name: 'iphoneshow', params:{id:props.item.id}}"><v-btn small color="success">Podgląd</v-btn></router-link>
                        <router-link  v-bind:to="{name: 'iphoneedit', params:{id:props.item.id}}"><v-btn small color="info"> Edytuj </v-btn></router-link>
                        <v-btn small color="error" @click="usuwanie(props.item.id)">  Usuń  </v-btn>
                    </td>
                    <td>
                        <v-btn small @click="dogory(props.index)">↑</v-btn>
                        <v-btn small @click="wdol(props.index)">↓</v-btn>
                    </td>

                </template>
            </v-data-table>
        <div class="text-xs-center">
            <router-link :to="{name: 'iphoneadd'}"><v-btn color="#53A4E6" dark>Przejdź do strony dodawania</v-btn></router-link>
        </div>
    </div>
</template>
<style>
    .application--wrap{
        min-height: 0 !important;
        background-color: #cceeff;
    }
    a:-webkit-any-link{
        text-decoration: none !important;
    }
    .theme--light.v-table thead th {
        background-color: #0767B0;
        color:white;
    }
    table.v-table thead th {
        font-size: 15px;
    }
    table.v-table thead th {
        font-weight: 500;
        font-size: 12px;
        width:10px !important;
    }
    .v-btn {
        min-width:0px;
    }


</style>

<script>
    import { mapState, mapActions } from 'vuex'
    export default {
        props:[],
        data: function () {
            return {
                headers: [
                    { text: 'Lp', align: 'center', sortable: false, value: 'lp'},
                    { text: 'Nazwa', align: 'center', sortable: false, value: 'name' },
                    { text: 'Rok', align: 'center', sortable: false, value: 'year' },
                    { text: 'Cena', align: 'center', sortable: false, value: 'price' },
                    { text: 'Pamiec', align: 'center', sortable: false, value: 'memory' },
                    { text: 'Kolor', align: 'center', sortable: false, value: 'color' },
                    { text: 'Przekatna', align: 'center', sortable: false, value: 'diagonal' },
                    { text: 'Akcje', align: 'center', sortable: false, value: 'actions' },
                    { text: 'Kolejnosc', align: 'center', sortable: false, value: 'order' },
                ],

            }
        },
        beforeMount(){
            this.loadForm();
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