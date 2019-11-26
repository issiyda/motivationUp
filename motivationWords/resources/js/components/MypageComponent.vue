<template>
    <div class ="mypage">
        <h2>Mypage</h2>
        <h3>Myモチベ</h3>
        <div  class ="post post-container">
            <div v-for="post in posts" class="post-card">
                    <div class="post-container">
                        <div class="post-container-title">
                            <div>タイトル</div>
                            {{post.title}}
                        </div>
                        <div class ="post-container-icon fav-icon">
                        <i class="fas fa-heart fa-2x"></i>
                        </div>
                    </div>

                <div class="post-main">
                    <div>言葉</div>
                    {{post.text}}
                </div>
            </div>
        </div>

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

</style>
