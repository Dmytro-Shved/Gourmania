@props(['recipe', 'similarRecipes'])
<x-layout>
    @section('title', 'Guide')

    {{-- Recipe name --}}
    <div class="title-container text-center uppercase">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            {{ $recipe->name }}
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{-- Servings, Cook Time, Save Recipe --}}
    <div class="w-full flex flex-col sm:flex-row items-center justify-center space-y-2 sm:space-y-0 sm:space-x-6 font-inclusive text-sm">
        <div class="flex space-x-3">
            {{-- Servings --}}
            <div class="flex items-center gap-1">
                <img class="w-5 h-5" src="{{ asset('storage/objects/plate.svg') }}" alt="plate">
                <span class="whitespace-nowrap">{{ $recipe->servings }} servings</span>
            </div>

            {{-- Cook Time --}}
            <div class="flex items-center gap-1" title="{{ sprintf('%02d hour(s) | %02d minute(s)', ...explode(':', $recipe->cook_time)) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="whitespace-nowrap">{{ sprintf('%02dh %02dmin', ...explode(':', $recipe->cook_time)) }}</span>
            </div>
        </div>

        {{-- Separator, visible only after 640px --}}
        <span class="hidden sm:inline">|</span>

        <div class="flex items-center space-x-3">
            {{-- Save Recipe --}}
            <div class="flex items-center gap-1 relative">
                <livewire:bookmark :recipe="$recipe" icon-size="w-6 h-6"/>
                <div class="flex items-center gap-2">
                    <span class="text-[15px]">save recipe</span>
                    <span class="text-sm">{{ $recipe->savedCount }}</span>
                </div>
            </div>

            {{-- Likes & Dislikes --}}
            <livewire:like-dislike :recipe="$recipe"/>
        </div>
    </div>

    {{-- Image --}}
    <div class="flex justify-center items-center p-4">
        <div class="w-full max-w-[500px]">
            <img class="object-cover w-full h-auto" src="{{ asset('storage/'. $recipe->image) }}" width="500" height="500" alt="Recipe Image">
        </div>
    </div>

    {{-- Description --}}
    <div class="flex justify-center mx-auto w-full max-w-[500px] px-4 mb-8">
        <span class="font-inclusive text-sm lg:text-[15px] text-center break-words">{{ $recipe->description }}</span>
    </div>

    {{-- Author card --}}
    <div class="max-w-[500px] mx-auto font-inclusive mb-8">
        <div class="border border-black mx-4 justify-center rounded-md p-1">
            <span class="text-sm m-1 md:text-[16px] lg:text-lg">Author</span>
            <div class="flex flex-row justify-between items-center m-1 md:m-2">
                <div class="flex items-center gap-2">
                    <a class="rounded-full" href="{{ route('profiles.show', $recipe->user->id) }}">
                        <img class="size-10 md:size-12 lg:size-14 border border-black rounded-full" src="{{ asset('storage/'. $recipe->user->photo) }}" alt="Author Photo" title="{{ $recipe->user->name }}">
                    </a>
                    <span class="max-w-[129px] text-sm md:text-[16px] lg:text-lg break-words">{{ $recipe->user->name }}</span>
                </div>
                <button class="bg-gourmania text-white text-sm hover:gourmania-hover transition-colors duration-200 p-2 rounded-lg md:text-[16px] lg:text-lg">SUBSCRIBE</button>
            </div>
        </div>
    </div>

    {{-- Ingridients title --}}
    <div class="title-container text-center">
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            INGREDIENTS
        </small>
    </div>

    {{-- Ingridients block --}}
    <div class="max-w-[500px] mx-auto mb-12 font-inclusive text-sm md:text-[16px] lg:text-[18px]">
        <div class="border border-black mx-4 justify-center p-1">
            {{-- Ingridients--}}
            <div class="flex flex-col p-2 gap-2 md:gap-3 lg:gap-4">
                @foreach($recipe->ingredients as $ingredient)
                    <!-- Ingredient block -->
                    <div class="flex items-center">
                        <span class="mr-auto">{{ $ingredient->name }}</span>
                        <div class="flex-grow border-b border-black mx-2"></div>
                        <span class="ml-auto">
                            {{ $ingredient->pivot->quantity . ' '. $ingredient->pivot->unit->name}}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Instruction title --}}
    <div class="title-container text-center">
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            INSTRUCTION
        </small>
    </div>

    {{-- Instruction --}}
    @foreach($recipe->guideSteps as $step)
        <div class="px-4 relative">
            {{-- Step --}}
            <div class="bg-white max-w-[500px] md:max-w-[1000px] md:h-auto border border-black flex flex-col md:flex-row justify-center mx-auto my-4 font-inclusive">
                <div class="mx-auto absolute -top-3 self-center">
                    <div class="bg-white rounded-full px-2 border border-black">
                        <p>{{ $step->step_number }}</p>
                    </div>
                </div>
                <div class="md:flex md:items-stretch w-full">
                    {{-- Image --}}
                    <div class="md:p-5 flex-1 flex items-center justify-center">
                        <img class="w-full md:w-auto md:max-w-[500px] h-full object-cover" src="{{ asset('storage/'. $step->step_image ) }}" alt="Step {{ $step->step_number }}" />
                    </div>
                    {{-- Text --}}
                    <div class="p-5 flex-1 flex items-center justify-center">
                        <p class="mb-3 lg:text-[17px] text-gray-700 dark:text-gray-400">{{ $step->step_text }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Found a mistake? --}}
    <div class="max-w-[500px] md:max-w-[1000px] md:h-auto flex flex-row justify-end mx-auto my-4 font-inclusive pt-6">
        <button class="font-inclusive text-xs md:text-sm text-black py-1 px-2 hover:bg-red-500 hover:text-white rounded-lg transition-colors duration-200">
            FOUND A MISTAKE?
        </button>
    </div>

    <div class="mb-16 mt-10">
        @include('partials.useful-links')
    </div>

    {{-- Similar recipes title --}}
    <div class="title-container text-center mt-24">
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            SIMILAR RECIPES
        </small>
    </div>

    {{-- Similar recipes grid --}}
    <div class="px-2 my-8">
        <div class="flex flex-col gap-5">
            @forelse($similarRecipes as $recipe)
                <div wire:key="recipe-{{ $recipe->id }}">
                    <x-recipes.recipe-card :recipe="$recipe"/>
                </div>
            @empty
                <div class="pb-10 text-lg flex flex-col items-center justify-center text-center font-inclusive">
                    <p class="w-72 break-words">
                        <span class="block">No similar recipes found...</span>
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
