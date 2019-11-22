<template>
    <div>
        <h1>投稿ぺーじ</h1>
        <div class="form form-container">
            <form action="">
                <div class="input">
                    <div class="input-title-container">
                        <label for="input-title">タイトル</label>
                        <input v-model="title" type="text" id="input-title" class ="input-title" placeholder="タイトル">
                    </div>
                    <div class="input-text-container">

                        <label for="input-text">テキスト</label>
                        <textarea v-model="text" name="text" id="input-text" class ="input-text" cols="30" rows="10"
                                  placeholder="あなたのモチベを上げる言葉を入力してください"></textarea>
                    </div>

                </div>
            </form>

            <div class ="output">
                <h3>入力内容</h3>
                <div class="output-title">
                    <label for="title">題名

                    </label>
                         <p id="output-title">{{title}}</p>
                </div>
                <div class="output-content">
                    <label for="text">内容

                    </label>
                       <p id="output-text">{{text}}</p>
                </div>
            </div>

            <button @click="">送信！！</button>

            <li v-for="user in users">{{user}}</li>

        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                title: "",
                text: "",
                users:[]

            }
        },
        methods:{
            postArticle(){
                var article = {
                    "title" : this.title,
                    "text" : this.text,
                }
            }

        },
        mounted() {
            console.log('PostComponent mounted.')
            axios.get('users').then(response => this.users = response.data)
        },
        name: "PostComponent"
    }
</script>

<style scoped>

</style>
