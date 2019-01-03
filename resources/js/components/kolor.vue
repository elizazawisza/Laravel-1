<template>
    <div id="color" class="row">
        <div class="col-3">
            <label for="kolor">Kolor</label>
        </div>
        <div class="col-9">
            <input id="kolor" type="text" ref="kolor" :value="value" @input="input"><br>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    export default {
        props:['value'],
        methods:{
            input(){
                this.$emit('input',this.$refs.kolor.value);
            }
        }
    }
</script>
