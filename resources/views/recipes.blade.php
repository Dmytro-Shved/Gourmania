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

    <select class="block mx-auto w-sm text-sm font-medium transition duration-75 border border-gray-800 rounded-lg shadow-sm h-9 focus:border-blue-600 focus:ring-1 focus:ring-inset focus:ring-blue-600 bg-none" >
        <option value="week">Last week</option>
        <option value="month">Last month</option>
        <option value="year">Last year</option>
    </select>

    <div class="mx-auto mt-11 w-72 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
        <img class="h-48 w-full object-cover object-center" src="https://images.unsplash.com/photo-1674296115670-8f0e92b1fddb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Product Image" />
        <div class="p-4">
            <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900">Product Name</h2>
            <p class="mb-2 text-base dark:text-gray-300 text-gray-700">Product description goes here.</p>
            <div class="flex items-center">
                <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">$20.00</p>
                <p class="text-base  font-medium text-gray-500 line-through dark:text-gray-300">$25.00</p>
                <p class="ml-auto text-base font-medium text-green-500">20% off</p>
            </div>
        </div>
    </div>

    <br>
    <hr class="border-8 border-black">

</x-layout>
