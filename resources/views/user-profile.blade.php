<x-layout>
    <div class="bg-gray-100 font-inclusive">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 px-4">
                 {{--Profile info section--}}
                <div class="col-span-1 sm:col-span-5">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <div class="relative">
                                <div class="absolute end-1">
                                    <button class="bg-white rounded-full p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                    </button>
                                </div>

                                <img src="{{ asset(auth()->user()->photo) }}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                            </div>

                            <h1 class="text-xl font-bold">{{ auth()->user()->name }}</h1>

                            <p class="text-gray-700">Cook</p>
                            <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                <a href="#"
                                   class="bg-gourmania hover:gourmania-hover transition-colors duration-200 text-white py-2 px-4 rounded">Subscribe</a>
                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <div class="mb-2 text-center flex items-center w-full">
                                <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                <span class="text-black text-lg font-bold mx-2">Info</span>
                                <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                            </div>
                            <ul class="list-disc pl-5 marker:text-[#AE763E]">
                                <li class="mb-2">Joined: 01.01.2025</li>
                                <li class="mb-2">Gender: Male</li>
                                <li class="mb-2">Birth: 01.01.1991</li>
                            </ul>
                        </div>
                        <div class="mb-2 text-center flex items-center w-full">
                        <span
                            class="flex-1 border-s border-4 border-[#AE763E]"></span>
                            <span class="text-black text-lg font-bold mx-2">Bio</span>
                            <span
                                class="flex-1 border-s border-4 border-[#AE763E]"></span>
                        </div>
                        <p class="text-gray-700 text-sm">
                            A lover of culinary experiments.
                            I love trying new recipes,
                            combining unexpected ingredients and turning
                            ordinary dishes into gastronomic masterpieces.
                        </p>
                    </div>
                </div>

                {{-- Recipes --}}
                <div class="col-span-1 sm:col-span-7 flex flex-col sm:items-start w-full max-w-full overflow-hidden bg-white shadow rounded-lg px-4">
                    <div class="mb-2 text-center flex items-center w-full">
                        <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                        <span class="text-black text-lg font-bold mx-2">Recipes</span>
                        <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                    </div>
                    <div>
                        <p>Recipe cards here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
