import { createRouter, createWebHistory } from 'vue-router'

import About from './components/About.vue'
import Home from './components/Home.vue'
import Contact from './components/Contact.vue'
import Edit from './components/Edit.vue'
import Login from './components/Login.vue'




const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
    {
        path: '/edit/:id',
        name: 'edit',
        component: Edit
    },
    
    {
        path: '/login',
        name: 'login',
        component: Login
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})
export default router

