<template>
    <div id="price" class="row">
        <div class="col-3">
            <label for="cena">Cena</label>
        </div>
        <div class="col-9">
            <input id="cena" name="cena" type="number" @change="changeCena" :value="cena" ><br>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value','change'],
        name:'cena',
        data(){
            return{
                cena:this.value
            };
        },
        mounted(){
        },
        methods: {
            changeCena(e){
                this.change(e.target.value);
            }
        }
    }
</script>
