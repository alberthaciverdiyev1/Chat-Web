import './bootstrap';
import '../assets/css/tailwind.css';
import { createApp } from 'vue';
import router from './router/index.js';
import store from './helpers/store.js';
import App from './App.vue';

createApp(App)
    .use(router)
    .use(store)
    .mount('#app'); 
