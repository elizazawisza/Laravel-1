<template>
    <v-layout row>
        <v-flex xs4>
            <v-subheader>Przekątna</v-subheader>
        </v-flex>
        <v-flex xs8>
            <v-text-field id="przekatna" type="text"  ref="przekatna" :value="value" @input="input" solo></v-text-field>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        props:['value'],
        methods:{
            input(){
                this.$emit('input',this.$refs.przekatna.value);
            }
        }
    }
</script>
