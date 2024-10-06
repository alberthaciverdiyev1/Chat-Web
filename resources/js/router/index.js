import { createRouter, createWebHistory } from 'vue-router';
import store from '../helpers/store.js';

import Home from '../views/Home.vue';
import Auth from '../views/Auth.vue';
import Chat from '../views/Chat.vue';

const routes = [
    { path: '/', component: Auth },
    { path: '/auth', component: Auth },
    { path: '/chat', component: Chat },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = store.getters.isAuthenticated;

    if (!isAuthenticated) {
        if (to.path === '/chat') {
            next('/auth');
        } else if (to.path === '/') {
            next('/auth');
        } else {
            next();
        }
    } else {
        if (to.path === '/auth') {
            next('/chat');
        }else if (to.path === '/') {
            next('/chat');
        }  else {
            next();
        }
    }
});

export default router;
