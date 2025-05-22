<x-layout>
    @section('title', 'Saved Recipes')
    <livewire:filter/>

    {{-- Recipes title --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-2xl xl:text-3xl text-black px-4 break-words text-center uppercase">
            SAVED RECIPES
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    <div class="px-2 font-inclusive">
        <div class="flex flex-col gap-5">
            @forelse($recipes as $recipe)
                <x-recipe-card :recipe="$recipe"/>
            @empty
                <div class="pt-3 sm:pt-10 text-lg flex flex-col items-center justify-center text-center">
                    <p class="w-72 break-words">
                        Haven't saved recipes yet?
                        <br>
                        <span class="block">
                            Go to the recipe
                            <a href="{{ route('recipes.index') }}" class="underline text-[#AE763E]">catalog</a>
                        </span>
                    </p>
                </div>
            @endforelse
        </div>
    </div>

    <br>
</x-layout>
