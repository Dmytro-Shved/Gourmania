<nav x-data="{ mobileMenuIsOpen: false }"
     @click.away="mobileMenuIsOpen = false"
     class="flex items-center justify-between bg-gourmania border-b border-neutral-300 gap-2 px-1.5 py-4 dark:border-neutral-700 dark:bg-neutral-900"
     aria-label="penguin ui menu">

    {{-- Logo --}}
    <x-nav.logo/>

    {{-- Search sidebar button --}}
    <x-search.sidebar-btn/>

    {{-- Desktop Menu --}}
    <x-nav.menus.desktop/>

    {{-- Mobile Menu --}}
    <x-nav.menus.mobile/>
</nav>
