<template>
    <div id="photo" class="row">
        <div class="col">
            <label for="zdjecie">Zdjęcie</label>
        </div>
        <div class="col-9">
            <input id='zdjecie' type="file" name="zdjecie" :value='zdjecie'>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        name:'zdjecie',
        data(){
            return{
                zdjecie:''
            };
        },
        mounted(){
        },
    }
</script>

