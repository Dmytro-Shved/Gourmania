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
        <img src="{{ asset('storage/logo/full-logo-nobg.svg') }}" alt="Gourmania"
             class="w-full h-full sm:w-full sm:h-full object-contain"/>
    </a>

    <!-- Search -->
    <div
        class="relative flex mr-auto w-full max-w-64 flex-col gap-1 font-inclusive text-neutral-600 dark:text-neutral-300">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             aria-hidden="true"
             class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
        </svg>
        <input type="text" name="search" placeholder="" aria-label="search"
               class="w-full rounded-full border-none bg-neutral-50 py-2.5 pl-10 pr-2 text-sm disabled:cursor-not-allowed disabled:opacity-75 dark:bg-neutral-900/50"/>
    </div>

    <!-- Desktop Menu -->
    <ul class="hidden items-center gap-4 flex-shrink-0 sm:flex">
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Recipes</a>
        </li>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Authors</a>
        </li>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Basics</a>
        </li>
        <li><a href="#" class="font-inclusive text-white hover:gourmania-hover transition rounded-3xl sm:text-sm p-1">Cuisines</a>
        </li>

        <!-- User Pic -->
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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#342B22" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>

                <span class="text-md text-neutral-100">Profile</span>

            </a>
        </li>

        <li class="p-2 my-1 bg-[#603912] bg-opacity-10 rounded-full hover:bg-opacity-25 transition">
            <a href="#"
               class="flex items-center space-x-2 py-2 text-white underline font-inclusive"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="darkred" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
                </svg>


                <span class="text-md text-neutral-100">My recipes</span>

            </a>
        </li>

        <li class="p-2 my-1 bg-[#603912] bg-opacity-10 rounded-full hover:bg-opacity-25 transition">
            <a href="#"
               class="flex items-center space-x-2 py-2 text-white underline font-inclusive"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#342B22" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>

                <span class="text-md text-neutral-100">Settings</span>
            </a>
        </li>

        <!-- CTA Button -->
        <li class="mt-4 w-full border-none">
            <a href="#"
               class="rounded-md bg-red-500 px-4 py-2 block text-center font-medium tracking-wide text-neutral-100 hover:bg-red-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white font-inclusive">
                <span>Sign Out</span>
            </a>
        </li>
    </ul>
</nav>


<div class="flex flex-col min-h-screen">

    <main class="flex-grow">
        <div class="font-inclusive text-xl">
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
                    <p class="font-inclusive font-semibold text-white text-xl text-center">Quick Links</p>

                    <div class="flex flex-col items-center mt-5 space-y-2">
                        <p class="text-white font-inclusive transition-colors duration-300 underline hover:cursor-pointer hover:text-white">
                            Recipes</p>
                        <p class="text-white font-inclusive transition-colors duration-300 underline hover:cursor-pointer hover:text-white">
                            Authors</p>
                        <p class="text-white font-inclusive transition-colors duration-300 underline hover:cursor-pointer hover:text-white">
                            Basics</p>
                        <p class="text-white font-inclusive transition-colors duration-300 underline hover:cursor-pointer hover:text-white">
                            Cuisines</p>
                    </div>
                </div>

                <div>
                    <p class="font-inclusive font-semibold text-white text-xl text-center">Info</p>

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
                                                We are a local development project made by <a href="" class="underline">Dmytro
                                                    Shved</a>
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

                                <!-- Accordion Item 3 -->
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
                                            <span class="text-neutral-200 text-xs font-inclusive">The egg as a method of reproduction predates chickens by a long way</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Buttons Section -->
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

            <div class="text-center my-10">
                <span class="font-inclusive italic text-white text-sm">“There is no love more sincere than the love of food.”</span>
                <span class="font-inclusive italic text-white text-xs">© George Bernard Shaw</span>
            </div>

            <hr class="my-6 border-[#592D00] md:my-8 h-2"/>

            <div class="text-center my-5">
                <img src="{{ asset('storage/logo/logo.svg') }}"
                     class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 lg:w-32 lg:h-32 mx-auto" alt="">
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
