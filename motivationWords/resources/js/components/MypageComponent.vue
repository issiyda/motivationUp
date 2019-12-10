<template>
    <div class ="mypage">
        <h2>Mypage</h2>

        <h3>全ユーザのモチベ</h3>
        　<allpost-component :color ="user.color"></allpost-component>

        <h3>Myモチベ</h3>
          <mypost-component :id="user.id" :color="user.color"></mypost-component>

        <h3>Favモチベ</h3>
          <favpost-component :color="user.color"></favpost-component>

    </div>
</template>

<script>
    export default {
        data: function(){

            return{
                user:[],
                // myColor:""

            }
        },

        created: function(){

            axios.get('/api/mypage')
                .then(response => {
                    // this.myColor = response.data.themeColor.color;

                    console.log('created finished')
                })
        },

        props:['user'],

    }
</script>
　　　

<style>
  .heart{
      color:red;
  }
</style>
