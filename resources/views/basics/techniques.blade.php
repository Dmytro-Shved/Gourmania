<x-layout>
    @section('title',  'Techniques')

    <livewire:filter/>

    {{-- Techniques --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            TECHNIQUES
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{-- Techniques Card --}}
    <div class="relative w-full bg-white px-6 pt-10 pb-8 mt-8 shadow-lg ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10 font-inclusive text-lg">
        <div class="mx-auto px-0 markdown">
            {!! $techniques !!}
        </div>
    </div>
    <div class="my-16">
        @include('partials.useful-links')
    </div>
</x-layout>
