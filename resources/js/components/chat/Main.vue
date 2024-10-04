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
                <button class="text-slate-200 mr-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l2-2m0 0l5-5 5 5m-5-5v12" />
                    </svg>
                </button>
            </div>

            <!-- Chat Messages -->
            <div class="flex-grow p-4 overflow-y-auto bg-slate-200">
                <div class="mb-4">
                    <div class="bg-slate-800 p-3 rounded-lg shadow-md max-w-xs">
                        <h1 class="text-base text-slate-200">Salam Necesen?</h1>
                    </div>
                    <div class="text-right mt-2">
                        <div class="bg-gray-100 text-gray-800 p-3 rounded-lg shadow-md inline-block max-w-xs">
                            <h1 class="text-base">Salam Yaxsiyam. Sen Necesen?</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Area -->
            <div class="bg-slate-200 p-4 flex items-center border-gray-500">
                <div class="relative flex-grow">
                    <input type="text" placeholder="Write something and send..."
                        class="w-full p-3 rounded-full border border-gray-500 focus:outline-none focus:ring-2 focus:ring-slate-500" />
                    <button class="absolute right-4 top-1/2 text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
</template>