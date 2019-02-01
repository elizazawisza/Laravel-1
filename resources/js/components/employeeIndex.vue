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
            <v-data-table :headers="headers" :items="form" :search="search" :rows-per-page-text="'Ilość na stronie'" :expand="expand" >
                <template slot="items" slot-scope="props">
                    <tr @click="props.expanded = !props.expanded">
                    <td>{{props.index+1}}</td>
                    <td>{{ props.item.imie }}</td>
                    <td class="text-xs-left">{{ props.item.nazwisko }}</td>
                    <td class="text-xs-left">{{ props.item.email }}</td>
                    <td class="text-xs-left">{{ props.item.numer_telefonu }}</td>
                    <td class="text-xs-left"> <p v-for="telefon in props.item.kolekcja" :key="props.item.kolekcja.id">{{ telefon.nazwa }}</p></td>
                    <td class="text-xs-left">
                        <router-link  v-bind:to="{name: 'employeeShow', params:{id:props.item.id}}"><v-btn color="success">Podgląd</v-btn></router-link>
                        <router-link  v-bind:to="{name: 'employeeEdit', params:{id:props.item.id}}"><v-btn color="info">Edytuj</v-btn></router-link>
                        <v-btn color="error" @click="usuwanie(props.item.id, props.index)">Usuń</v-btn>
                    </td>
                    </tr>
                </template>
                <template slot="expand" slot-scope="props">
                    <v-card flat>
                        <v-card-text v-if="props.item.telefon_id!==null" v-for="telefon in props.item.kolekcja" :key="props.item.kolekcja.id" >Nazwa: {{telefon.nazwa}}<br> Rok: {{telefon.rok}} <br>Pamięć: {{telefon.pamiec_gb}}<br> Kolor: {{telefon.kolor}}</v-card-text>
                        <v-card-text v-if="props.item.telefon_id===null">Brak informacji</v-card-text>
                    </v-card>
                </template>
                <template slot="pageText" slot-scope="props">
                    {{ props.pageStart }} - {{ props.pageStop }} z {{ props.itemsLength }}
                </template>
            </v-data-table>
            <div class="text-xs-center">
                <router-link :to="{name: 'employeeAdd'}"><v-btn color="#53A4E6" dark>Przejdź do strony dodawania</v-btn></router-link>
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
    .v-card__text {
        margin-left: 40px;
    }
    p {
        margin-bottom: 0px;
    }
</style>

<script>
    import { mapState, mapActions } from 'vuex'
    export default {
        props:[],
        data: function () {
            return {
                expand: false,
                headers: [
                    { text: 'Lp', align: 'center', sortable: false, value: 'lp' },
                    { text: 'Imie', align: 'center', value: 'imie' },
                    { text: 'Nazwisko', align: 'center', value: 'nazwisko' },
                    { text: 'E-mail', align: 'center', value: 'email' },
                    { text: 'Numer telefonu', align: 'center', value: 'numer_telefonu' },
                    { text: 'Telefon', align: 'center', value: 'telefon_id' },
                    { text: 'Akcje', align: 'center', sortable: false, value: 'actions' },
                ],
                search: '',
                telefon: [],
                //form: [],
            }
        },
        beforeMount(){
            this.loadForm();
        },
        computed: {
            ...mapState('Pracownicy',['form']),

            setform(){
                this.$store.commit('getForm');
            }
        },

        methods:{
            ...mapActions('Pracownicy',['loadForm']),
            usuwanie:function (form, index) {
                var odp = confirm("Na pewno chcesz usunąć tego pracownika?");
                let vn = this;
                //console.log(vn.form);
                if(odp===true){
                    axios.post('pracownicy/'+ form ,{
                        _method : 'DELETE'
                    })
                        .then(function(response){
                            if (response.data.success) {}
                            window.alert("Pracownik został usunięty");
                            //vn.form.splice(form, 1);
                            vn.form.splice(index, 1)
                        })
                        .catch(function (error) {
                            console.log("error",error);
                            //  console.log(error.response.data);
                        });
                }
                else{
                    window.alert("Pracownik nie został usunięty");
                }
            },
        }
    }
</script>
