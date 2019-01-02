<template>
    <div id="diagonal" class="row">
        <div class="col-3">
            <label for="przekatna">Przekątna</label>
        </div>
        <div class="col-9">
            <input id="przekatna" name="przekatna" type="text"  v-model="nowa_przekatna"><br>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        name:'przekatna',
        data(){
            return{
                nowa_przekatna: this.value
            };
        },
        watch: {
            nowa_przekatna(val) {
                this.$emit('input', val);
            }
        }
    }
</script>
