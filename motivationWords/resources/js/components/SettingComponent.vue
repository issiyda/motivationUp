<template>
    <div>
        <h2>アカウント設定</h2>

        <div class ="setting" >
            <div class="setting-container">
                        <div class="setting-input">
                            <label for="name">Name</label><br>
                            <div v-if="!isNameEdit" @dblclick="isNameEdit = true">{{user.name}}</div>
                            <input v-else @blur="updateName(user.id , user.name)" id="name" class="setting-input" v-model="user.name">
                        </div>

                        <div class="setting-input">
                            <label for="email">Email</label><br>
                            <div v-if="!isEmailEdit" @dblclick="isEmailEdit = true">{{user.email}}</div>
                            <input v-else @blur="updateEmail(user.id, user.email)" id="email" class="setting-input" v-model="user.email">
                        </div>


                        <div class="setting-input">
                            <label for="introduction">Introduction</label><br>
                            <div class ="introduction" v-if="!isIntroductionEdit" @dblclick="isIntroductionEdit = true">{{user.introduction}}</div>
                            <textarea v-else @blur="updateIntroduction(user.id, user.introduction)" v-model="user.introduction" id="introduction" class="setting-input"></textarea>
                        </div>



            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data:function() {
            return{
                id: this.user.id,
                name:this.user.name,
                email:this.user.email,
                introduction:this.user.introduction,
                isNameEdit: false,
                isEmailEdit: false,
                isIntroductionEdit: false,


            }
        },



        mounted() {
            console.log('SettingComponent mounted');

        },
        methods:{

            updateName : function(id,name){
                axios.patch('http://127.0.0.1:8000/api/setting/' + id,{id : id,
                name : name})
                    .then((response) => {
                        this.isNameEdit = false;
                        console.log(response)
                    }).catch((error) =>{
                        console.log(error)
                })
            },
            updateEmail : function(id,email){
                axios.patch('http://127.0.0.1:8000/api/setting/' + id,{id: id, email : email})
                    .then((response)=>{
                        this.isEmailEdit = false;
                        console.log(response);
                    }).catch((error) =>{
                         console.log(error);
                })
            },
            updateIntroduction : function(id,introduction){
                axios.patch('http://127.0.0.1:8000/api/setting/' + id,{id : id, introduction : introduction})
                    .then((response) => {
                    this.isIntroductionEdit = false;
                    console.log(response)
                }).catch((error) =>{
                    console.log(error);
                })
            },
        },

        name: "SettingComponent",
        props:{
            user:{ type: String,
                   required: true
            }
        }


    }


</script>

<style scoped>
    .introduction{
        border:1px solid #0DCEA8;
        border-radius:3%;
        height:50px;
    }
</style>
