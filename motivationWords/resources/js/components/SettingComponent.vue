<template>
    <div>
        <h2>アカウント設定</h2>

        <div class ="setting" >
            <div v-for="user in users" class="setting-container" v-if="user.id === 11">
                        <div class="setting-input">
                            <label for="name">Name</label><br>
                            <input id="name" class="setting-input" :value="user.name">
                        </div>

                        <div class="setting-input">
                            <label for="email">Email</label><br>
                            <input id="email" class="setting-input" :value="user.email">
                        </div>


                        <div class="setting-input">
                            <label for="introduction">Introduction</label><br>
                            <textarea id="introduction" class="setting-input">{{user.introduction}}</textarea>
                        </div>

                        <button @click="Edit">編集する</button>


            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                users: {},
            }
        },
        mounted() {
            console.log('SettingComponent mounted');

            axios.get('/api/setting')
                .then(response=>{
                    this.users = response.data.users;
                })
                .catch(error => {
                    console.log(error)
                });





        },
        methods:{
            Edit:function(){

            }
        },
        name: "SettingComponent",


    }


</script>

<style scoped>

</style>
