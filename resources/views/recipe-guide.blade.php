<x-layout>
    @section('title', 'Guide')
    <x-filter/>

    <br>

    {{-- Recipe name --}}
    <div class="title-container text-center uppercase">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            chicken broth
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <br>

    {{-- Servings and Time --}}
    <div class="flex justify-center items-center mx-auto font-inclusive text-sm space-x-3">
        <div class="flex items-center gap-1">
            <img class="w-5 h-5" src="{{ asset('storage/objects/plate.svg') }}" alt="plate">
            <span class="whitespace-nowrap">3 servings</span>
        </div>
        <div class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span class="whitespace-nowrap">1 hour</span>
        </div>
        <button class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5" stroke="darkred" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>
            <span class="text-sm underline">save recipe</span>
        </button>
    </div>

    {{-- Image --}}
    <div class="flex justify-center items-center p-4">
        <div class="w-full max-w-[500px]">
            <img class="object-cover w-full h-auto" src="{{ asset('storage/recipes-images/chicken-broth.webp') }}" width="500" height="500" alt="Recipe image">
        </div>
    </div>

    {{-- Description --}}
    <div class="flex justify-center mx-auto w-full max-w-[500px] px-4">
        <span class="font-inclusive text-sm lg:text-[15px] text-center break-words">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda autem doloremque iste magni odio porro ratione sapiente sunt veniam voluptates
        </span>
    </div>

    <br>

    {{-- Author card --}}
    <div class="max-w-[500px] mx-auto font-inclusive">
        <div class="border border-black mx-4 justify-center rounded-md p-1">
            <span class="text-sm m-1 md:text-[16px] lg:text-lg">Author</span>
            <div class="flex flex-row justify-between items-center m-1 md:m-2">
                <div class="flex items-center gap-2">
                    <img class="size-10 md:size-12 lg:size-14 border border-black rounded-full" src="{{ asset('storage/user_logo/default.svg') }}" alt="">
                    <span class="text-sm md:text-[16px] lg:text-lg">Gordon Ramsay</span>
                </div>
                <button class="bg-gourmania text-white text-sm hover:gourmania-hover transition-colors duration-200 p-2 rounded-lg md:text-[16px] lg:text-lg">SUBSCRIBE</button>
            </div>
        </div>
    </div>

    <br>

    {{-- Ingridients title --}}
    <div class="title-container text-center">
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            INGREDIENTS
        </small>
    </div>

    {{-- Ingridients block --}}
    <div class="max-w-[500px] mx-auto font-inclusive text-sm md:text-[16px] lg:text-[18px]">
        <div class="border border-black mx-4 justify-center p-1">
            {{-- Ingridients--}}
            <div class="flex flex-col p-2 gap-2 md:gap-3 lg:gap-4">
                <!-- Ingredient block -->
                <div class="flex items-center">
                    <span class="mr-auto">Chicken soup set</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">2 kg</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Onions</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">1 head</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Carrot</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">1 piece</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Celery stalk</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">2 pieces</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Water</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">5 l.</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Dill stems</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">5 pieces</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Parsley stems</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">5 pieces</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Bay leaf</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">1 piece</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Thyme</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">5 branches</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Black peppercorns</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">5 pieces</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Allspice</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">5 pieces</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-auto">Salt</span>
                    <div class="flex-grow border-b border-black mx-2"></div>
                    <span class="ml-auto">to taste</span>
                </div>
            </div>
        </div>
    </div>

    <br>

    {{-- Instruction title --}}
    <div class="title-container text-center">
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            INSTRUCTION
        </small>
    </div>

    {{-- Instruction card --}}
    <div class="px-4 relative">
        {{-- Step --}}
        <div class="bg-white max-w-[500px] md:max-w-[1000px] md:h-auto border border-black flex flex-col md:flex-row justify-center mx-auto my-4 font-inclusive">
            <div class="mx-auto absolute -top-3 self-center">
                <div class="bg-white rounded-full px-2 border border-black">
                    <p>1</p>
                </div>
            </div>
            <div class="md:flex md:items-center">
                {{-- Image --}}
                <div class="md:p-5 flex-1">
                    <img class="w-full md:w-auto md:max-w-[500px] h-auto object-cover" src="{{ asset('storage/steps/step-1.webp') }}" alt="Step 1" />
                </div>
                {{-- Text --}}
                <div class="p-5 flex-1">
                    <p class="mb-3 lg:text-[17px] text-gray-700 dark:text-gray-400">
                        Place the chicken bones on a baking sheet and place in the oven preheated to 240 degrees for 20 minutes.
                    </p>
                </div>
            </div>
        </div>

        {{-- Found a mistake? --}}
        <div class="max-w-[500px] md:max-w-[1000px] md:h-auto flex flex-row justify-end mx-auto my-4 font-inclusive pt-6">
            <button class="font-inclusive text-xs md:text-sm text-black py-1 px-2 hover:bg-red-500 hover:text-white rounded-lg transition-colors duration-200">
                FOUND A MISTAKE?
            </button>
        </div>
    </div>

    <br>
</x-layout>
