<template>
    <div class="w-4/6 flex flex-col">
        <div class="bg-slate-900 text-slate-200 p-2 flex justify-between items-center">
            <div class="flex items-center ml-1">
                <img
                    src="https://sun1-22.userapi.com/s/v1/if1/rO3RLEMwWjXk-_yY5ehohnRpXktsBajehQIW5zN0-fU04tdQz5H40xiwY2dBiN2shkqMOvvi.jpg?size=400x400&quality=96&crop=405,1,1108,1108&ava=1"
                    class="w-12 h-12 rounded-full object-cover" alt="User Avatar">
                <div class="ml-2 mb-1">
                    <p v-if="messages.length > 0" class="text-lg font-semibold">{{ messages[0].default_receiver_name }}</p>
                    <p class="text-slate-400 text-xs">Salam necesen</p>
                </div>
            </div>
        </div>

        <div
            ref="messageContainer"
            class="flex-grow p-4 overflow-y-scroll overflow-x-hidden scrollbar-thin scrollbar-thumb-slate-900 scrollbar-track-slate-700 bg-slate-200">
            <div class="mb-4" v-if="messages.length > 0" v-for="(message, index) in messages" :key="index">
                <div v-if="message.default_receiver_id === message.receiver_id && message.message" class="text-right mt-2">
                    <div class="bg-gray-100 text-gray-800 p-3 rounded-lg shadow-md inline-block max-w-xs">
                        <h1 class="text-base">{{ message.message }}</h1>
                    </div>
                </div>
                <div v-else-if="message.message" class="bg-slate-800 p-3 rounded-lg inline-block shadow-md max-w-xs">
                    <h1 class="text-base text-slate-200">{{ message.message }}</h1>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="bg-slate-200 p-4 flex items-center border-gray-500">
            <div class="relative flex-grow">
                <input
                    type="text"
                    v-model="messageBody"
                    placeholder="Write something and send..."
                    @keyup.enter="sendMessage"
                    class="w-full p-3 rounded-full border border-gray-500 focus:outline-none focus:ring-2 focus:ring-slate-500"
                />
                <button @click="sendMessage" class="absolute right-4 mt-3 mr-1 text-slate-700">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { io } from 'socket.io-client';

export default {
    props: {
        messages: {
            type: Array,
            default: () => []
        },
    },
    data() {
        return {
            messageBody: '',
            socket: null,
        };
    },
    methods: {
        sendMessage() {
            if (this.messageBody.trim() === '') return;

            const token = this.$store.state.token;
            console.log(token)
            this.socket.emit('send_message', {
                message: this.messageBody,
                receiver_id: this.messages[0].default_receiver_id,
                sender_id:this.$store.state.user.id

            },token);


            this.messageBody = '';
            // this.scrollToBottom();
        },
        // scrollToBottom() {
        //     const container = this.$refs.messageContainer;
        //     container.scrollTop = container.scrollHeight;
        // }
    },
    mounted() {
        if (!this.socket) {
            this.socket = io('http://localhost:3000');
            this.socket.on('receive_message', (data) => {
                console.log({data});
                this.messages.push({
                    message: data.message,
                    receiver_id: data.receiver_id,
                    default_receiver_id: this.messages[0].default_receiver_id,
                    sender_id: data.sender_id
                });
            });
        }
        // this.$nextTick(() => {
        //     this.scrollToBottom();
        // });
    },
    beforeDestroy() {
        if (this.socket) {
            this.socket.disconnect();
        }
    }
}
</script>
