<template>
    <div id="memory">
        <label for="pamiec">Pamięć</label>
        <select id="pamiec" name="pamiec" @change="changePamiec" :value="pamiec">
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
</template>

<script>
    export default {
        props:['value','change'],
        name:'pamiec',
        data(){
            return{
                pamiec:this.value
            };
        },
        mounted(){
        },
        methods: {
            changePamiec(e){
                this.change(e.target.value);
            }
        }
    }
</script>
