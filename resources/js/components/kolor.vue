<template>
    <div id="color" class="row">
        <div class="col-3">
            <label for="kolor">Kolor</label>
        </div>
        <div class="col-9">
            <input id="kolor" name="kolor" type="text" @change="changeKolor" :value="value"><br>
        </div>
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
