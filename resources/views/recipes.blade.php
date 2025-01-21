<x-layout>
    @section('title', 'Recipes')
    <x-filter/>

    {{-- All recipes --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-sm sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            ALL RECIPES
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{-- Additional filter + Count of found recipes--}}
    <div class="font-inclusive text-center text-sm flex items-center justify-center space-x-6">
        <div class="flex gap-2 items-center">
            <span class="bg-gourmania rounded-full p-1 text-white">999</span>
            <span>recipes found</span>
        </div>
        <select class="block w-sm text-sm  transition duration-75 border border-gray-800 rounded-lg shadow-sm h-9 focus:border-blue-600 focus:ring-1 focus:ring-inset focus:ring-blue-600 bg-none">
            <option value="week">Last week</option>
            <option value="month">Last month</option>
            <option value="year">Last year</option>
        </select>
    </div>

    <br>

    <div class="grid-cols-1">
        <x-recipe-card/>
        <x-recipe-card/>
        <x-recipe-card/>
    </div>


    <br>
    <hr class="border-8 border-black">

</x-layout>
