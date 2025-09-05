<x-layout>
    @section('title', 'Edit recipe')

    @if (session('recipe_created'))
        {{-- Recipe created --}}
        <x-session.message :message="session('recipe_created')" type="success" />
    @elseif (session('recipe_updated'))
        {{-- Recipe updated --}}
        <x-session.message :message="session('recipe_updated')" type="info" />
    @endif

    {{--Edit recipe--}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            EDIT RECIPE
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <div class="mb-16">
        <livewire:recipe-wizard :recipe="$recipe"/>
    </div>
</x-layout>
