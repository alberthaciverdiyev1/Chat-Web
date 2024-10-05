<template>
    <div class="w-4/6 flex flex-col">
        <!-- Header -->
        <div class="bg-slate-900 text-slate-200 p-2 flex justify-between items-center">
            <div class="flex items-center ml-1">
                <img src="https://sun1-22.userapi.com/s/v1/if1/rO3RLEMwWjXk-_yY5ehohnRpXktsBajehQIW5zN0-fU04tdQz5H40xiwY2dBiN2shkqMOvvi.jpg?size=400x400&quality=96&crop=405,1,1108,1108&ava=1"
                    class="w-12 h-12 rounded-full object-cover" alt="">
                <div class="ml-2 mb-1">
                    <p class="text-lg font-semibold">Albert</p>
                    <p class="text-slate-400 text-xs">Salam necesen</p>
                </div>
            </div>
        </div>

        <!-- Chat Messages -->
        <div class="flex-grow p-4 overflow-y-scroll overflow-x-hidden scrollbar-thin scrollbar-thumb-slate-900 scrollbar-track-slate-700 bg-slate-200 ">
            <!-- <div class="mb-4">
                <div class="bg-slate-800 p-3 rounded-lg shadow-md max-w-xs">
                    <h1 class="text-base text-slate-200">Salam Necesen?</h1>
                </div>
                <div class="text-right mt-2">
                    <div class="bg-gray-100 text-gray-800 p-3 rounded-lg shadow-md inline-block max-w-xs">
                        <h1 class="text-base">Salam Yaxsiyam. Sen Necesen?</h1>
                    </div>
                </div>
            </div> -->

            <div class="mb-4" v-for="(message, index) in messages" :key="index">
            <div v-if="message.from === 'me'" class="text-right mt-2">
                <div class="bg-gray-100 text-gray-800 p-3 rounded-lg shadow-md inline-block max-w-xs">
                    <h1 class="text-base">{{ message.text }}</h1>
                </div>
            </div>
            <div v-else class="bg-slate-800 p-3 rounded-lg shadow-md max-w-xs">
                <h1 class="text-base text-slate-200">{{ message.text }}</h1>
            </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="bg-slate-200 p-4 flex items-center border-gray-500">
            <div class="relative flex-grow">
                <input type="text" v-model="messageBody" placeholder="Write something and send..."
                    class="w-full p-3 rounded-full border border-gray-500 focus:outline-none focus:ring-2 focus:ring-slate-500" />
                <button @click="sendMessage()" class="absolute right-4 mt-3 mr-1 text-slate-700">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            messageBody: '', 
            messages: []
        };
    },
    methods: {
        sendMessage() {
            if (this.messageBody.trim() === '') return;

            this.messages.push({
                text: this.messageBody,
                from: 'me' 
            });
            this.messages.push({
                text: this.messageBody,
                from: 'others' 
            });
            this.messageBody = '';
        }
    }
}


</script>