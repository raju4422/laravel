require('./bootstrap');

import {createApp} from 'vue'
import Home from './components/Home'
import About from './components/About'
import Header from './components/Header'
import Footer from './components/Footer'


import router from './index'
import createStore from './store/index'



 createApp({
    components: {
        'header_view':Header,
        'footer_view':Footer

    }
    
    
 }).use(router).use(createStore).mount('#app')
// app.component('home',Home)
// app.component('about',About)
// app.mount('#app')
