import Router from 'vue-router';
import Mypage from './components/MypageComponent';
import Post from './components/PostComponent';
import Setting from "./components/SettingComponent";

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
        },
        {
            name: 'setting',
            path: '/setting',
            component: Setting
        }
    ]

});
