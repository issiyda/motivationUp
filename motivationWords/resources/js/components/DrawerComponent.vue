<template>
    <div id="drawer" class ="off">
        <h3 class ="side_menu">さいどめにゅー</h3>

        <div class="drawer-container">
                    <ul>
                        <li><a href="/">Top</a></li>
                        <li><router-link to ="/mypage">Mypage</router-link></li>
                        <li><router-link to ="/post">Post</router-link></li>
                        <li><router-link to="/setting">Setting</router-link></li>
                    </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DrawerMenuComponent"
    }


    $(function(){
        $('#drawer').on('click',function(){
            if($('#drawer').hasClass('off')){
                $('#drawer').removeClass('off');
                $(this).animate({'marginRight' : '20%'},300).addClass('on');
                $('#overlay').fadeIn();
                $(".side_menu").hide().fadeIn(1500);
            }else{
                $('#drawer').addClass('off');
                $(this).animate({'marginRight' : '0px'},300);
                $('#overlay').fadeOut();
                $(".side_menu").fadeOut(300);

            }
        });
    });
</script>

<style scoped>

    .side_menu{
        display:none;
        padding:7%;
        text-align:center;
        transform: rotate(-10deg);
    }

    #drawer{
        border:1px solid #fff;
        border-radius: 3%;
        z-index: 99;
        cursor: pointer;
        top: 15%;
        right: -20%;
        background: #0DCEA8;
        width: 25%;
        color: #fff;
        font-size: 16px;
        height:90%;
        position: fixed;
    }

    .drawer-container{
        display:flex;
        height:80%;
        margin:auto;
    }

    .drawer-container ul{
        display:flex;
        flex-direction:column;
        height:100%;
        justify-content: space-around;
        margin:auto;
    }

    li{
        margin-bottom:3%;
        font-size:30px;
    }

    .drawer-container a{
        text-decoration:none;
    }

    a{
        color:ghostwhite;

        display:inline-block;
        position:relative;
        text-decoration:none;

    }

    a::after{
        position:absolute;
        bottom:-2px;
        left:0;
        content: "";
        width: 100%;
        height:2px;
        background:white;
        transform: scale(0, 1);
        transform-origin: right top;
        transition: transform .3s;
    }


    a:hover::after{
        transform-origin: left top;
        transform: scale(1,1);
    }

</style>
