{{-- Desktop Menu --}}
<ul class="hidden items-center gap-4 flex-shrink-0 sm:flex">
    <li><a href="{{ route('recipes.index') }}" class="desktop-menu-btn">Recipes</a></li>
    <li><a href="#" class="desktop-menu-btn">Authors</a></li>
    <li><a href="{{ route('basics') }}" class="desktop-menu-btn">Basics</a></li>
    <li><a href="{{ route('recipes.create') }}" class="desktop-menu-btn tracking-wider text-white transition-colors duration-300 transform p-2 md:w-auto focus:outline-none bg-[#592D00] rounded-lg hover:bg-[#C58F5C]">Add recipe</a></li>

    <li x-data="{ userDropDownIsOpen: false, openWithKeyboard: false }"
        @keydown.esc.window="userDropDownIsOpen = false, openWithKeyboard = false"
        class="relative flex items-center">

        {{-- User Pic --}}
        <div class="flex space-x-2">
            <button @click="userDropDownIsOpen = ! userDropDownIsOpen" :aria-expanded="userDropDownIsOpen"
                    @keydown.space.prevent="openWithKeyboard = true"
                    @keydown.enter.prevent="openWithKeyboard = true"
                    @keydown.down.prevent="openWithKeyboard = true"
                    class="rounded-full focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:focus-visible:outline-white"
                    aria-controls="userMenu">
                <!-- Authenticated user logo -->
                @auth
                    <img src="{{ asset('./storage/' . auth()->user()->photo) }}" alt="User Profile"
                         rel="preload" class="size-10 rounded-full object-cover select-none"/>
                @endauth

                <!-- Unauthenticated user logo -->
                @guest
                    <img src="{{ asset('storage/user_logo/default.svg') }}" alt="User Profile" rel="preload"
                         class="size-10 rounded-full object-cover select-none"/>
                @endguest
            </button>
        </div>

        <!-- User Dropdown -->
        <ul x-cloak
            x-show="userDropDownIsOpen || openWithKeyboard"
            x-transition.opacity
            x-trap="openWithKeyboard"
            @click.outside="userDropDownIsOpen = false, openWithKeyboard = false"
            @keydown.down.prevent="$focus.wrap().next()"
            @keydown.up.prevent="$focus.wrap().previous()"
            id="userMenu"
            {{--class="absolute right-0 top-12 z-50 flex w-full @auth min-w-[16rem] @endauth @guest min-w-[12rem] @endguest flex-col overflow-hidden rounded-md border border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900"--}}
            class="absolute right-0 top-12 z-50 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-md border border-neutral-300 bg-neutral-50 py-1.5 dark:border-neutral-700 dark:bg-neutral-900"
        >
            @auth
                <!-- Name & Email-->
                <li class="border-b border-neutral-300 dark:border-neutral-700">
                    <div class="flex flex-col px-4 py-2">
                        <span
                            class="text-sm font-inclusive text-neutral-900 dark:text-white">{{ auth()->user()->name }}</span>
                        <p class="text-xs font-inclusive text-neutral-600 dark:text-neutral-300 overflow-x-auto whitespace-nowrap scrollbar-thin">{{ auth()->user()->email }}</p>
                    </div>
                </li>

                <!-- Profile button -->
                <li><a href="{{ route('profiles.show', auth()->user()->id) }}"
                       class="flex items-center space-x-1 block bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="black" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        <span>Profile</span>
                    </a>
                </li>

                <!-- My recipes button-->
                <li><a href="{{ route('profiles.saved', auth()->user()->id) }}" class="flex items-center space-x-1 bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="darkred" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
                        </svg>
                        <span>My recipes</span>
                    </a>
                </li>

                <!-- Settings button -->
                <li><a href="{{ route('profiles.edit', auth()->user()->id) }}" class="flex items-center space-x-1 bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="black" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        <span>Settings</span>
                    </a>
                </li>

                <!-- Sign out button-->
                <li>
                    <div class="bg-neutral-50 px-3 py-2 text-sm text-neutral-600 font-inclusive hover:bg-neutral-900/5 hover:text-neutral-900 focus-visible:bg-neutral-900/10 focus-visible:text-neutral-900 focus-visible:outline-none dark:bg-neutral-900 dark:text-neutral-300 dark:hover:bg-neutral-50/5 dark:hover:text-white dark:focus-visible:bg-neutral-50/10 dark:focus-visible:text-white">
                        <button
                            id="logoutButton"
                            data-modal-target="logoutModal"
                            data-modal-toggle="logoutModal"
                            type="submit"
                            class="flex flex-row items-center space-x-1 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="red" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
                            </svg>
                            <span class="text-red-600">Log Out</span>
                        </button>
                    </div>
                </li>

                <!-- Logout modal -->
                <x-user-logout-modal/>
            @endif

            <!-- Unauthenticated -->
            @guest
                <li class>
                    <div class="flex flex-col px-4 py-2">
                        <a href="{{ route('login-page') }}"
                           class="text-sm text-white font-inclusive rounded-lg p-1 flex flex-row items-center space-x-9 dark:text-white bg-gourmania hover:gourmania-hover transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="size-5 pl-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                            </svg>
                            <span class="text-sm">Log in</span>
                        </a>
                        <a href="{{ route('register-page') }}"
                           class="text-sm text-black w-full font-inclusive rounded-lg p-1 flex justify-center hover:text-[#4F4F4F] transition-colors duration-200">
                            <span class="text-sm">Register</span>
                        </a>
                    </div>
                </li>
            @endguest
        </ul>
    </li>
</ul>
