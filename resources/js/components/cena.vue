<template>
    <div id="price" class="row">
        <div class="col-3">
            <label for="cena">Cena</label>
        </div>
        <div class="col-9">
            <input id="cena" type="number" ref="cena" :value="value" @input="input" ><br>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        methods:{
            input(){
                this.$emit('input',this.$refs.cena.value);
            }
        }
    }
</script>
