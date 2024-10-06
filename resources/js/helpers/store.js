import { createStore } from 'vuex';
import axios from 'axios';
import Cookies from 'js-cookie';

const store = createStore({
    state: {
        user: Cookies.get('user') ? JSON.parse(Cookies.get('user')) : null,
        token: Cookies.get('token') || null,
        errorMessage: '',
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
            if (user) {
                Cookies.set('user', JSON.stringify(user));
            } else {
                Cookies.remove('user');
            }
        },
        setToken(state, token) {
            state.token = token;
            if (token) {
                // Cookies.set('token', token, { expires: 7, secure: false, sameSite: 'Strict' });
                Cookies.set('token', token);
            } else {
                Cookies.remove('token');
            }
        },
        setError(state, message) {
            state.errorMessage = message;
        },
        clearError(state) {
            state.errorMessage = '';
        },
    },
    actions: {
        async login({ commit }, credentials) {
            return await axios.post('/api/login', credentials)
                .then(async response => {
                    commit('setToken', response.data.token);

                    await axios.get('/api/user-info', {
                        headers: {
                            Authorization: `Bearer ${response.data.token}`
                        }
                    }).then(info => {
                        commit('setUser', info.data);
                        commit('setToken',response.data.token)
                        commit('clearError');
                    });
                })
                .catch(error => {
                    commit('setError', error.response?.data?.message );
                });
        },
        async logout({ commit,state},token) {
            return await axios.post('/api/logout', {}, {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            }).then(response => {
                commit('setUser', null);
                commit('setToken', null);
                commit('clearError');
            });
        },
    },
    getters: {
        isAuthenticated(state) {
            return !!state.user;
        },
        errorMessage(state) {
            return state.errorMessage;
        },
    },
});

export default store;
