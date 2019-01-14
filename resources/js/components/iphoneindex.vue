<template>
    <div id="index">
        <v-card>
            <v-card-title>
                <v-spacer></v-spacer>
                <v-text-field
                        v-model="search"
                        append-icon="search"
                        label="Wyszukaj"
                        single-line
                        hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table :headers="headers" :items="form" :search="search" :rows-per-page-text="'Ilość na stronie'" >
                <template slot="items" slot-scope="props">
                    <td>{{props.index+1}}</td>
                    <td>{{ props.item.nazwa }}</td>
                    <td class="text-xs-left">{{ props.item.rok }}</td>
                    <td class="text-xs-left">{{ props.item.cena_zl }}</td>
                    <td class="text-xs-left">{{ props.item.pamiec_gb }}</td>
                    <td class="text-xs-left">{{ props.item.kolor }}</td>
                    <td class="text-xs-left">{{ props.item.przekatna }}</td>
                    <td class="text-xs-left">
                        <router-link  v-bind:to="{name: 'iphoneshow', params:{id:props.item.id}}"><v-btn color="success">Podgląd</v-btn></router-link>
                        <router-link  v-bind:to="{name: 'iphoneedit', params:{id:props.item.id}}"><v-btn color="info">Edytuj</v-btn></router-link>
                        <v-btn color="error" @click="usuwanie(props.item.id)">Usuń</v-btn>
                    </td>
                    <td>
                        <v-btn small @click="dogory(props.index)">↑</v-btn>
                        <v-btn small @click="wdol(props.index)">↓</v-btn>
                    </td>
                </template>
                <template slot="pageText" slot-scope="props">
                    {{ props.pageStart }} - {{ props.pageStop }} z {{ props.itemsLength }}
                </template>
            </v-data-table>
            <div class="text-xs-center">
                <router-link :to="{name: 'iphoneadd'}"><v-btn color="#53A4E6" dark>Przejdź do strony dodawania</v-btn></router-link>
            </div>
        </v-card>
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
        font-weight: 500;
        font-size: 15px;
    }
    .v-btn--small {
        min-width:0;
    }
    .v-btn{
        height:25px;
        font-size: 12px;
    }



</style>

<script>

    import { mapState, mapActions } from 'vuex'
    export default {
        props:[],
        data: function () {
            return {
                headers: [
                    { text: 'Lp', align: 'center', sortable: false, value: 'lp' },
                    { text: 'Nazwa', align: 'center', value: 'nazwa' },
                    { text: 'Rok', align: 'center', value: 'rok' },
                    { text: 'Cena', align: 'center', value: 'cena' },
                    { text: 'Pamięć', align: 'center', value: 'pamiec' },
                    { text: 'Kolor', align: 'center', value: 'kolor' },
                    { text: 'Przekątna', align: 'center', value: 'przekatna' },
                    { text: 'Akcje', align: 'center', sortable: false, value: 'actions' },
                    { text: 'Kolejność', align: 'center', sortable: false, value: 'order' },
                ],
                search: '',
                //form: [],
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