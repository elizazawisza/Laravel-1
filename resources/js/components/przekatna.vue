<template>
    <div id="diagonal" class="row">
        <div class="col-3">
            <label for="przekatna">Przekątna</label>
        </div>
        <div class="col-9">
            <input id="przekatna" type="text"  ref="przekatna" :value="value" @input="input"><br>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        methods:{
            input(){
                this.$emit('input',this.$refs.przekatna.value);
            }
        }
    }
</script>
