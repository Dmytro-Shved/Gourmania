<x-layout>
    @section('title', 'Recipes')
    <livewire:filter/>

    {{-- Recipes title --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-2xl xl:text-3xl text-black px-4 break-words text-center uppercase">
            {{ $title }}
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <div wire:key="filtered-recipes-{{ request()->path() }}">
        <livewire:filtered-recipes />
    </div>

    <br>
</x-layout>
