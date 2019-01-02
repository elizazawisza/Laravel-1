<template>
    <div id="photo" class="row">
        <div class="col">
            <label for="zdjecie">Zdjęcie</label>
        </div>
        <div class="col-9">
            <input id='zdjecie' type="file" name="zdjecie" :value='zdjecie'>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'

   /* export default {
        computed: {
            ...mapState('Iphone', ['zdjecie']),
            zdjecie: {
                get() {
                    return this.$store.state.Iphone.zdjecie
                },
                set(value) {
                    console.log("Tutaj aktualizuje zdjęcie " + value)
                    this.$store.commit('Iphone/updateZdjecie', value)
                    this.changeFile(value)
                }
            }
        }
    } */
</script>

