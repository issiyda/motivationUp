<template>
    <div class ="footer-container">
        <p>モチベーションの源泉をあなたに届ける</p>
        <p class ="app">モチベ</p>
        <p>CreatedBy ~shogo~</p>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        name: "FooterComponent",
    }
</script>

<style scoped>
    .footer-container{
        background: #00cc66;
        opacity:0.9;
    }

.app{
    font-weight: bolder;
}
</style>
