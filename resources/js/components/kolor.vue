<template>
    <div id="color" class="row">
        <div class="col-3">
            <label for="kolor">Kolor</label>
        </div>
        <div class="col-9">
            <input id="kolor" name="kolor" type="text" v-model="kolor"><br>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        data(){
            return{
                kolor: this.value
            };
        },
        watch: {
            kolor(val) {
                this.$emit('input', val);
            }
        }
    }
</script>
