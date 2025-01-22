<div x-data="{ modelOpen: false }">
    <main>
        {{ $slot }}
    </main>

    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
         aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div
            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                 aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left font-inclusive transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
            >
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 ">Log in</h1>

                    <button @click="modelOpen = false"
                            class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </button>
                </div>

                <p class="mt-2 text-sm text-gray-500 ">
                    Sign up to save, rate recipes and create your own!
                </p>

                <form class="mt-5">
                    <div>
                        <label for="name"
                               class="block text-sm text-gray-700 capitalize dark:text-gray-200">Name</label>
                        <input placeholder="Gordon Ramsay" type="text"
                               class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:border-red-500 focus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E]">
                    </div>

                    <div class="mt-4">
                        <label for="email"
                               class="block text-sm text-gray-700 capitalize dark:text-gray-200">Email</label>
                        <input placeholder="email@example.app" type="email"
                               class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:border-red-500 focus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E]">
                    </div>

                    <div class="mt-4">
                        <div class="mt-4 space-y-5">
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value=""
                                           class="w-4 h-4 text-[#AE763E] bg-gray-100 border-gray-300 rounded focus:ring-[#AE763E] focus:ring-2 focus:bg-[#AE763E]">
                                    <label for="default-checkbox"
                                           class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                                        me</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="button"
                                class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-gourmania rounded-md hover:gourmania-hover focus:outline-none">
                            Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
