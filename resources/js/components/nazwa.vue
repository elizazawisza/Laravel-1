<template>
    <div id="name" class="row">
        <div class="col-3">
            <label for="nazwa">Nazwa</label>
        </div>
        <div class="col-9">
            <select id="nazwa" name="nazwa" @change="changeNazwa" :value="value">
                <option value="iPhone">iPhone</option>
                <option value="iPhone3G">iPhone 3G</option>
                <option value="iPhone3GS">iPhone 3GS</option>
                <option value="iPhone4">iPhone 4</option>
                <option value="iPhone4S">iPhone 4S</option>
                <option value="iPhone5">iPhone 5</option>
                <option value="iPhone5C">iPhone 5C</option>
                <option value="iPhone5S">iPhone 5S</option>
                <option value="iPhone6">iPhone 6</option>
                <option value="iPhone6+">iPhone 6+</option>
                <option value="iPhone6S">iPhone 6S</option>
                <option value="iPhone6S+">iPhone 6S+</option>
                <option value="iPhoneSE">iPhone SE</option>
                <option value="iPhone7">iPhone 7</option>
                <option value="iPhone7+">iPhone 7+</option>
                <option value="iPhone8">iPhone 8</option>
                <option value="iPhone8+">iPhone 8+</option>
                <option value="iPhoneX">iPhone X</option>
                <option value="iPhoneXS">iPhone XS</option>
                <option value="iPhoneXSMax">iPhone XSMax</option>
                <option value="iPhoneXR">iPhone XR</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value','change'],
        name:'nazwa',
        data(){
            return{
                nazwa:this.value
            };
        },
        mounted(){
        },
        methods: {
            changeNazwa(e){
                this.change(e.target.value);
            }
        }
    }
</script>
