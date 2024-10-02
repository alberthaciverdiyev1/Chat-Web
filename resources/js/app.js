import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router'

import Home from './pages/Home.vue';
import Auth from './pages/Auth.vue';
import Chat from './pages/Chat.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/auth', component: Auth },
    { path: '/chat', component: Chat }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

import App from './layouts/App.vue'
createApp(App).use(router).mount("#app");
