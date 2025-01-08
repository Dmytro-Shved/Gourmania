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
    <!-- Logo -->
    <a href="#" class="flex items-center max-w-[150px] sm:max-w-[180px]">
        <img src="{{ asset('storage/logo/full-logo-nobg.svg') }}" alt="Gourmania" class="w-full h-full sm:w-full sm:h-full object-contain" />
    </a>

    <!-- Search -->
    <div class="relative flex mr-auto w-full max-w-64 flex-col gap-1 text-neutral-600 dark:text-neutral-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             aria-hidden="true"
             class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
        </svg>
        <input type="text" name="search" placeholder="" aria-label="search" class="w-full rounded-full border-none bg-neutral-50 py-2.5 pl-10 pr-2 text-sm disabled:cursor-not-allowed disabled:opacity-75 dark:bg-neutral-900/50"/>
    </div>

    <!-- Desktop Menu -->
    <ul class="hidden items-center gap-4 flex-shrink-0 sm:flex">
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Recipes</a></li>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Authors</a></li>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Basics</a></li>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Cuisines</a></li>

        <!-- User Pic -->
        <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }"
            @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
            class="relative flex items-center">

            <div class="flex space-x-2">
                <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
                        @keydown.space.prevent="openWithKeyboard = true" @keydown.enter.prevent="openWithKeyboard = true"
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <span>Profile</span>

                    </a>
                </li>
                <li><a href="#"
                       class="flex items-center space-x-1 bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5" stroke="darkred" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                        </svg>


                        <span>My recipes</span>
                    </a>
                </li>
                <li><a href="#"
                       class="flex items-center space-x-1 bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="red" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
                        </svg>
                        <span class="text-red-600">Sign Out</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Mobile Menu Button -->
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

    <!-- Mobile Menu -->
    <ul x-cloak
        x-show="mobileMenuIsOpen"
        x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:enter-start="-translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="-translate-y-full"
        class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col rounded-b-md border-b border-neutral-300 bg-[#c58f5c] px-8 pb-6 pt-10 dark:border-neutral-700 dark:bg-neutral-900 sm:hidden">

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
        <li class="p-2"><a href="#" class="w-full text-lg text-neutral-100 focus:underline font-inclusive"
                           aria-current="page">Recipes</a></li>
        <li class="p-2"><a href="#" class="w-full text-lg text-neutral-100 focus:underline font-inclusive">Authors</a>
        </li>
        <li class="p-2"><a href="#" class="w-full text-lg text-neutral-100 focus:underline font-inclusive">Basics</a>
        </li>
        <li class="p-2"><a href="#" class="w-full text-lg text-neutral-100 focus:underline font-inclusive">Cuisines</a>
        </li>
        <hr role="none" class="my-2 border-outline border-[#603912]">


        <li class="p-2 my-1 bg-[#603912] bg-opacity-10 rounded-full hover:bg-opacity-25 transition">
            <a href="#"
               class="flex items-center space-x-2 py-2 text-white underline font-inclusive"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#603912" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <span class="text-md text-neutral-100">Profile</span>

            </a>
        </li>

        <li class="p-2 my-1 bg-[#603912] bg-opacity-10 rounded-full hover:bg-opacity-25 transition">
            <a href="#"
               class="flex items-center space-x-2 py-2 text-white underline font-inclusive"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5" stroke="darkred" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                </svg>


                <span class="text-md text-neutral-100">My recipes</span>

            </a>
        </li>

        <li class="p-2 my-1 bg-[#603912] bg-opacity-10 rounded-full hover:bg-opacity-25 transition">
            <a href="#"
               class="flex items-center space-x-2 py-2 text-white underline font-inclusive"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#636160" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <span class="text-md text-neutral-100">Settings</span>
            </a>
        </li>

        <!-- CTA Button -->
        <li class="mt-4 w-full border-none">
            <a href="#"
               class="rounded-md bg-red-500 px-4 py-2 block text-center font-medium tracking-wide text-neutral-100 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white font-inclusive">
               <span>Sign Out</span>
            </a>
        </li>
    </ul>
</nav>



<div class="flex flex-col min-h-screen">

    <main class="flex-grow">
        <div class="font-inclusive text-xl">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet beatae consectetur consequuntur cupiditate ex harum
            illo maxime molestias mollitia pariatur quia reiciendis similique, tempore? Accusamus ad adipisci animi aspernatur
            commodi corporis, cum deleniti dolorem doloremque enim, error eveniet facilis fuga harum id ipsa maiores minima
            mollitia natus nemo neque non odit perspiciatis praesentium quae, quasi temporibus ullam unde voluptas voluptatem.
            Alias, animi deserunt ea ipsa modi mollitia quibusdam suscipit? Ab aliquam animi architecto, commodi explicabo in
            ipsum itaque laudantium perspiciatis quibusdam, quisquam quod, recusandae. Assumenda autem consequatur consequuntur
            cum cupiditate dolore fugit natus necessitatibus quod? Assumenda consequuntur distinctio dolorem ducimus eius
            eveniet illum ipsa libero maxime minus mollitia nam nesciunt officia placeat praesentium rem, temporibus tenetur
            vitae voluptatem, voluptates? Assumenda facere fugit itaque magni, minima quasi ratione reprehenderit totam.
            Accusantium autem doloremque id itaque minus modi pariatur provident suscipit tempora unde. At deserunt dolor harum
            incidunt, laudantium magni, maiores mollitia necessitatibus nulla optio praesentium quia temporibus voluptas
            voluptate voluptatem. Cumque dolorum excepturi harum modi quaerat quam soluta, voluptatum. Accusamus autem
            blanditiis, distinctio doloremque earum enim, eveniet fugiat inventore nemo nihil nulla odio perspiciatis, quas quis
            rerum soluta tempora totam unde vero voluptatibus. Ab illo minima odit quae vitae voluptas voluptatem?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet beatae consectetur consequuntur cupiditate ex harum
            illo maxime molestias mollitia pariatur quia reiciendis similique, tempore? Accusamus ad adipisci animi aspernatur
            commodi corporis, cum deleniti dolorem doloremque enim, error eveniet facilis fuga harum id ipsa maiores minima
            mollitia natus nemo neque non odit perspiciatis praesentium quae, quasi temporibus ullam unde voluptas voluptatem.
            Alias, animi deserunt ea ipsa modi mollitia quibusdam suscipit? Ab aliquam animi architecto, commodi explicabo in
            ipsum itaque laudantium perspiciatis quibusdam, quisquam quod, recusandae. Assumenda autem consequatur consequuntur
            cum cupiditate dolore fugit natus necessitatibus quod? Assumenda consequuntur distinctio dolorem ducimus eius
            eveniet illum ipsa libero maxime minus mollitia nam nesciunt officia placeat praesentium rem, temporibus tenetur
            vitae voluptatem, voluptates? Assumenda facere fugit itaque magni, minima quasi ratione reprehenderit totam.
            Accusantium autem doloremque id itaque minus modi pariatur provident suscipit tempora unde. At deserunt dolor harum
            incidunt, laudantium magni, maiores mollitia necessitatibus nulla optio praesentium quia temporibus voluptas
            voluptate voluptatem. Cumque dolorum excepturi harum modi quaerat quam soluta, voluptatum. Accusamus autem
            blanditiis, distinctio doloremque earum enim, eveniet fugiat inventore nemo nihil nulla odio perspiciatis, quas quis
            rerum soluta tempora totam unde vero voluptatibus. Ab illo minima odit quae vitae voluptas voluptatem?

        </div>
    </main>

    <footer class="bg-gourmania dark:bg-gray-900">
        <div class="container px-6 py-12 mx-auto">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
                <div class="sm:col-span-2">
                    <h1 class="max-w-lg text-[10] text-center font-inclusive tracking-tight text-neutral-100 xl:text-md dark:text-white">
                        Subscribe our newsletter to get a new recipes and dishes of the week!
                    </h1>

                    <div class="flex flex-col mx-auto mt-6 space-y-3 md:space-y-0 md:flex-row">
                        <input id="email" type="text"
                               class="px-4 py-2 text-gray-700 font-serif border border-white bg-white rounded-lg dark:bg-gray-900 dark:text-gray-300 focus:outline-none focus:ring-0"
                               placeholder="email"/>

                        <button
                            class="w-full px-6 py-2.5 text-sm font-inclusive tracking-wider text-white transition-colors duration-300 transform md:w-auto md:mx-4 focus:outline-none bg-[#592D00] rounded-lg hover:bg-[#C58F5C]">
                            Subscribe
                        </button>
                    </div>
                </div>

                <div>
                    <p class="font-inclusive font-semibold text-white text-xl text-center">Quick Links:</p>

                    <div class="flex flex-col items-start mt-5 space-y-2">
                        <p class="text-white font-inclusive transition-colors duration-300 underline hover:cursor-pointer hover:text-white">Home</p>
                    </div>
                </div>

                <div>
                    <p class="font-inclusive font-semibold text-white text-xl text-center">Info:</p>

                    <div class="w-full max-w-md mx-auto sm:w-44">
                        <div x-data="{selected:null}">
                            <ul class="shadow-box">
                                <!-- Item 1 -->
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
                                                We are a local development project made by <a href="" class="underline">Dmytro Shved</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <!-- Item 2 -->
                                <li class="relative border-b border-gray-200">
                                    <button type="button" class="w-full py-6 text-left"
                                            @click="selected !== 2 ? selected = 2 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span class="text-white font-inclusive hover:cursor-pointer">
                                                Item 2
                                            </span>
                                            <span class="ico-plus"></span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                         x-ref="container2"
                                         x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <p class="text-white text-sm font-inclusive">Content for accordion item 2 goes here. You can add any
                                                HTML content.
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <!-- Accordion Item 3 -->
                                <li class="relative">
                                    <button type="button" class="w-full py-6 text-left"
                                            @click="selected !== 3 ? selected = 3 : selected = null">
                                        <div class="flex items-center justify-between">
                                            <span class="text-white font-inclusive hover:cursor-pointer">
                                                Item 3
                                            </span>
                                        </div>
                                    </button>
                                    <div class="relative overflow-hidden transition-all max-h-0 duration-700" style=""
                                         x-ref="container3"
                                         x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                        <div class="p-6">
                                            <p class="text-white text-sm font-inclusive">Content for accordion item 3 goes here. You can add any
                                                HTML content.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-6 border-[#592D00] md:my-8 h-2"/>

            {{--<div class="sm:flex sm:items-center sm:justify-between">--}}
            {{--    <div class="flex gap-4 hover:cursor-pointer">--}}
            {{--        <img src="https://www.svgrepo.com/show/303114/facebook-3-logo.svg" width="30" height="30" alt="fb"/>--}}
            {{--        <img src="https://www.svgrepo.com/show/303115/twitter-3-logo.svg" width="30" height="30" alt="tw"/>--}}
            {{--        <img src="https://www.svgrepo.com/show/303145/instagram-2-1-logo.svg" width="30" height="30"--}}
            {{--             alt="inst"/>--}}
            {{--        <img src="https://www.svgrepo.com/show/94698/github.svg" class="" width="30" height="30" alt="gt"/>--}}
            {{--    </div>--}}
            {{--</div>--}}


{{--             class="flex items-center justify-center"--}}

            <div class="text-center">
                <img src="{{ asset('storage/logo/logo.svg') }}" class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-32 lg:h-32 mx-auto" alt="">
                <small class="font-inclusive text-center text-sm text-neutral-100 p-8 italic">
                    © 2025 Gourmania. All rights reserved.
                </small>
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
