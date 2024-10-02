<template>
    <div class="flex items-center justify-center min-h-screen bg-slate-200">
        <div class="bg-slate-500 p-8 rounded-lg shadow-md w-full max-w-sm" :class="{ hidden: !loginCard }">
            <h1 class="text-2xl font-semibold text-white mb-6 text-center">Login</h1>
            <div>
                <label for="login-username" class="block text-sm font-medium text-white mb-1">Username</label>
                <input id="login-username" type="text"
                    class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400"
                    placeholder="Enter your username">
                <br class="my-4">
                <label for="login-password" class="block text-sm font-medium text-white mb-1">Password</label>
                <input id="login-password" type="password"
                    class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400"
                    placeholder="Enter your password">
                <div class="flex items-center mt-4">
                    <input type="checkbox" id="remember-me" class="mr-2">
                    <label for="remember-me" class="text-sm text-white">Remember me</label>
                </div>
                <button type="button"
                    class="mt-4 w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-500 transition">Login</button>
                <div class="mt-4 text-center">
                    <span @click="openRegisterCard" class="text-white text-sm hover:underline cursor-pointer">Register
                        now</span>
                </div>
            </div>
        </div>

        <div class="ml-8 bg-slate-500 p-8 rounded-lg shadow-md w-full max-w-sm" :class="{ hidden: !registerCard }">
            <h1 class="text-2xl font-semibold text-white mb-6 text-center">Register</h1>
            <div>
                <label for="register-username" class="block text-sm font-medium text-white mb-1">Username</label>
                <input id="register-username" type="text" name="username"
                    class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400"
                    placeholder="Enter your username">
                <label for="register-password" class="block text-sm font-medium text-white mb-1">Password</label>
                <input id="register-password" type="password" name="password"
                    class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400"
                    placeholder="Enter your password">
                <label for="confirm-password" class="block text-sm font-medium text-white mb-1">Confirm Password</label>
                <input id="confirm-password" type="password" name="confirm-password"
                    class="block w-full p-2 border border-slate-300 rounded-md focus:outline-none focus:ring focus:ring-slate-400"
                    placeholder="Confirm your password">
                <button type="button"
                    class="mt-4 w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-500 transition"
                    @click="openRegisterCard">Register</button>
                <div class="mt-4 text-center">
                    <span @click="openLoginCard" class="text-white text-sm hover:underline cursor-pointer">Login now</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loginCard: true,
            registerCard: false
        };
    },
    methods: {
        openLoginCard() {
            this.loginCard = true;
            this.registerCard = false;
        },
        openRegisterCard() {
            this.loginCard = false;
            this.registerCard = true;        }
    }
}
</script>
