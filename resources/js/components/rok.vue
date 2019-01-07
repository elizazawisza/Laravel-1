<template>
    <v-layout row>
        <v-flex xs4>
            <v-subheader>Rok</v-subheader>
        </v-flex>
        <v-flex xs8>
            <v-select id="rok" :items="items" ref="rok" :value="value" @input="input" solo>
            </v-select>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        props:['value'],
        data: () => ({
            items: ['2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018' ],
        }),
        methods:{
            input(){
                this.$emit('input',this.$refs.rok.lazyValue);
            }
        }
    }
</script>
