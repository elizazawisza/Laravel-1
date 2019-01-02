<template>
    <div id="price" class="row">
        <div class="col-3">
            <label for="cena">Cena</label>
        </div>
        <div class="col-9">
            <input id="cena" type="number" v-model="cena" ><br>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    export default {
        computed:{
            ...mapState('Iphone', ['cena']),
            cena: {
                get(){
                    return this.$store.state.Iphone.cena
                },
                set(value){
                    this.$store.commit('Iphone/updateCena', value)
                }
            },
        }
    }
</script>
