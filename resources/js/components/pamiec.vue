<template>
    <v-layout row>
        <v-flex xs4>
            <v-subheader>Pamięć</v-subheader>
        </v-flex>
        <v-flex xs8>
            <v-select id="pamiec" :items="items" ref="pamiec" :value="value" @input="input" solo>
            </v-select>
        </v-flex>

    </v-layout>
</template>

<script>
    export default {
        props:['value'],
        data: () => ({
            items: ['4 GB', '8 GB', '16 GB', '32 GB', '64 GB', '128 GB', '256 GB', '512 GB'],
        }),
        methods:{
            input(){
                this.$emit('input',this.$refs.pamiec.lazyValue);
            }
        }
    }
</script>
