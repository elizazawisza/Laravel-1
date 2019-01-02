<template>
    <div id="diagonal" class="row">
        <div class="col-3">
            <label for="przekatna">Przekątna</label>
        </div>
        <div class="col-9">
            <input id="przekatna" type="text"  v-model="przekatna"><br>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    export default {
        computed:{
            ...mapState('Iphone', ['przekatna']),
            przekatna: {
                get(){
                    return this.$store.state.Iphone.przekatna
                },
                set(value){
                    this.$store.commit('Iphone/updatePrzekatna', value)
                }
            },
        }
    }
</script>
