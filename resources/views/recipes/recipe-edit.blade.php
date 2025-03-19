<x-layout>
    @section('title', 'Edit recipe')

    {{--session message--}}

    {{--Edit recipe--}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            EDIT RECIPE
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <livewire:recipe-wizard :recipe="$recipe"/>

    <br>
    <br>
</x-layout>
