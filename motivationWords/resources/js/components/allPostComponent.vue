
<template>
    <div  class ="post post-container">
        <div v-for="(post ,index)  in allPosts" :class="{'post-card':true}" :style="{background: myColor}" :post="post" :key="post.id" :index="index">
            <div class="post-container">
                <div class="post-container-title">
                    <div>タイトル</div>
                    <div v-if="!isTitleEdit" @click="inputTitle(post)">{{post.title}}</div>
                    <input type="text" ref="focus" @blur="titleEdit(post.id,post.title)"  v-else :key="post.id" v-model="post.title">
                </div>
                <div class ="post-container-icon fav-icon">
                    <i :class="{'fas':true, 'fa-heart':true, 'fa-2x':true , 'heart': post.heartActive}" @click="favSwitch(post.id)"></i>
                </div>
            </div>

            <div class="post-main">
                <div>言葉</div>
                <div class ="post-main-title" v-if="!isTextEdit" @click="inputText(post.id)">{{post.text}}</div>
                <textarea class ="post-main-title" ref="text" v-else @blur="textEdit(post.id,post.text)" name="" id="" cols="30" rows="10" :key="post.id" v-model="post.text"></textarea>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data: function(){
            return{
                isTitleEdit: false,
                isTextEdit: false,
                allPosts:[],
                heartActive: false,
                myColor: this.color

            }
        },


            /**
             * Title編集のメソッド
             *
             * @param id
             * @param title
             */
            titleEdit(id, title) {

                axios.patch('api/titleEdit/' + id, {id: id, title: title})
                    .then(response => {
                        this.isTitleEdit = false;
                        console.log(response);
                    }).catch((error) => {
                    console.log(error)
                });
            },

            /**
             * Text変数のメソッド
             *
             * @param id
             * @param text
             */
            textEdit(id,text){

                axios.patch('api/textEdit/' +id, {id : id , text: text})
                    .then(response =>{
                        this.isTextEdit = false;
                        console.log(response);
                    }).catch((error) => {
                    console.log(error);
                })
            },

            /**
             * インプット切り替え（タイトル）
             *
             * @param post
             */
            inputTitle(post){
                this.isTitleEdit = true;
                this.$nextTick(()=>
                {
                    this.$refs.text.focus();
                });
                console.log('Title focus!!');
            },

            /**
             * インプット切り替え（テキスト）
             *
             * @param post
             */
            inputText(post){
                this.isTextEdit = true;
                this.$nextTick(()=>
                {
                    this.$refs.post.focus()
                });
                console.log('Title focus!!');

            },

            // axios.patch('api/textEdit/' +id, {id : id , text: text})
            //     .then(response =>{
            //         this.isTextEdit = false;
            //         console.log(response);
            //     }).catch(error) => {
            //         console.log(error);
            //     })

            favSwitch(id){

                axios.patch('/api/favSwitch/' +id,id)
                    .then(response =>{
                        console.log(response.data);
                    }).catch((error) => {

                    console.log(error.response);

                });
        },

        created() {

        },
        props: {
            'color': {
                type: String,
                required: true
            }
        },


        mounted() {

            axios.get('/api/mypage')
                .then(response => {
                    this.allPosts = response.data.allPosts;
                    this.myColor = response.data.themeColor.color;
                    this.favState = response.data.a



                })
                .catch(error => {
                    console.log(error)
                });

            console.log('allPostComponent mounted');
            this.colorSet();
            console.log('created finished');
            console.log('theme color setting');

        },
        name: "allPostComponent",





    }

</script>

<style scoped>
    .heart{
        color:red;
    }
</style>
