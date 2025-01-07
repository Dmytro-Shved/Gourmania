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
    <a href="#" class="text-xl md:text-2xl text-white font-inknut dark:text-white">
        <span>Gourmania</span>
         {{--<img src="{{ asset('storage/user_logo/default.svg') }}" alt="brand logo" class="w-10" />--}}
    </a>

    <!-- Search -->
    <div class="relative flex mr-auto w-full max-w-64 flex-col gap-1 text-neutral-600 dark:text-neutral-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             aria-hidden="true"
             class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
        </svg>
        <input type="search" name="search" placeholder="" aria-label="search" class="w-full rounded-full border-none bg-neutral-50 py-2.5 pl-10 pr-2 text-sm disabled:cursor-not-allowed disabled:opacity-75 dark:bg-neutral-900/50"/>
    </div>

    <!-- Desktop Menu -->
    <ul class="hidden items-center gap-4 flex-shrink-0 sm:flex">
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Recipes</a>
        </li>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Authors</a>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Basics</a>
        </li>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Cuisines</a>
        </li>

        <!-- User Pic -->
        <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }"
            @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
            class="relative flex items-center">
            <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
                    @keydown.space.prevent="openWithKeyboard = true" @keydown.enter.prevent="openWithKeyboard = true"
                    @keydown.down.prevent="openWithKeyboard = true"
                    class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:focus-visible:outline-white"
                    aria-controls="userMenu">
                <img src="{{ asset('storage/user_logo/default.svg') }}" alt="User Profile"
                     class="size-10 rounded-full object-cover"/>
            </button>

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
                       class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Dashboard</a>
                </li>
                <li><a href="#"
                       class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Subscription</a>
                </li>
                <li><a href="#"
                       class="block bg-neutral-50 px-4 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">Settings</a>
                </li>
                <li>
                    <a href="#"
                       class="bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="red" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>

                        </svg>
                        <p class="text-red-600">Sign Out</p>
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
        <li class="p-2"><a href="#" class="w-full focus:underline text-neutral-100 font-inclusive">Dashboard</a></li>
        <li class="p-2"><a href="#" class="w-full focus:underline text-neutral-100 font-inclusive">Subscription</a></li>
        <li class="p-2"><a href="#" class="w-full focus:underline text-neutral-100 font-inclusive">Settings</a></li>

        <!-- CTA Button -->
        <li class="mt-4 w-full border-none">
            <a href="#"
               class="rounded-md bg-red-500 px-4 py-2 block text-center font-medium tracking-wide text-neutral-100 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white font-inclusive">
                Sign Out
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
                    <h1 class="max-w-lg text-xl font-inclusive tracking-tight text-neutral-100 xl:text-2xl dark:text-white">
                        Subscribe our newsletter to get a new recipes and dishes of the week!</h1>

                    <div class="flex flex-col mx-auto mt-6 space-y-3 md:space-y-0 md:flex-row">
                        <input id="email" type="text"
                               class="px-4 py-2 text-gray-700 font-serif bg-white border rounded-full dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:outline-none focus:ring-0"
                               placeholder="email"/>

                        <button
                            class="w-full px-6 py-2.5 text-sm font-inclusive tracking-wider text-white transition-colors duration-300 transform md:w-auto md:mx-4 focus:outline-none bg-[#592D00] rounded-lg hover:bg-[#C58F5C] focus:ring focus:ring-gray-300 focus:ring-opacity-80">
                            Subscribe
                        </button>
                    </div>
                </div>

                <div>
                    <p class="font-inclusive font-semibold text-white text-xl">Quick Links:</p>

                    <div class="flex flex-col items-start mt-5 space-y-2">
                        <p class="text-white font-inclusive transition-colors duration-300 underline hover:cursor-pointer hover:text-white">Home</p>
                    </div>
                </div>

                <div>
                    <p class="font-inclusive font-semibold text-white text-xl">Info:</p>

                    <div class="w-full max-w-md mx-auto">
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
                                            <p class="text-white text-sm font-inclusive">Content for accordion item 1 goes
                                                here. You can add any HTML content.
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

            <div class="flex items-center justify-center">
                <img src="{{ asset('storage/logo/logo.svg') }}" class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-32 lg:h-32 " alt="">
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
