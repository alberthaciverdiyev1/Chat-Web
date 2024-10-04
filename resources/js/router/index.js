import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import Auth from '../views/Auth.vue'
import Chat from '../views/Chat.vue'

const routes = [
    { path: '/', component: Home },
    { path: '/auth', component: Auth },
    { path: '/chat', component: Chat },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})


export default router
