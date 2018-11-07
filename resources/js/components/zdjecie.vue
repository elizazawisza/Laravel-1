<template>
    <div id="photo">
        <label for="zdjecie">Zdjęcie</label>
        <input id='zdjecie' type="file" name="zdjecie" :value='zdjecie' @change="changeFile">
    </div>
</template>

<script>
    export default {
        props:['value','change'],
        name:'zdjecie',
        data(){
            return{
                zdjecie:''
            };
        },
        mounted(){
        },
        methods: {
            changeFile(e){
              console.log(e.target.files[0]);
              this.change(e.target.files[0]);
            }
        }
    }
</script>

