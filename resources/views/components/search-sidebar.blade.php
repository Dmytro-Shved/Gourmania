{{-- Search sidebar --}}
<div>
    {{-- Sidebar Overlay --}}
    <div x-cloak
         x-show="open"
         class="fixed inset-0 z-50 overflow-hidden font-inclusive">
        <div @click="open = false"
             x-show="open"
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             x-trap.noscroll="open"
             class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        {{-- Sidebar content --}}
        <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex">
            <div x-show="open"
                 x-transition:enter="transition-transform ease-out duration-300"
                 x-transition:enter-start="transform translate-x-full"
                 x-transition:enter-end="transform translate-x-0"
                 x-transition:leave="transition-transform ease-in duration-300"
                 x-transition:leave-start="transform translate-x-0"
                 x-transition:leave-end="transform translate-x-full"
                 class="w-screen max-w-md">
                <div class="h-full flex flex-col py-6 bg-white shadow-xl">
                    {{-- Sidebar header --}}
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-xl font-semibold text-black">Search</h2>
                        <button x-on:click="open = false" class="text-gray-500 hover:text-gray-700">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    {{-- Search list --}}
                    <livewire:search-list/>
                </div>
            </div>
        </section>
    </div>
</div>
