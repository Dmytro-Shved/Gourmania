<div>
    <div class="font-inclusive text-center text-sm flex items-center justify-center space-x-6">
        {{-- Count of found recipes --}}
        <div class="flex gap-2 items-center">
            <span class="bg-gourmania rounded-full px-2 py-0.5 text-white">{{ $recipes->count() }}</span>
            <span>recipes found</span>
        </div>

        {{-- Dropdown filter --}}
        <select class="block w-sm text-sm   transition duration-75 border border-gray-800 rounded-lg shadow-sm h-9 gourmania-focus bg-none">
            <option value="week">Last week</option>
            <option value="month">Last month</option>
            <option value="year">Last year</option>
        </select>
    </div>

    <br>

    <div class="px-2">
        <div class="flex flex-col gap-3">
            {{-- Pagination navigation --}}
            <div class="mt-6 flex font-inclusive">
                {{ $recipes->links(data: ['scrollTo' => false]) }}
            </div>

            {{-- Recipes--}}
            @forelse($recipes as $recipe)
                <x-recipe-card :recipe="$recipe"/>
            @empty
                <div class="pt-3 sm:pt-10  text-lg flex flex-col items-center justify-center text-center">
                    <p class="w-72 break-words">
                        404
                        <br>
                        <span class="block">We didn't found recipes for your request</span>
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
