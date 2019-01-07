<template>
    <v-layout row>
        <v-flex xs4>
            <v-subheader>Nazwa</v-subheader>
        </v-flex>
        <v-flex xs8>
            <v-select id="nazwa" :items="items" ref="nazwa" :value="value" @input="input" solo>
            </v-select>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        props:['value'],
        data: () => ({
            items: ['iPhone', 'iPhone 3G', 'iPhone 3GS', 'iPhone 4', 'iPhone 5', 'iPhone 5C', 'iPhone 5S', 'iPhone 6',
                    'iPhone 6+', 'iPhone 6S', 'iPhone 6S+', 'iPhone SE', 'iPhone 7', 'iPhone 7+', 'iPhone 8',
                    'iPhone 8+', 'iPhone X', 'iPhone XS', 'iPhone XSMax', 'iPhone XR' ]
        }),
        methods:{
            input(){
                this.$emit('input',this.$refs.nazwa.lazyValue);
            }
        }
    }
</script>
