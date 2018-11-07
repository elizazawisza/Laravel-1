<template>
    <div id="price">
        <label for="cena">Cena</label>
        <input id="cena" name="cena" type="number" @change="changeCena" :value="cena" ><br>
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
