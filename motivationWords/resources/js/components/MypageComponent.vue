<template>
    <div>
        <h2>Mypage</h2>
        <h3>Myモチベ</h3>
        <div  class ="post post-container">
            <div v-for="post in posts" class="post-card">
                <div class="post-title">タイトル:{{post.title}}</div>
                <div class="post-text">言葉:{{post.text}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){
          console.log('MypageComponent mounted');

          axios.get('/api/mypage')
              .then(response=>{
                  this.posts = response.data.posts;
              })
              .catch(error => {
                  console.log(error)
              });
        },
        name: "MypageComponent",
        props: ['posts'],

    }
</script>

<style scoped>
    .post{
        display:flex;
        justify-content:space-around;

    }

    .post-card{
        width:35%;
    }
</style>
