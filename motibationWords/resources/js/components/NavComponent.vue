<template>
    <div class ="nav-item">
        <nav class ="navbar">
          <ul>
              <li><a href="/">Top</a></li>
              <li><a href="/mypage">Mypage</a></li>
              <li><a href="/post">Post</a></li>
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

<style>
    ul {
        display:flex;
        flex-direction: row;
        justify-content: space-between;
        list-style: none;
        width:80%;
    }
    a{
        text-decoration:none;
        color:black;
        font-weight:bold;
    }
    .nav-item{
        display: table-cell;
        width:70%;
        vertical-align:middle;
    }
    li a{
        background: #00cc66;
        padding:5%;

    }




</style>
