<x-layout>
    @section('title', 'Add new recipe')

    {{--Create new recipe--}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            CREATE NEW RECIPE
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <livewire:recipe-wizard/>

    <div class="mt-6 mb-16 text-center text-sm text-gray-600 sm:flex sm:justify-center sm:gap-2 font-inclusive">
        <p>Don't know how to create a recipe properly?</p>
        <a href="{{ route('faq') }}" class="text-[#AE763E] hover:underline">View guide</a>
    </div>
</x-layout>
