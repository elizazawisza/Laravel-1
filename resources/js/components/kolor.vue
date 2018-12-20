<template>
    <div id="color" class="row">
        <div class="col-3">
            <label for="kolor">Kolor</label>
        </div>
        <div class="col-9">
            <input id="kolor" name="kolor" type="text" :value="value"><br>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        name:'kolor',
        data(){
            return{
                kolor:this.value
            };
        },
        mounted(){
        },
    }
</script>
