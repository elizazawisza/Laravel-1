<template>
    <div id="photo" class="row">
        <div class="col">
            <label for="zdjecie">Zdjęcie</label>
        </div>
        <div class="col-9">
            <input id='zdjecie' type="file" name="zdjecie" :value='zdjecie' @change="changeFile">
        </div>
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
              this.change(e.target.files[0]);
            }
        }
    }
</script>

