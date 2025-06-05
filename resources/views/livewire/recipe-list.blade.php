<div>
    <div class="font-inclusive text-center text-sm flex flex-col sm:flex-row items-center justify-center gap-2 sm:space-x-6 space-y-2 sm:space-y-0">
        {{-- Count of found recipes --}}
        <div class="flex gap-2 items-center">
            <span class="bg-gourmania rounded-full px-2 py-0.5 text-white">{{ $recipes->total() }}</span>
            <span>recipes found</span>
        </div>

        {{-- Dropdown filter --}}
        <div class="flex items-center gap-2">
            <span>Sort by:</span>
            <select
                name="sorting"
                wire:model.live="sort"
                class="block text-sm transition duration-75 border border-gray-800 rounded-lg shadow-sm h-9 gourmania-focus bg-none">
                <option value="popularity">By Popularity</option>
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>
    </div>

    <br>

    <div class="px-2">
        <div class="flex flex-col gap-5">
            {{-- Pagination navigation --}}
            @if($recipes->currentPage() <= $recipes->lastPage())
                <div class="mt-3 flex font-inclusive">
                    {{ $recipes->links(data: ['scrollTo' => false]) }}
                </div>
            @endif

            {{-- Recipes--}}
            @forelse($recipes as $recipe)
                <div wire:key="recipe-{{ $recipe->id }}">
                    <x-recipes.recipe-card :recipe="$recipe"/>
                </div>
            @empty
                <div class="pb-10 text-lg flex flex-col items-center justify-center text-center font-inclusive">
                    <p class="w-72 break-words">
                        <span class="text-white bg-gourmania px-1.5 py-1 rounded-lg">404</span>
                        <br>
                        <span class="block">We didn't found recipes for your request</span>
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
