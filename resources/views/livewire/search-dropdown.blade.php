{{-- Search Dropdown --}}
<div class="hidden sm:flex mr-auto w-full max-w-64 flex-col gap-1 font-inclusive text-neutral-600 relative">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
         stroke="currentColor"
         aria-hidden="true"
         class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50">
        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>

    {{-- Search Input--}}
    <input type="text" name="search" placeholder="" aria-label="search" class="w-full rounded-full border-none bg-neutral-50 py-2.5 pl-10 pr-2 text-sm disabled:cursor-not-allowed disabled:opacity-75 dark:bg-neutral-900/50 gourmania-focus" />

    {{-- Dropdown list--}}
    <div class="absolute z-40 mt-1 w-64 sm:block hidden top-10">
        <ul class="max-h-64 overflow-y-auto rounded-lg bg-white dark:bg-neutral-800 shadow-lg text-sm divide-y divide-neutral-100">
            <li class="flex items-center gap-3 px-4 py-2 hover:bg-neutral-100 cursor-pointer">
                <img src="{{ asset('storage/recipes-images/chicken-broth.webp') }}" alt="Poster"
                     class="w-10 h-10 object-cover rounded" />
                <span class="text-sm text-neutral-800 dark:text-neutral-200 line-clamp-2 break-words">Some long text for the recipe name with add dots</span>
            </li>
            <li class="flex items-center gap-3 px-4 py-2 hover:bg-neutral-100 cursor-pointer">
                <img src="{{ asset('storage/recipes-images/chicken-broth.webp') }}" alt="Poster"
                     class="w-10 h-10 object-cover rounded" />
                <span class="text-sm text-neutral-800 dark:text-neutral-200 line-clamp-2 break-words">Some long text for the recipe name</span>
            </li>
            <li class="flex items-center gap-3 px-4 py-2 hover:bg-neutral-100 cursor-pointer">
                <img src="{{ asset('storage/recipes-images/chicken-broth.webp') }}" alt="Poster"
                     class="w-10 h-10 object-cover rounded" />
                <span class="text-sm text-neutral-800 dark:text-neutral-200 line-clamp-2 break-words">Some long text for the recipe name</span>
            </li>
        </ul>
    </div>
</div>
