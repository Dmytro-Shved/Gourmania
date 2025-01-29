{{-- Recipe card --}}
<div class="flex relative my-5 border border-black rounded-md font-inclusive mx-auto w-[310px] xs:w-[350px] h-48 sm:ml-14 sm:w-[450px] md:ml-14 md:w-[515px] md:h-[205px] lg:ml-32 lg:w-[550px] xl:ml-40 xl:w-[580px] 2xl:ml-64 2xl:w-[610px]">
    <!-- Save button -->
    <button class="absolute">
        <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="" stroke="darkred"
             class="size-10 sm:size-11 md:size-12 lg:size-14">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
        </svg>
    </button>

    <!-- Image  -->
    <img class="size-32 sm:w-[135px] sm:h-[135px] md:w-[150px] md:h-[150px] lg:w-[165px] lg:h-[165px] border border-black m-3" src="{{ asset('storage/recipes-images/chicken-broth.webp') }}" alt="card">

    <!-- info block -->
    <div class="size-52 mt-2">
        <!-- recipe name  -->
        <span class="font-semibold text-lg md:text-xl lg:text-2xl">Chicken Broth</span>
        <!-- user info  -->
        <div class="flex flex-row items-center gap-1">
            <img class="size-9 md:size-10 rounded-full border border-black" src="{{ asset('storage/user_logo/default.svg') }}" alt="">
            <span class="text-base sm:text-[16px] lg:text-[17px]">Cook 13415</span>
        </div>

        <!-- recipe info -->
        <div class="flex flex-col mt-1.5 md:flex-row md:items-center md:gap-4">
            <button class="flex items-center gap-1.5 text-left text-sm sm:text-[15px] lg:text-[16px]">
                <span class="whitespace-nowrap">10 ingredients</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
            <div class="flex items-center gap-1.5 text-left text-sm sm:text-[15px] lg:text-[16px]">
                <img class="w-5 h-5" src="{{ asset('storage/objects/plate.svg') }}" alt="plate">
                <span class="whitespace-nowrap">4 servings</span>
            </div>
            <div class="flex items-center md:px-3 gap-1.5 text-left text-sm sm:text-[15px] lg:text-[16px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="whitespace-nowrap">1 hour</span>
            </div>
        </div>
    </div>

    <!-- Recipe stats -->
    <div class="absolute self-end end-1 mb-1 text-sm flex flex-row gap-2">
        <!-- Saved -->
        <div class="flex flex-row items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sm:size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>
            <span>100</span>
        </div>
        <!-- Likes -->
        <div class="flex flex-row items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sm:size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
            </svg>
            <span>100</span>
        </div>
        <!-- Dislikes -->
        <div class="flex flex-row items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sm:size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54" />
            </svg>
            <span>0</span>
        </div>
        <!-- Cuisine flag -->
        <div class="flex flex-row items-center">
            <img class="w-12 h-6 sm:w-13 border border-black rounded-sm" src="{{ asset('storage/flags/japan-flag.svg') }}" alt="flag">
        </div>
    </div>
</div>
