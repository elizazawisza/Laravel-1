<template>
    <div id="memory" class="row">
        <div class="col-3">
            <label for="pamiec">Pamięć</label>
        </div>
        <div class="col-9">
            <select id="pamiec" name="pamiec" v-model="nowa_pamiec">
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
    export default {
        props:['value'],
        name:'pamiec',
        data(){
            return{
                nowa_pamiec: this.value
            };
        },
        watch: {
            nowa_pamiec(val) {
                this.$emit('input', val);
            }
        }
    }
</script>
