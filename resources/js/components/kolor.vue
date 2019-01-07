<template>
    <v-layout row>
        <v-flex xs4>
            <v-subheader>Kolor</v-subheader>
        </v-flex>
        <v-flex xs8>
            <v-text-field id="kolor" type="text" ref="kolor" :value="value" @input="input" solo></v-text-field>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        props:['value'],
        methods:{
            input(){
                this.$emit('input',this.$refs.kolor.$refs.input.value);
            }
        }
    }
</script>
