<template>
    <v-layout row>
        <v-flex xs4>
            <v-subheader>Cena</v-subheader>
        </v-flex>
        <v-flex xs8>
            <v-text-field id="cena" type="number" ref="cena" :value="value" @input="input" solo ></v-text-field>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        props:['value'],
        methods:{
            input(){
                this.$emit('input',this.$refs.cena.$refs.input.value);
            }
        }
    }
</script>
