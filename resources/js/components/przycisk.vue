<template>
    <div id="button">
        <button id="dodaj" type="submit" name="przycisk" value="dodaj" @click="clickDodaj"> Dodaj</button>
    </div>
</template>

<script>
    export default {
        props: ['clickDodaj'],
        name: "przycisk"
    }
</script>
