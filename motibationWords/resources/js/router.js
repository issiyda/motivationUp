import Router from 'vue-router';
import Mypage from './components/MypageComponent';
import Post from './components/PostComponent';

export default new Router({

    mode:'history',
    routes:[
        {

            name:'mypage',
            path: '/mypage',
            component: Mypage

        },
        {

            name:'post',
            path: '/post',
            component: Post
        }
    ]

});
