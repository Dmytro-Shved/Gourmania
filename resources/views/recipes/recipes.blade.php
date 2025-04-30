<x-layout>
    @section('title', 'Recipes')
    <livewire:filter/>

    {{-- All recipes --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4 break-words text-center uppercase">
            {{ $title }}
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <livewire:recipe-list/>

    <br>
</x-layout>
