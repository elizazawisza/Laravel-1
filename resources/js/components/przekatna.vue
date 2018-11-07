<template>
    <div id="diagonal">
        <label for="przekatna">Przekątna</label>
        <input id="przekatna" name="przekatna" type="text" @change="changePrzekatna" :value="przekatna"><br>
    </div>
</template>

<script>
    export default {
        props:['value','change'],
        name:'przekatna',
        data(){
            return{
                przekatna:this.value
            };
        },
        mounted(){
        },
        methods: {
            changePrzekatna(e){
                this.change(e.target.value);
            }
        }
    }
</script>
