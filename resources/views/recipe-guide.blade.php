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

    {{-- Instruction title --}}
    <div class="title-container text-center">
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            INSTRUCTION
        </small>
    </div>

    {{-- Instruction card --}}

    <br>
</x-layout>
