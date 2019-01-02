<template>
    <div id="color" class="row">
        <div class="col-3">
            <label for="kolor">Kolor</label>
        </div>
        <div class="col-9">
            <input id="kolor" type="text" v-model="kolor"><br>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    export default {
        computed:{
            ...mapState('Iphone', ['kolor']),
            kolor: {
                get(){
                    return this.$store.state.Iphone.kolor
                },
                set(value){
                    this.$store.commit('Iphone/updateKolor', value)
                }
            },
        }
    }
</script>
