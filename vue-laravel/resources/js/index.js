import { createRouter, createWebHistory } from 'vue-router'

import About from './components/About.vue'
import Home from './components/Home.vue'
import Contact from './components/Contact.vue'
import Edit from './components/Edit.vue'
import Profile from './components/Profile.vue'
import EditProfile from './components/EditProfile.vue'

import Login from './components/Login.vue'
import ScreenManageView from './components/ScreenManageView.vue'





const routes = [
    {
        path: '/dashboard',
        name: 'dashboard',
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
        path: '/edit',
        name: 'edit',
        component: Edit
    },

    {
        path: '/profile',
        name: 'profile',
        component: Profile
    },

    
    {
        path: '/edit-profile',
        name: 'editProfile',
        component: EditProfile
    },
    
    {
        path: '/',
        name: 'dashboard',
        component: Home
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})
export default router

