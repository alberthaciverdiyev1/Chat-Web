import { createStore } from 'vuex';
import axios from 'axios';

export default createStore({
    state: {
        isLoggedIn: false,
        user: null,
    },
    mutations: {
        SET_USER(state, user) {
            state.user = user;
            state.isLoggedIn = !!user; 
        },
        LOGOUT(state) {
            state.user = null;
            state.isLoggedIn = false;
        }
    },
    actions: {
        async checkLoginStatus({ commit }) {
            try {
                const response = await axios.get('http://localhost:8080/api/user-info', {
                    withCredentials: true
                });
                commit('SET_USER', response.data);
            } catch (error) {
                console.error("Error checking login status:", error);
                commit('LOGOUT');
            }
        }
    },
});
