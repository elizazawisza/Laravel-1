<template>
    <div id="memory" class="row">
        <div class="col-3">
            <label for="pamiec">Pamięć</label>
        </div>
        <div class="col-9">
            <select id="pamiec" ref="pamiec" :value="value" @input="input">
                <option value="4">4 GB</option>
                <option value="8">8 GB</option>
                <option value="16">16 GB</option>
                <option value="32">32 GB</option>
                <option value="64">64 GB</option>
                <option value="128">128 GB</option>
                <option value="256">256 GB</option>
                <option value="512">512 GB</option>
            </select>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations, mapActions } from 'vuex'
    export default {
        props:['value'],
        methods:{
            input(){
                this.$emit('input',this.$refs.pamiec.value);
            }
        }
    }
</script>
