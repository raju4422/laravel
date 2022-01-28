require('./bootstrap');

import {createApp} from 'vue'
import Home from './components/Home'
import About from './components/About'
import router from './index'



 createApp({
    components: {
        Home,About
    }
 }).use(router).mount('#app')
// app.component('home',Home)
// app.component('about',About)
// app.mount('#app')
