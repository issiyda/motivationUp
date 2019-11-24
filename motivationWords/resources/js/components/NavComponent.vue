<template>
    <div class ="nav-item">
        <nav class ="navbar">
          <ul>
              <li><a href="/">Top</a></li>
              <li><router-link to ="/mypage">Mypage</router-link></li>
              <li><router-link to ="/post">Post</router-link></li>
          </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }



</script>

<style scoped>

    .navbar{
        align-items:center;
        display: flex;
    }
    ul {

        display:flex;
        height:100%;
        justify-content: space-between;
        list-style: none;
        margin-bottom:0;
        width:100%;
    }
    a{
        color:deepskyblue;

        display:inline-block;
        position:relative;
        text-decoration:none;

    }

    a::after{
        position:absolute;
        bottom:-4px;
        left:0;
        content: "";
        width: 100%;
        height:2px;
        background:#0DCEA8;
        transform: scale(0, 1);
        transform-origin: right top;
        transition: transform .3s;
    }


    a:hover::after{
        transform-origin: left top;
        transform: scale(1,1);
      }

    .nav-item{
        display: table-cell;
        width:70%;
        vertical-align:middle;
    }
    li a{
        font-size:20px;
        padding:5%;

    }




</style>
