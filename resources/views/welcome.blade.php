<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/vPsLc1c/gourmania-favicon.png">
    <title>Gourmania | Recipes and more</title>

    {{-- Inknut Antiqua --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- Inclusive Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inclusive+Sans:ital@0;1&display=swap" rel="stylesheet">

    {{-- Inria Serif --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>

<nav
    x-data="{ mobileMenuIsOpen: false }"
    @click.away="mobileMenuIsOpen = false"
    class="flex items-center justify-between bg-gourmania border-b border-neutral-300 gap-4 px-6 py-4 dark:border-neutral-700 dark:bg-neutral-900"
    aria-label="penguin ui menu"
>
    {{-- Logo --}}
    <a href="#" class="flex items-center max-w-[150px] sm:max-w-[180px] ">
        <img src="{{ asset('storage/logo/full-logo-nobg.svg') }}" alt="Gourmania" class="w-full h-full sm:w-full sm:h-full object-contain"/>
    </a>

    {{-- Search --}}
    <div
        class="relative flex mr-auto w-full max-w-64 flex-col gap-1 font-inclusive text-neutral-600 dark:text-neutral-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             aria-hidden="true"
             class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
        </svg>
        <input type="text" name="search" placeholder="" aria-label="search" class="w-full rounded-full border-none bg-neutral-50 py-2.5 pl-10 pr-2 text-sm disabled:cursor-not-allowed disabled:opacity-75 dark:bg-neutral-900/50"/>
    </div>

    {{-- Desktop Menu --}}
    <ul class="hidden items-center gap-4 flex-shrink-0 sm:flex">
        <li><a href="#" class="desktop-menu-btn">Recipes</a></li>
        <li><a href="#" class="desktop-menu-btn">Authors</a></li>
        <li><a href="#" class="desktop-menu-btn">Basics</a></li>
        <li><a href="#" class="desktop-menu-btn">Cuisines</a></li>

        {{-- User Pic --}}
        <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }"
            @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
            class="relative flex items-center">

            <div class="flex space-x-2">
                <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
                        @keydown.space.prevent="openWithKeyboard = true"
                        @keydown.enter.prevent="openWithKeyboard = true"
                        @keydown.down.prevent="openWithKeyboard = true"
                        class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:focus-visible:outline-white"
                        aria-controls="userMenu">
                    <img src="{{ asset('storage/user_logo/default.svg') }}" alt="User Profile"
                         class="size-10 rounded-full object-cover"/>
                </button>
            </div>

            <!-- User Dropdown -->
            <ul x-cloak
                x-show="userDropDownIsOpen || openWithKeyboard"
                x-transition.opacity x-trap="openWithKeyboard"
                @click.outside="userDropDownIsOpen = false, openWithKeyboard = false"
                @keydown.down.prevent="$focus.wrap().next()"
                @keydown.up.prevent="$focus.wrap().previous()"
                id="userMenu"
                class="absolute right-0 top-12 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900"
            >

                <li class="border-b border-neutral-300 dark:border-neutral-700">
                    <div class="flex flex-col px-4 py-2">
                        <span class="text-sm font-inclusive text-neutral-900 dark:text-white">Gordon Ramsey</span>
                        <p class="text-xs font-inclusive text-neutral-600 dark:text-neutral-300">
                            gordon.ramsey@gmail.com</p>
                    </div>
                </li>
                <li><a href="#"
                       class="flex items-center space-x-1 block bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="black" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        <span>Profile</span>
                    </a>
                </li>
                <li><a href="#"
                       class="flex items-center space-x-1 bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="darkred" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
                        </svg>


                        <span>My recipes</span>
                    </a>
                </li>
                <li><a href="#"
                       class="flex items-center space-x-1 bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="black" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>

                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="red" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
                        </svg>
                        <span class="text-red-600">Sign Out</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    {{-- Mobile Menu Button --}}
    <button @click="mobileMenuIsOpen = !mobileMenuIsOpen" :aria-expanded="mobileMenuIsOpen"
            :class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button"
            class="flex text-neutral-600 dark:text-neutral-300 sm:hidden" aria-label="mobile menu"
            aria-controls="mobileMenu">
        <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true"
             viewBox="0 0 24 24" stroke-width="2" stroke="white" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
        <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true"
             viewBox="0 0 24 24" stroke-width="2" stroke="white" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
        </svg>
    </button>

    {{-- Mobile Menu --}}
    <ul x-cloak
        x-show="mobileMenuIsOpen"
        x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:enter-start="-translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="-translate-y-full"
        class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col rounded-b-md border-b border-neutral-300 bg-[#c58f5c] px-8 pb-6 pt-10 dark:border-neutral-700 dark:bg-neutral-900 sm:hidden">

        {{-- Name & email--}}
        <li class="mb-4 border-none">
            <div class="flex items-center gap-2 py-2">
                <img src="{{ asset('storage/user_logo/default.svg') }}" alt="User Profile"
                     class="size-14 rounded-full object-cover ring-2 ring-[#603912]"/>
                <div>
                    <span class="font-medium text-white font-inclusive">Gordon Ramsey</span>
                    <p class="text-sm text-white font-inclusive">gordon.ramsey@gmail.com</p>
                </div>
            </div>
        </li>
        {{-- Links --}}
        <li class="p-2"><a href="#" class="mobile-menu-link">Recipes</a></li>
        <li class="p-2"><a href="#" class="mobile-menu-link">Authors</a></li>
        <li class="p-2"><a href="#" class="mobile-menu-link">Basics</a></li>
        <li class="p-2"><a href="#" class="mobile-menu-link">Cuisines</a></li>

        <hr role="none" class="my-2 border-outline border-[#603912]">

        {{-- Profile --}}
        <li class="mobile-menu-btn">
            <a href="#" class="mobile-menu-btn-style">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#342B22" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
                <span class="text-md text-neutral-100">Profile</span>
            </a>
        </li>

        {{-- My recipes --}}
        <li class="mobile-menu-btn">
            <a href="#" class="mobile-menu-btn-style">
                <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5" stroke="darkred" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
                </svg>
                <span class="text-md text-neutral-100">My recipes</span>
            </a>
        </li>

        {{-- Settings --}}
        <li class="mobile-menu-btn">
            <a href="#" class="mobile-menu-btn-style">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#342B22" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>

                <span class="text-md text-neutral-100">Settings</span>
            </a>
        </li>

        {{-- Sign Out --}}
        <li class="mt-4 w-full border-none">
            <a href="#" class="rounded-md bg-red-500 px-4 py-2 block text-center font-medium tracking-wide text-neutral-100 hover:bg-red-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white font-inclusive">
                <span>Sign Out</span>
            </a>
        </li>
    </ul>
</nav>

<div class="flex flex-col min-h-screen">

    <main class="flex-grow">
        <div class="font-inclusive text-xl">

            {{-- Slogan --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-t border-black"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    BEST CHOICE FOR GOURMETS
                </small>
                <span class="flex-grow border-t border- border-black"></span>
            </div>

            {{-- Stats --}}
            <div class="flex justify-between items-center">
                <img class="max-sm:size-10 max-sm:hidden sm:size-14 md:size-16 lg:size-20" src="{{ asset('storage/objects/leaf.svg')  }}" alt="">
                <img class="max-sm:size-4 xs:size-5 sm:hidden" src="{{ asset('storage/objects/leave_right_mobile.svg')  }}" alt="">

                <div class="stats-text">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#88C9CB" class="bi bi-circle-fill stats-ball" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                    </svg>
                    <span>999 original recipes</span>
                </div>

                <div class="stats-text">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#CCD5AE" class="bi bi-circle-fill stats-ball" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                    </svg>
                    <span>1000 authors</span>
                </div>

                <div class="stats-text">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FEDC56" class="bi bi-circle-fill stats-ball" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                    </svg>
                    <span>Explore 50+ world cuisines</span>
                </div>

                <img class="max-sm:size-10 max-sm:hidden sm:size-14 md:size-16 lg:size-20 transform scale-x-[-1]" src="{{ asset('storage/objects/leaf.svg')  }}" alt="">
                <img class="max-sm:size-4 xs:size-5 sm:hidden transform scale-x-[-1]" src="{{ asset('storage/objects/leave_right_mobile.svg')  }}" alt="">
            </div>

            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-b border-black"></span>
                <small class="font-inclusive text-xs xs:text-[14px] sm:text-[16px] md:text-[18px] lg:text-xl xl:text-2xl text-black px-4">
                    Filter recipes
                </small>
                <span class="flex-grow border-t border-black"></span>
            </div>

            {{-- Filter --}}
            <div x-data="{ firstValue: '', secondValue: '' }" class="flex flex-col items-center px-2 gap-2 md:flex-row md:justify-center md:gap-0.5 md:items-center">

                {{-- Icon --}}
                <img class="size-10 sm:size-12 md:size-24 md:rotate-45" src="{{ asset('storage/objects/piper.svg') }}" alt="">

                {{-- Double select --}}
                <div class="flex flex-col w-full max-w-xs items-center gap-1 md:w-1/4 md:px-2 md:py-2">
                    {{-- Dish --}}
                    <div class="relative w-full">
                        <select id="modelName" name="modelName"
                                class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-75 md:px-4 md:py-2 md:text-sm"
                                x-model="firstValue">
                            <option value="" selected>Any dish</option>
                            <option value="camery">Broth</option>
                            <option value="4runner">Cookies</option>
                            <option value="tacoma">Steak</option>
                            <option value="rav4">Cheeseburger</option>
                            <option value="corolla">Mohito</option>
                        </select>
                    </div>
                </div>

                {{-- Dish type --}}
                <div class="flex flex-col w-full max-w-xs items-center gap-2 md:w-1/4 md:px-2 md:py-2">
                    <div class="relative w-full">
                        <select id="dish-type" name="dish-type"
                                class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 md:px-4 md:py-2 md:text-sm"
                                x-model="secondValue"
                                :disabled="!firstValue">
                            <option value="" :selected="!firstValue" x-text="firstValue ? 'Any type' : 'Any type'"></option>
                            <option value="-">Type 1</option>
                            <option value="-">Type 2</option>
                            <option value="-">Type 3</option>
                            <option value="-">Type 4</option>
                        </select>
                    </div>
                </div>

                {{-- Select cuisine --}}
                <div class="w-full max-w-xs md:w-1/4  md:py-2">
                    <select id="country" name="country" class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white md:px-4 md:py-2 md:text-sm">
                        <option value="Any" selected>Any cuisine</option>
                        <option value="Australia">Australian</option>
                        <option value="Belgium">Belgian</option>
                        <option value="China">Chinese</option>
                        <option value="France">French</option>
                        <option value="Germany">German</option>
                        <option value="Italy">Italian</option>
                        <option value="Mexico">Mexican</option>
                        <option value="Poland">Polish</option>
                        <option value="Portugal">Portuguese</option>
                        <option value="Spain">Spanish</option>
                        <option value="Turkey">Turkish</option>
                        <option value="Ukraine">Ukrainian</option>
                        <option value="United Kingdom">British</option>
                        <option value="United States">American</option>
                    </select>
                </div>

                {{-- Select menu --}}
                <div class="w-full max-w-xs md:w-1/4 md:px-1 md:py-2">
                    <select id="country" name="country" class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white md:px-4 md:py-2 md:text-sm">
                        <option value="Any" selected>Any menu</option>
                        <option value="Ketogenic">Ketogenic</option>
                        <option value="Gluten-free">Gluten-free</option>
                        <option value="Vegetarian">Vegetarian</option>
                        <option value="Vegan">Vegan </option>
                        <option value="Paleo">Paleo</option>
                    </select>
                </div>

                {{-- Filter button --}}
                <div class="w-full max-w-xs md:w-auto md:px-4 md:py-2 md:text-base">
                    <button class="font-inclusive text-neutral-200 text-sm bg-gourmania hover:gourmania-hover transition rounded-xl px-4 py-1 w-full md:px-4 md:py-2 md:text-base">
                        Filter
                    </button>
                </div>
            </div>

            <br>

            {{-- Popular recipes --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    POPULAR RECIPES
                </small>
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            </div>

            {{-- Carousel --}}
            <div x-data="{
                        slides: [
                            {
                                {{-- Image 1 --}}
                                imgSrc: 'https://images.wallpaperscraft.com/image/single/steak_mushrooms_asparagus_103375_1920x1080.jpg',
                                imgAlt: 'A perfectly grilled steak served with potatoes and greens.',
                                title: 'Delicious Steak',
                                description: 'A tender and juicy steak, cooked to perfection, paired with crispy potatoes.',
                                ctaUrl: 'https://example.com',
                                ctaText: 'See more',
                            },
                            {
                                {{-- Image 2 --}}
                                imgSrc: 'https://images.wallpaperscraft.com/image/single/salmon_teriyaki_fish_108544_1920x1080.jpg',
                                imgAlt: 'Fresh fish fillet served on a plate with soy sauce and sesame seeds.',
                                title: 'Grilled Fish',
                                description: 'A delicate and flavorful grilled fish, perfect for any seafood lover.',
                                ctaUrl: 'https://example.com',
                                ctaText: 'See more',
                            },
                            {
                                {{-- Image 3--}}
                                imgSrc: 'https://images.wallpaperscraft.com/image/single/pizza_pastry_appetizing_117398_1920x1080.jpg',
                                imgAlt: 'Hot pizza with cheese and toppings, sliced and ready to eat.',
                                title: 'Hot Pizza',
                                description: 'A delicious pizza with crispy crust, melted cheese, and your favorite toppings.',
                                ctaUrl: 'https://example.com',
                                ctaText: 'See more',
                            },
                        ],
                        currentSlideIndex: 1,
                        previous() {
                            if (this.currentSlideIndex > 1) {
                                this.currentSlideIndex = this.currentSlideIndex - 1
                            } else {
                                this.currentSlideIndex = this.slides.length
                            }
                        },
                        next() {
                            if (this.currentSlideIndex < this.slides.length) {
                                this.currentSlideIndex = this.currentSlideIndex + 1
                            } else {
                                this.currentSlideIndex = 1
                            }
                        },
                    }" class="relative w-full overflow-hidden">

                {{-- previous button --}}
                <button type="button" class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white" aria-label="previous slide" x-on:click="previous()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>

                {{-- next button --}}
                <button type="button" class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white" aria-label="next slide" x-on:click="next()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                {{-- slides --}}
                {{-- Change min-h-[50svh] to your preferred height size --}}
                <div class="relative min-h-[50svh] w-full">
                    <template x-for="(slide, index) in slides">
                        <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                            <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                                <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white" x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                                <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300" x-text="slide.description" x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                                <button type="button" x-cloak x-show="slide.ctaUrl !== null" class="mt-2 cursor-pointer whitespace-nowrap rounded-md border border-white bg-transparent px-4 py-2 text-center text-xs font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-onSurfaceDarkStrong active:opacity-100 active:outline-offset-0 md:text-sm" x-text="slide.ctaText"></button>
                            </div>

                            <img class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300" x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
                        </div>
                    </template>
                </div>

                {{-- indicators --}}
                <div class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2" role="group" aria-label="slides" >
                    <template x-for="(slide, index) in slides">
                        <button class="size-2 cursor-pointer rounded-full transition" x-on:click="currentSlideIndex = index + 1" x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-300' : 'bg-neutral-300/50']" x-bind:aria-label="'slide ' + (index + 1)"></button>
                    </template>
                </div>
            </div>

            <br>

            {{-- Latest recipes title --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    LATEST RECIPES
                </small>
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            </div>

            {{-- Latest recipes grid --}}
            {{-- All images are 800 x 1200 --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/meat_stake_cuts_10247_800x1200.jpg"
                             alt="Image 1">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Delicious meat steak</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/pizza_food_glass_73012_800x1200.jpg"
                             alt="Image 2">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Fresh hot pizza</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/french_fries_appetizing_greens_112053_800x1200.jpg"
                             alt="Image 3">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Crispy french fries</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/salad_vegetables_leaves_88299_800x1200.jpg"
                             alt="Image 4">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">A salad full of vitamins</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/noodles_sauce_cheese_112659_800x1200.jpg"
                             alt="Image 5">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Pasta with vegetables and grated cheese</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/pancakes_berries_dessert_157035_800x1200.jpg"
                             alt="Image 6">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Fluffy pancakes with sour cream and raspberries</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/food_fish_herbs_108877_800x1200.jpg"
                             alt="Image 7">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Fresh fish with rice and herbs</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/soup_toast_dish_208792_800x1200.jpg"
                             alt="Image 8">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Flavorful soup with crispy toast</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center my-4">
                <button class="font-inclusive text-xs sm:text-sm md:text-lg text-black border border-black py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300">
                    See more
                </button>
            </div>

            <br>


            {{-- Meat dishes title --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    MEAT DISHES
                </small>
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            </div>

            {{-- Meat dishes grid --}}
            {{-- All images are 800 x 1200 --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/meat_stake_cuts_10247_800x1200.jpg"
                             alt="Image 1">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Delicious meat steak</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/pork_vegetables_meat_109770_800x1200.jpg"
                             alt="Image 2">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Fresh pork with vegetables</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/meat_baking_vegetables_88477_800x1200.jpg"
                             alt="Image 3">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Hot backed meat with vegetables</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/meat_pork_dinner_112587_800x1200.jpg"
                             alt="Image 4">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Pork with sauce</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center my-4">
                <button class="font-inclusive text-xs sm:text-sm md:text-lg text-black border border-black py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300">
                    See more
                </button>
            </div>

            <br>

            {{-- Salads title --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    SALADS
                </small>
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            </div>

            {{-- Salads grid --}}
            {{-- All images are 800 x 1200 --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/salad_vegetables_leaves_108329_800x1200.jpg"
                             alt="Image 1">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Salad with vegetables, leaves, spinach and cucumbers</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/salad_vegetables_eggs_114547_800x1200.jpg"
                             alt="Image 2">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Healthy salad with vegetables, eggs and carrots</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/salad_cheese_fruit_107087_800x1200.jpg"
                             alt="Image 3">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Aromatic cheese, fruits and vegetables</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/salad_lemon_cherry_tomatoes_107795_800x1200.jpg"
                             alt="Image 4">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Sour lemon with fresh cherry tomatoes and fresh herbs</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center my-4">
                <button class="font-inclusive text-xs sm:text-sm md:text-lg text-black border border-black py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300">
                    See more
                </button>
            </div>

            <br>

            {{-- Breakfasts title --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    BREAKFASTS
                </small>
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            </div>

            {{-- Breakfasts grid --}}
            {{-- All images are 800 x 1200 --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/pancakes_raspberries_syrup_115255_800x1200.jpg"
                             alt="Image 1">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Pancakes with raspberries and syrup</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/fried_eggs_bacon_toast_102470_800x1200.jpg"
                             alt="Image 2">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Fresh scrambled eggs and meat</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/belgian_waffle_waffle_berries_873742_800x1200.jpg"
                             alt="Image 3">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Fluffy waffles</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/granola_strawberry_berries_207990_800x1200.jpg"
                             alt="Image 4">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Granola with strawberry</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center my-4">
                <button class="font-inclusive text-xs sm:text-sm md:text-lg text-black border border-black py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300">
                    See more
                </button>
            </div>

            <br>

            {{-- Bakery title --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    BAKERY
                </small>
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            </div>

            {{-- Bakery grid --}}
            {{-- All images are 800 x 1200 --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/bread_almonds_cakes_112884_800x1200.jpg"
                             alt="Image 1">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Soft, flavorful bread</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/donut_icing_still_life_163211_800x1200.jpg"
                             alt="Image 2">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Doughnuts with glaze and sprinkles </span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/croissant_berries_strawberries_180033_800x1200.jpg"
                             alt="Image 3">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Delicious croissants</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/cookies_chocolate_dessert_874621_800x1200.jpg"
                             alt="Image 4">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Chocolate chip cookie</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center my-4">
                <button class="font-inclusive text-xs sm:text-sm md:text-lg text-black border border-black py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300">
                    See more
                </button>
            </div>

            <br>

            {{-- Desserts title --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    DESSERTS
                </small>
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            </div>

            {{-- Desserts grid --}}
            {{-- All images are 800 x 1200 --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/tartlet_berries_cream_111477_800x1200.jpg"
                             alt="Image 1">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Tartalette with berries and cream</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/icecream_balls_bilberry_45151_800x1200.jpg"
                             alt="Image 2">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Chilled ice cream</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/cake_souffles_cream_114050_800x1200.jpg"
                             alt="Image 3">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Tender tiramisu</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/cupcake_cherry_berries_289705_800x1200.jpg"
                             alt="Image 4">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Cupcake with cream and cherry</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center my-4">
                <button class="font-inclusive text-xs sm:text-sm md:text-lg text-black border border-black py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300">
                    See more
                </button>
            </div>

            <br>

            {{-- Drinks title --}}
            <div class="flex items-center justify-center my-4">
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
                <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
                    DRINKS
                </small>
                <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
            </div>

            {{-- Drinks grid --}}
            {{-- All images are 800 x 1200 --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/tea_cup_lemon_209994_800x1200.jpg"
                             alt="Image 1">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Warming flavored tea</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/coffee_drink_cup_207326_800x1200.jpg"
                             alt="Image 2">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Invigorating coffee</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/mojito_drink_lemon_177472_800x1200.jpg"
                             alt="Image 3">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">A refreshing mojito</span>
                        </div>
                    </a>
                </div>

                <div class="relative block overflow-hidden group w-full">
                    <a href="#" class="block">
                        <img class="h-auto max-w-full transform transition-transform duration-300 group-hover:scale-110"
                             src="https://images.wallpaperscraft.com/image/single/cocktail_mint_glass_272604_800x1200.jpg"
                             alt="Image 4">

                        <div class="hidden absolute lg:inset-0 lg:bg-black lg:bg-opacity-50 lg:flex lg:items-center lg:justify-center lg:opacity-0 lg:group-hover:opacity-100 lg:transition-opacity lg:duration-300">
                            <span class="text-white font-inclusive text-lg font-semibold text-center">Mint Cocktail</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center my-4">
                <button class="font-inclusive text-xs sm:text-sm md:text-lg text-black border border-black py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300">
                    See more
                </button>
            </div>

            <br>



            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet beatae consectetur consequuntur cupiditate ex
            harum
            illo maxime molestias mollitia pariatur quia reiciendis similique, tempore? Accusamus ad adipisci animi
            aspernatur
            commodi corporis, cum deleniti dolorem doloremque enim, error eveniet facilis fuga harum id ipsa maiores
            minima
            mollitia natus nemo neque non odit perspiciatis praesentium quae, quasi temporibus ullam unde voluptas
            voluptatem.
            Alias, animi deserunt ea ipsa modi mollitia quibusdam suscipit? Ab aliquam animi architecto, commodi
            explicabo in
            ipsum itaque laudantium perspiciatis quibusdam, quisquam quod, recusandae. Assumenda autem consequatur
            consequuntur
            cum cupiditate dolore fugit natus necessitatibus quod? Assumenda consequuntur distinctio dolorem ducimus
            eius
            eveniet illum ipsa libero maxime minus mollitia nam nesciunt officia placeat praesentium rem, temporibus
            tenetur
            vitae voluptatem, voluptates? Assumenda facere fugit itaque magni, minima quasi ratione reprehenderit totam.
            Accusantium autem doloremque id itaque minus modi pariatur provident suscipit tempora unde. At deserunt
            dolor harum
            incidunt, laudantium magni, maiores mollitia necessitatibus nulla optio praesentium quia temporibus voluptas
            voluptate voluptatem. Cumque dolorum excepturi harum modi quaerat quam soluta, voluptatum. Accusamus autem
            blanditiis, distinctio doloremque earum enim, eveniet fugiat inventore nemo nihil nulla odio perspiciatis,
            quas quis
            rerum soluta tempora totam unde vero voluptatibus. Ab illo minima odit quae vitae voluptas voluptatem?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet beatae consectetur consequuntur cupiditate ex
            harum
            illo maxime molestias mollitia pariatur quia reiciendis similique, tempore? Accusamus ad adipisci animi
            aspernatur
            commodi corporis, cum deleniti dolorem doloremque enim, error eveniet facilis fuga harum id ipsa maiores
            minima
            mollitia natus nemo neque non odit perspiciatis praesentium quae, quasi temporibus ullam unde voluptas
            voluptatem.
            Alias, animi deserunt ea ipsa modi mollitia quibusdam suscipit? Ab aliquam animi architecto, commodi
            explicabo in
            ipsum itaque laudantium perspiciatis quibusdam, quisquam quod, recusandae. Assumenda autem consequatur
            consequuntur
            cum cupiditate dolore fugit natus necessitatibus quod? Assumenda consequuntur distinctio dolorem ducimus
            eius
            eveniet illum ipsa libero maxime minus mollitia nam nesciunt officia placeat praesentium rem, temporibus
            tenetur
            vitae voluptatem, voluptates? Assumenda facere fugit itaque magni, minima quasi ratione reprehenderit totam.
            Accusantium autem doloremque id itaque minus modi pariatur provident suscipit tempora unde. At deserunt
            dolor harum
            incidunt, laudantium magni, maiores mollitia necessitatibus nulla optio praesentium quia temporibus voluptas
            voluptate voluptatem. Cumque dolorum excepturi harum modi quaerat quam soluta, voluptatum. Accusamus autem
            blanditiis, distinctio doloremque earum enim, eveniet fugiat inventore nemo nihil nulla odio perspiciatis,
            quas quis
            rerum soluta tempora totam unde vero voluptatibus. Ab illo minima odit quae vitae voluptas voluptatem?
        </div>
    </main>

    <footer class="bg-gourmania dark:bg-gray-900">
        <div class="container px-6 py-12 mx-auto">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">

                {{-- Email subscribtion --}}
                <div class="sm:col-span-2">
                    <h1 class="max-w-lg text-[10] text-center font-inclusive tracking-tight text-white px-1 xl:text-md italic py-1">
                        Subscribe our newsletter to get a new recipes and dishes of the week!
                    </h1>

                    <img src="" alt="">

                    <div class="flex flex-col mt-6 space-y-3 md:space-y-0 md:flex-row px-3 my-3 bg-[#DDB892] rounded p-3">
                        <input id="email" type="text"
                               class="px-4 py-2 text-gray-700 font-serif border border-white bg-white rounded-lg dark:bg-gray-900 dark:text-gray-300 focus:outline-none focus:ring-0"
                               placeholder="email"/>

                        <button
                            class="w-full px-6 py-2.5 text-sm font-inclusive tracking-wider text-white transition-colors duration-300 transform md:w-auto md:mx-4 focus:outline-none bg-[#592D00] rounded-lg hover:bg-[#C58F5C]">
                            Subscribe
                        </button>
                    </div>
                </div>

                {{-- Quick links--}}
                <div>
                    <p class="font-inclusive font-semibold text-white text-xl text-center">Quick Links</p>

                    <div class="flex flex-col items-center mt-5 space-y-2">
                        <p class="quick-link">
                            Recipes</p>
                        <p class="quick-link">
                            Authors</p>
                        <p class="quick-link">
                            Basics</p>
                        <p class="quick-link">
                            Cuisines</p>
                    </div>
                </div>

                {{-- Info --}}
                <div>
                    <p class="font-inclusive font-semibold text-white text-xl text-center">Info</p>

                    <div class="w-full max-w-md mx-auto sm:w-44">
                        <div x-data="{selected:null}">
                            <ul class="shadow-box">
                                {{-- Who we are --}}
                                <li class="relative border-b border-gray-200">
                                    <button type="button" class="w-full py-6 text-left"
                                            @click="selected !== 1 ? selected = 1 : selected = null">
                                        <div class="flex items-center justify-between">
                                        <span class="text-white font-inclusive hover:cursor-pointer">
                                            Who we are?
                                        </span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                         x-ref="container1"
                                         x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <p class="text-white text-sm font-inclusive">
                                                We are a local development project made by <a href="" class="underline">Dmytro
                                                    Shved</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                {{-- Team --}}
                                <li class="relative border-b border-gray-200">
                                    <button type="button" class="w-full py-6 text-left"
                                            @click="selected !== 2 ? selected = 2 : selected = null">
                                        <div class="flex items-center justify-between">
                                        <span class="text-white font-inclusive hover:cursor-pointer">
                                            Team
                                        </span>
                                            <span class="ico-plus"></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                         x-ref="container2"
                                         x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                        <span class="text-white text-sm font-inclusive underline">
                                            Dmytro Shved
                                        </span>
                                        </div>
                                    </div>
                                </li>

                                {{-- FAQ --}}
                                <li class="relative border-b border-gray-200">
                                    <button type="button" class="w-full py-6 text-left"
                                            @click="selected !== 3 ? selected = 3 : selected = null">
                                        <div class="flex items-center justify-between">
                                        <span class="text-white font-inclusive hover:cursor-pointer">
                                            FAQ
                                        </span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                         x-ref="container3"
                                         x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                        <div class="p-6 items-start">
                                        <span class="text-white text-sm font-inclusive">
                                                Which came first, the chicken or the egg?
                                        </span>
                                            <br>
                                            <span class="text-neutral-200 text-xs font-inclusive">The egg as a method of reproduction predates chickens by a long</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Social Media Buttons Section --}}
            <div class="text-center my-8">
                <p class="font-inclusive font-semibold text-white text-xl">Socials</p>
                <div class="flex justify-center mt-4 space-x-4">
                    <a href="#"
                       class="p-3 bg-[#E4405F] text-white rounded-full hover:bg-[#BD304B] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                        </svg>
                    </a>
                    <a href="#"
                       class="p-3 bg-[#4267B2] text-white rounded-full hover:bg-[#365899] transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                    </a>
                    <a href="#"
                       class="p-3 bg-gray-800 text-white rounded-full hover:bg-gray-700 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             class="bi bi-github" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Quote --}}
            <div class="text-center my-10">
                <span class="font-inclusive italic text-white text-sm">“There is no love more sincere than the love of food.”</span>
                <span class="font-inclusive italic text-white text-xs">© George Bernard Shaw</span>
            </div>

            {{-- Footer logo --}}
            <div class="text-center my-5">
                <img src="{{ asset('storage/logo/logo.svg') }}"
                     class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-32 lg:h-32 mx-auto" alt="Logo">
                <div class="flex items-center justify-center my-4">
                    <span class="flex-grow border-t border-neutral-200"></span>
                    <small class="font-inclusive text-sm text-neutral-100 px-4 italic">
                        © 2025 Gourmania. All rights reserved.
                    </small>
                    <span class="flex-grow border-t border-neutral-200"></span>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@livewireScripts
</body>
</html>
