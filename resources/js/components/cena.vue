<template>
    <div id="price" class="row">
        <div class="col-3">
            <label for="cena">Cena</label>
        </div>
        <div class="col-9">
            <input id="cena" name="cena" type="number" v-model="nowa_cena" ><br>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        name:'cena',
        data(){
            return{
                nowa_cena: this.value
            };
        },
        watch: {
            nowa_cena(val) {
                this.$emit('input', val);
            }
        }
    }
</script>
