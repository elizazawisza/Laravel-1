<template>
    <v-layout row>
        <v-flex xs4>
            <v-subheader>Zdjęcie</v-subheader>
        </v-flex>
        <v-flex xs8>
            <input id='zdjecie' type="file" name="zdjecie" :value='zdjecie' @change="changeFile">
        </v-flex>

    </v-layout>
</template>

<script>
    export default {
        props:['value','change'],
        name:'zdjecie',
        data(){
            return{
                zdjecie:''
            };
        },
        mounted(){
        },
        methods: {
            changeFile(e){
              this.change(e.target.files[0]);
            }
        }
    }
</script>

