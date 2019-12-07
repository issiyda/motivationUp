<template>
    <div class ="mypage">
        <h2>Mypage</h2>

        <h3>全ユーザのモチベ</h3>
        　<allpost-component></allpost-component>

        <h3>Myモチベ</h3>
          <mypost-component :id="user.id"></mypost-component>

        <h3>Favモチベ</h3>
        <div class="fav fav-container">
            <div v-for="fav in favs" class ="fav-card">
                <div class="fav-title">
                    <div>お気に入り</div>
                    {{fav.title}}
                </div>
                <div class="fav-main">
                    <div>言葉</div>
                    {{fav.text}}
                </div>
            </div>
        </div>
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
