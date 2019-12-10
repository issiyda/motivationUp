<template>
    <div  class ="post post-container">
        <div v-for="(post ,index)  in favPosts " class="post-card" :style="{background: myColor}" :post="post" :key="post.id" :index="index">
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
                <div v-if="!isTextEdit" @click="inputText(post.id)">{{post.text}}</div>
                <textarea ref="text" v-else @blur="textEdit(post.id,post.text)" name="" id="" cols="30" rows="10" :key="post.id" v-model="post.text"></textarea>
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
                favPosts:[],
                heartActive: false,
                myColor: this.color

            }
        },
        methods: {

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
            }
        },

        mounted() {
            console.log('FavPostComponent mounted');

            axios.get('/api/mypage')
                .then(response => {
                    this.favPosts = response.data.favPosts;


                })
                .catch(error => {
                    console.log(error)
                });
        },
        name: "favPostComponent",
        props: {
            posts: {
                type: Object, required: true
            },
            userPosts: {
                type: Object, required: true
            },
            color: {
                type: Object, required: true
            }
        }

    }
</script>

<style scoped>
    .heart{
        color:red;
    }
</style>
