<template>
    <div class="w-2/6 bg-slate-900 overflow-y-auto flex flex-col border-r-2">
        <h2 class="text-2xl font-bold my-4 ml-4 text-slate-200">Contacts</h2>
        <div class="mb-4 mx-4 flex items-center">
            <div class="bg-gray-100 p-1.5 rounded-s-full text-slate-700 ml-2">
                <i class="fa-solid fa-magnifying-glass ml-2"></i>
            </div>
            <input type="text" placeholder="Search..."
                   class="bg-gray-100 rounded-e-full p-1.5 w-full focus:outline-none focus:ring-0"/>
        </div>
        <div
            class="space-y-1 flex-grow overflow-y-scroll overflow-x-hidden scrollbar-thin scrollbar-thumb-slate-900 scrollbar-track-slate-700">
            <div v-if="users.length"
                 class="flex items-start space-x-3 p-2 ml-3 border-b border-gray-500 hover:bg-slate-800 cursor-pointer"
                 v-for="user in users" :key="user.id" @click="selectUser(user.id)">
                <img :alt="user.username"
                     :src="user.profile_image ||  'https://i0.wp.com/digitalhealthskills.com/wp-content/uploads/2022/11/3da39-no-user-image-icon-27.png?fit=500%2C500&ssl=1'"
                     class="w-12 h-12 rounded-full object-cover">
                <div class="flex justify-between w-full">
                    <div>
                        <p class="font-semibold text-slate-200">{{ user.username }}</p>
                        <p class="text-slate-200 text-sm">{{ user.message }}</p>
                    </div>
                    <div class="flex items-end">
                        <div>
                            <p v-if="user.unread_message_count"
                               class="ml-2 w-6 h-6 bg-green-600 rounded-full flex items-center justify-center text-center">
                                {{ user.unread_message_count }}</p>
                            <span class="text-slate-200 text-sm mr-2">{{ user.date }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-slate-700 p-4">
            <div class="flex items-center">
                <img src="https://i.pinimg.com/originals/53/07/59/5307599404edce686a0ec64c9d1a1828.jpg"
                     class="w-12 h-12 rounded-full object-cover">
                <p class="text-slate-200 text-xl pl-3">{{ username }}</p>
                <div class="ml-auto">
                    <button @click="logout" class="text-slate-200 hover:text-slate-200 mr-4">
                        <i class="fa-solid fa-right-from-bracket"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from "@/helpers/store.js";
import Cookies from "js-cookie";

export default {

    data() {
        return {
            username: '',
            user_id: '',
            users: [],
            messages: []
        }
    },
    methods: {
        async getUsers() {
            try {
                const response = await axios.get('/api/get-user-with-messages');
                this.users = response.data;
                console.log(this.users)
            } catch (error) {
                console.error(error.message);
            }
        },
        selectUser(id) {
            this.$emit('SelectedUserId', id);
        },
        async logout() {
            try {
                await this.$store.dispatch('logout', this.$store.state.token);
                this.$router.push('/auth');
            } catch (error) {
                console.error('Logout failed:', error.message);
            }
        }
    },
    mounted() {
        this.getUsers();
        this.username = store.state.user.username;
        this.user_id = store.state.user.user_id
    }
}
</script>

