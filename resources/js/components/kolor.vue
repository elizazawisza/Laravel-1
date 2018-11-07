<template>
    <div id="color">
        <label for="kolor">Kolor</label>
        <input id="kolor" name="kolor" type="text" @change="changeKolor" :value="kolor"><br>
    </div>
</template>

<script>
    export default {
        props:['value','change'],
        name:'kolor',
        data(){
            return{
                kolor:this.value
            };
        },
        mounted(){
        },
        methods: {
            changeKolor(e){
                this.change(e.target.value);
            }
        }
    }
</script>
