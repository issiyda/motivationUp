<template>
    <div id="drawer" class ="off">
        <div class="drawer-container">
                    <ul>
                        <li><a href="/">Top</a></li>
                        <li><router-link to ="/mypage">Mypage</router-link></li>
                        <li><router-link to ="/post">Post</router-link></li>
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
                $(this).animate({'marginRight' : '80px'},300).addClass('on');
            }else{
                $('#drawer').addClass('off');
                $(this).animate({'marginRight' : '0px'},300)
            }
        });
    });
</script>

<style scoped>
    #drawer{
        border-radius: 3%;
        z-index: 99;
        cursor: pointer;
        position: fixed;
        top: 15%;
        right: -80px;
        background: #0DCEA8;
        width: 140px;
        color: #fff;
        font-size: 16px;
        height:20%;
        }

    .drawer-container{
        display:flex;
        height:100%;
        margin:auto;
    }

    .drawer-container ul{
        display:flex;
        flex-direction:column;
        margin:auto;
    }

    li{
        margin-bottom:3%;
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
