<template>
    <div class ="footer-container">
        <p>モチベーションの源泉をあなたに届ける</p>
        <p class ="app"><a href="#">モチベ</a></p>
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
        background: #0DCEA8;
        opacity:0.9;
    }

.app{
    font-weight: bolder;
}
</style>
