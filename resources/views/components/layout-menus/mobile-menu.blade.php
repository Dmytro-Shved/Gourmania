<div class="flex flex-row items-center gap-5">
    {{-- Mobile Menu Button --}}
    <button @click="mobileMenuIsOpen = true" type="button"
            class="flex text-neutral-600 dark:text-neutral-300 sm:hidden">
        {{-- Open mobile menu --}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true"
             viewBox="0 0 24 24" stroke-width="2" stroke="white" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>
</div>

{{-- Mobile Menu --}}
<ul x-cloak
    x-show="mobileMenuIsOpen"
    x-transition:enter="transition motion-reduce:transition-none ease-out duration-300"
    x-transition:enter-start="-translate-y-full"
    x-transition:enter-end="translate-y-0"
    x-transition:leave="transition motion-reduce:transition-none ease-out duration-300"
    x-transition:leave-start="translate-y-0"
    x-transition:leave-end="-translate-y-full"
    x-trap.noscroll="mobileMenuIsOpen"
    class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-50 flex flex-col rounded-b-md border-b border-neutral-300 bg-[#c58f5c] px-8 pb-6 pt-10 dark:border-neutral-700 dark:bg-neutral-900 sm:hidden">

    {{-- Close mobile menu --}}
    <div class="self-end absolute bg-amber-800 bg-opacity-50 p-2.5 rounded-full -mx-6 -mt-7">
        <svg @click="mobileMenuIsOpen = false" x-cloak x-show="mobileMenuIsOpen"
             xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true"
             viewBox="0 0 24 24" stroke-width="2" stroke="white" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
        </svg>
    </div>

    @auth
        {{-- Name & email--}}
        <li class="mb-4 border-none">
            <div class="flex items-center gap-2 py-2">
                <img src="{{ asset('./storage/' . auth()->user()->photo) }}" alt="User Profile" class="size-14 rounded-full object-cover ring-2 ring-[#603912]"/>
                <div>
                    <span class="font-medium text-white font-inclusive">{{ auth()->user()->name}}</span>
                    <p class="text-sm text-white font-inclusive">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </li>
    @endauth

    @guest
        <li class="mb-4 border-none">
            <div class="flex items-center gap-2 py-2">
                <img src="{{ asset('storage/user_logo/default.svg') }}" alt="User Profile"
                     class="size-14 rounded-full object-cover ring-2 ring-[#603912]"/>
                <div class="flex flex-row gap-4 ml-2 items-center">
                    <a href="{{ route('login-page') }}"
                       class="text-sm text-white font-inclusive rounded-lg p-1 flex items-center justify-center space-x-1 dark:text-white bg-gourmania hover:gourmania-hover transition-colors duration-200 ring-2 ring-[#603912]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="size-5 pl-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                        <span class="text-sm">Log in</span>
                    </a>
                    <p class="text-[#603912]">|</p>
                    <a href="{{ route('register-page') }}"
                       class="text-sm text-white font-inclusive underline hover:text-gray-200 transition-colors duration-200">
                        Register
                    </a>
                </div>
            </div>
        </li>
    @endguest
    {{-- Links --}}
    <li class="p-2"><a href="{{ route('recipes.index') }}" class="mobile-menu-link">Recipes</a></li>
    <li class="p-2"><a href="#" class="mobile-menu-link">Authors</a></li>
    <li class="p-2"><a href="{{ route('basics') }}" class="mobile-menu-link">Basics</a></li>
    <li class="p-2"><a href="{{ route('recipes.create') }}" class="mobile-menu-link tracking-wider text-white transition-colors duration-300 transform p-2 md:w-auto focus:outline-none bg-[#592D00] rounded-lg hover:bg-[#C58F5C]">Add recipe</a></li>

    @auth
        <hr role="none" class="my-2 border-outline border-[#603912]">

        {{-- Profile --}}
        <li class="mobile-menu-btn">
            <a href="{{ route('profiles.show', auth()->user()->id) }}" class="mobile-menu-btn-style">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#342B22" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
                <span class="text-md text-neutral-100">Profile</span>
            </a>
        </li>

        {{-- Saved recipes --}}
        <li class="mobile-menu-btn">
            <a href="{{ route('profiles.saved', auth()->user()->id) }}" class="mobile-menu-btn-style">
                <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="none" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
                </svg>
                <span class="text-md text-neutral-100">Saved recipes</span>
            </a>
        </li>

        {{-- Liked recipes --}}
        <li class="mobile-menu-btn">
            <a href="{{ route('profiles.liked', auth()->user()->id) }}" class="mobile-menu-btn-style">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#342B22" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z"/>
                </svg>
                <span class="text-md text-neutral-100">Liked recipes</span>
            </a>
        </li>

        {{-- Settings --}}
        <li class="mobile-menu-btn">
            <a href="{{ route('profiles.edit', auth()->user()->id) }}" class="mobile-menu-btn-style">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#342B22" class="size-7 mx-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>

                <span class="text-md text-neutral-100">Settings</span>
            </a>
        </li>

        {{-- Sign Out --}}
        <li class="mt-4 w-full border-none">
            <form action="{{ route('logout') }}" method="POST" class="rounded-md bg-red-500 px-4 py-2 block text-center font-medium tracking-wide text-neutral-100 hover:bg-red-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white font-inclusive">
                @csrf
                <button type="submit" class="w-full">Sign Out</button>
            </form>
        </li>
    @endauth
</ul>
