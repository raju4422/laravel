require('./bootstrap');

import {createApp} from 'vue'
import Home from './components/Home'
import About from './components/About'
import Header from './components/Header'
import Footer from './components/Footer'
import SideNav from './components/SideNav'
import Body from './components/Body'
import ScreenManageView from './components/ScreenManageView'

import router from './index'
import createStore from './store/index'




 createApp({
    
    components: {
        
        // 'header_view':Header,
        // 'footer_view':Footer,
        // 'side_nav':SideNav,
        // 'body_view':Body,
       'screen': ScreenManageView


    }
    
    
 }).use(router).use(createStore).mount('#app')

