import {createRouter, createWebHistory} from 'vue-router';

import Home from '../views/Home.vue';
import Auth from '../views/Auth.vue';
import Chat from '../views/Chat.vue';

const routes = [
    {path: '/', component: Home},
    {path: '/auth', component: Auth},
    {path: '/chat', component: Chat},
];

const isAuthenticated = () => {
    return !!localStorage.getItem('token');
};

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    if (to.path === '/chat' && !isAuthenticated()) {
        next('/auth');
    } else if (!isAuthenticated() && to.path !== '/auth') {
        next('/auth');
    } else if (isAuthenticated() && to.path === '/auth') {
        next('/chat');
    } else {
        next();
    }
});

export default router;
