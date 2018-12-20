<template>
    <div id="diagonal" class="row">
        <div class="col-3">
            <label for="przekatna">Przekątna</label>
        </div>
        <div class="col-9">
            <input id="przekatna" name="przekatna" type="text"  :value="value"><br>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        name:'przekatna',
        data(){
            return{
                przekatna:this.value
            };
        },
        mounted(){
        },
    }
</script>
