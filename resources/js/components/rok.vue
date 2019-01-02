<template>
    <div id="year" class="row">
        <div class="col-3">
            <label for="rok">Rok</label>
        </div>
        <div class="col-9">
            <select id="rok"  v-model="rok">
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
            </select>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    export default {
        computed:{
            ...mapState('Iphone', ['rok']),
            rok: {
                get(){
                    return this.$store.state.Iphone.rok
                },
                set(value){
                    this.$store.commit('Iphone/updateRok', value)
                }
            },
        }
    }
</script>
