<template>
    <div class="flex items-center justify-center min-h-screen bg-slate-900">
        <div class="bg-slate-700 p-8 rounded-lg shadow-md w-full max-w-sm" :class="{ hidden: !loginCard }">
            <h1 class="text-2xl font-semibold text-gray-200 mb-6 text-center">Login</h1>
            <div>
                <label for="login-username" class="block text-sm font-medium text-gray-200 mb-1">Username</label>
                <input id="login-username" type="text" v-model="loginData.username"
                       class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400"
                       placeholder="Enter your username">
                <br class="my-4">
                <label for="login-password" class="block text-sm font-medium text-gray-200 mb-1">Password</label>
                <input id="login-password" type="password" v-model="loginData.password"
                       class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400"
                       placeholder="Enter your password">
                <div class="flex items-center mt-4">
                    <input type="checkbox" id="remember-me" v-model="loginData.rememberMe" class="mr-2">
                    <label for="remember-me" class="text-sm text-gray-200">Remember me</label>
                </div>
                <button type="button" @click="login"
                        class="mt-4 w-full bg-slate-900 text-gray-200 p-2 rounded-md hover:bg-slate-800 transition">
                    Login
                </button>
                <div class="mt-4 text-center">
                    <span @click="openRegisterCard"
                          class="text-gray-200 text-sm hover:underline cursor-pointer">Register now</span>
                </div>
            </div>
        </div>

        <div class="ml-8 bg-slate-700 p-8 rounded-lg shadow-md w-full max-w-sm" :class="{ hidden: !registerCard }">
            <h1 class="text-2xl font-semibold text-gray-200 mb-6 text-center">Register</h1>
            <div>
                <label for="register-username" class="block text-sm font-medium text-gray-200 mb-1">Username</label>
                <input id="register-username" type="text" v-model="registerData.username"
                       class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400 mb-3"
                       placeholder="Enter your username">
                <label for="register-email" class="block text-sm font-medium text-gray-200 mb-1">Username</label>
                <input id="register-email" type="email" v-model="registerData.email"
                       class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400 mb-3"
                       placeholder="Enter your email">
                <label for="register-password" class="block text-sm font-medium text-gray-200 mb-1">Password</label>
                <input id="register-password" type="password" v-model="registerData.password"
                       class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400 mb-3"
                       placeholder="Enter your password">
                <label for="confirm-password" class="block text-sm font-medium text-gray-200 mb-1">Confirm
                    Password</label>
                <input id="confirm-password" type="password" v-model="registerData.confirmPassword"
                       class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400 mb-3"
                       placeholder="Confirm your password">
                <button type="button" @click="register"
                        class="mt-4 w-full bg-slate-900 text-gray-200 p-2 rounded-md hover:bg-slate-800 transition">
                    Register
                </button>
                <div class="mt-4 text-center">
                    <span @click="openLoginCard"
                          class="text-gray-200 text-sm hover:underline cursor-pointer">Login now</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';

export default {
    data() {
        return {
            loginCard: true,
            registerCard: false,
            loginData: {
                username: '',
                password: '',
                rememberMe: '',
            },
            registerData: {
                username: '',
                password: '',
                confirmPassword: '',
                email: '',
            }
        };
    },
    computed: {
        ...mapGetters(['errorMessage']),
    },
    methods: {
        ...mapActions(['login']),
        openLoginCard() {
            this.loginCard = true;
            this.registerCard = false;
        },
        openRegisterCard() {
            this.loginCard = false;
            this.registerCard = true;
        },
        async register() {
            try {
                const response = await axios.post('/api/register', this.registerData);
                console.log(response.data);
            } catch (error) {
                console.error('Registration failed:', error.response.data);
            }
        },
        async login() {
           await this.$store.dispatch('login', this.loginData);
            this.$router.push('/chat');
        },
    },
};
</script>
