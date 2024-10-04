<template>
    <div class="flex h-screen">
        <!-- Left Sidebar (Contacts) -->
        <div class="w-2/6 bg-slate-800  overflow-y-auto flex flex-col border-r-2">
            <h2 class="text-2xl font-bold my-4 ml-3 text-gray-200">Contacts</h2>
            <div class="mb-4 mx-4 flex items-center">
                <div class="bg-gray-100 p-1.5 rounded-s-full text-red-700 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <input type="text" placeholder="Search..." class="bg-gray-100 rounded-e-full p-1.5 w-full focus:outline-none focus:ring-0" />
            </div>
            <div class="space-y-1 flex-grow">
                <!-- Contact 1 -->
                <div
                    class="flex items-start space-x-3 p-2 ml-3 border-b border-gray-500 hover:bg-slate-900 cursor-pointer">
                    <img src="https://content.foto.my.mail.ru/mail/380678608040/_myphoto/i-1.jpg" alt="Albert"
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-gray-200">Albert</p>
                        <p class="text-gray-200 text-sm">Salam necesen</p>
                    </div>
                </div>
                <div
                    class="flex items-start space-x-3 p-2 ml-3 border-b border-gray-500 hover:bg-slate-900 cursor-pointer">
                    <img src="https://content.foto.my.mail.ru/mail/380678608040/_myphoto/i-1.jpg" alt="Albert"
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-gray-200">Albert</p>
                        <p class="text-gray-200 text-sm">Salam necesen</p>
                    </div>
                </div>
                <div
                    class="flex items-start space-x-3 p-2 ml-3 border-b border-gray-500 hover:bg-slate-900 cursor-pointer">
                    <img src="https://content.foto.my.mail.ru/mail/380678608040/_myphoto/i-1.jpg" alt="Albert"
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-gray-200">Albert</p>
                        <p class="text-gray-200 text-sm">Salam necesen</p>
                    </div>
                </div>
                <div
                    class="flex items-start space-x-3 p-2 ml-3 border-b border-gray-500 hover:bg-slate-900 cursor-pointer">
                    <img src="https://content.foto.my.mail.ru/mail/380678608040/_myphoto/i-1.jpg" alt="Albert"
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-gray-200">Albert</p>
                        <p class="text-gray-200 text-sm">Salam necesen</p>
                    </div>
                </div>
                <div
                    class="flex items-start space-x-3 p-2 ml-3 border-b border-gray-500 hover:bg-slate-900 cursor-pointer">
                    <img src="https://content.foto.my.mail.ru/mail/380678608040/_myphoto/i-1.jpg" alt="Albert"
                        class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-gray-200">Albert</p>
                        <p class="text-gray-200 text-sm">Salam necesen</p>
                    </div>
                </div>
            </div>
            <div class="bg-slate-700 p-4">
                <div class="flex items-center">
                    <img src="https://i.pinimg.com/originals/53/07/59/5307599404edce686a0ec64c9d1a1828.jpg"
                        class="w-12 h-12 rounded-full object-cover">
                    <p class="text-gray-200 text-xl pl-3">Albert</p>

                    <!-- SS Button, Right Aligned -->
                    <div class="ml-auto">
                        <button class="text-gray-200 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.25 2.25a.75.75 0 011.5 0v2.481a8.723 8.723 0 013.226 1.33l1.751-1.75a.75.75 0 011.061 1.06l-1.75 1.751a8.723 8.723 0 011.33 3.226h2.481a.75.75 0 010 1.5h-2.481a8.724 8.724 0 01-1.33 3.226l1.75 1.751a.75.75 0 01-1.06 1.061l-1.752-1.75a8.724 8.724 0 01-3.226 1.33v2.481a.75.75 0 01-1.5 0v-2.481a8.724 8.724 0 01-3.226-1.33l-1.751 1.75a.75.75 0 01-1.061-1.06l1.75-1.751a8.723 8.723 0 01-1.33-3.226H2.25a.75.75 0 010-1.5h2.481a8.723 8.723 0 011.33-3.226l-1.75-1.751a.75.75 0 011.06-1.061l1.752 1.75a8.723 8.723 0 013.226-1.33V2.25z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Chat Section -->
        <div class="w-4/6 flex flex-col">
            <!-- Header -->
            <div class="bg-slate-800 text-white p-4 flex justify-between items-center">
                <p class="text-lg font-bold">Albert</p>
                <button class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l2-2m0 0l5-5 5 5m-5-5v12" />
                    </svg>
                </button>
            </div>

            <!-- Chat Messages -->
            <div class="flex-grow p-4 overflow-y-auto bg-slate-200">
                <div class="mb-4">
                    <div class="bg-slate-700 p-3 rounded-lg shadow-md max-w-xs">
                        <h1 class="text-base text-gray-200">Salam Necesen?</h1>
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
    </div>
</template>
