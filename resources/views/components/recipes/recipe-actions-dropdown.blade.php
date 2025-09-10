@props(['recipeId'])

<div x-data="{ isOpen: false, openedWithKeyboard: false }" x-on:keydown.esc.prevent="isOpen = false, openedWithKeyboard = false" class="absolute top-0.5 right-1 font-inclusive z-40">
    {{-- Toggle Button --}}
    <button type="button"
            aria-label="context menu"
            x-on:click="isOpen = ! isOpen"
            x-on:keydown.space.prevent="openedWithKeyboard = true"
            x-on:keydown.enter.prevent="openedWithKeyboard = true"
            x-on:keydown.down.prevent="openedWithKeyboard = true"
            class="inline-flex items-center bg-transparent transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-outline-strong active:opacity-100"
            x-bind:class="isOpen || openedWithKeyboard ? 'text-on-surface-strong dark:text-on-surface-dark-strong' : 'text-on-surface dark:text-on-surface-dark'"
            x-bind:aria-expanded="isOpen || openedWithKeyboard"
            aria-haspopup="true"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="#592D00" class="w-8 h-8">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd"/>
        </svg>
    </button>

    {{-- Dropdown Menu --}}
    <div x-cloak x-show="isOpen || openedWithKeyboard"
         x-transition
         x-trap="openedWithKeyboard"
         x-on:click.outside="isOpen = false, openedWithKeyboard = false"
         x-on:keydown.down.prevent="$focus.wrap().next()"
         x-on:keydown.up.prevent="$focus.wrap().previous()"
         class="font-semibold absolute top-0 right-0 mt-10 w-44 bg-white border border-black rounded-lg shadow-lg overflow-hidden z-50"
         role="menu"
    >
        {{-- Action buttons --}}
        <ul class="flex flex-col py-1.5 space-y-0" role="none">
            {{-- Dropdown Edit Section --}}
            <li>
                <a href="{{ route('recipes.edit', $recipeId) }}"
                   class="flex items-center gap-2 px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 focus-visible:bg-gray-200 cursor-pointer"
                   role="menuitem"
                   tabindex="0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#AE763E" class="size-5">
                        <path d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
                    </svg>
                    <span>Edit</span>
                </a>
            </li>
            {{-- Dropdown Delete Section --}}
            <li>
                <button
                    class="flex items-center gap-2 px-4 py-2 text-sm text-red-700 hover:bg-red-50 focus-visible:bg-red-100 cursor-pointer w-full text-left m-0 p-0"
                    role="menuitem"
                    tabindex="0"
                    id="deleteButton" data-modal-target="deleteModal-{{ $recipeId }}" data-modal-toggle="deleteModal-{{ $recipeId }}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                    </svg>
                    <span>Delete</span>
                </button>
            </li>
        </ul>
    </div>
</div>
