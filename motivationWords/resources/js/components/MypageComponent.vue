<template>
    <div class ="mypage">
        <h2>Mypage</h2>

        <h3>全ユーザのモチベ</h3>
        　<allpost-component></allpost-component>

        <h3>Myモチベ</h3>
          <mypost-component :id="user.id"></mypost-component>

        <h3>Favモチベ</h3>
          <favpost-component></favpost-component>

    </div>
</template>

<script>
    export default {
        data: function(){

            return{

                user:[]

            }
        },

        props:['user']
    }
</script>

<style scoped>
  .heart{
      color:red;
  }
</style>
