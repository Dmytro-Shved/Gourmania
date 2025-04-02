<x-layout>
    @section('title', 'Add new recipe')

    @if (session('recipe_created'))
        <div x-data="{ show : true }" class="absolute self-end end-1 z-30">
            <div x-show="show" x-transition
                 class="bg-green-500 border text-white px-4 py-3 rounded relative font-inclusive w-[250px]" role="alert">
                <p>Success!</p>
                <span class="block sm:inline">{{ session('recipe_created') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg  @click="show = false" class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
    @elseif (session('recipe_updated'))
        <div x-data="{ visible : true }" class="absolute self-end end-1 z-30">
            <div x-show="visible" x-transition
                 class="bg-blue-400 border text-white px-4 py-3 rounded relative font-inclusive w-[250px]" role="alert">
                <p>Updated!</p>
                <span class="block sm:inline">{{ session('recipe_updated') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg  @click="visible = false" class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
            </div>
        </div>
    @endif

    {{--Create new recipe--}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            CREATE NEW RECIPE
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <livewire:recipe-wizard/>

    <div class="mt-6 text-center text-sm text-gray-600 sm:flex sm:justify-center sm:gap-2 font-inclusive">
        <p>Don't know how to create a recipe properly?</p>
        <a href="{{ route('faq') }}" class="text-[#AE763E] hover:underline">View guide</a>
    </div>

    <br>
    <br>
</x-layout>
