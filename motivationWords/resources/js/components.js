import Vue from 'vue'

    Vue.component('nav-component', require('./components/NavComponent.vue').default);
    Vue.component('footer-component', require('./components/FooterComponent.vue').default);
    Vue.component('drawer-component', require('./components/DrawerComponent.vue').default);
    Vue.component('allpost-component',require('./components/allPostComponent').default);
    Vue.component('mypost-component',require('./components/MyPostComponent').default);
    Vue.component('favpost-component',require('./components/FavPostComponent').default);
