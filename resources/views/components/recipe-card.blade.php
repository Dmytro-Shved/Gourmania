@props(['recipe'])

{{-- Recipe Card --}}
<div x-data="{ open: false }" class="relative w-full max-w-[350px] sm:max-w-[550px] bg-white border border-black rounded-lg p-4 flex flex-row sm:flex-row font-inclusive min-h-[200px] sm:min-h-[205px]">
    <!-- Image -->
    <a href="{{ route('recipes.guide', $recipe->id) }}" class="w-[128px] h-[128px]">
        <img class="w-[128px] h-[128px] object-cover border border-black" src="{{ asset('storage/'. $recipe->image) }}" alt="Recipe Image">
    </a>

    <!-- info block -->
    <div class="flex-1 ml-3 flex flex-col min-w-0">
        <!-- recipe name -->
        <div class="max-w-[350px]">
            <div class="overflow-x-auto whitespace-nowrap">
                <a href="{{ route('recipes.guide', $recipe->id) }}" class="text-lg md:text-xl lg:text-2xl font-bold block">
                    {{ $recipe->name }}
                </a>
            </div>
        </div>

        <!-- user info -->
        <h4 class="flex items-center mt-1 gap-0.5">
            <a href="{{ route('profiles.show', $recipe->user->id) }}">
                <img src="{{ asset('storage/'. $recipe->user->photo) }}" title="{{ $recipe->user->name }}" alt="User Photo" class="w-8 h-8 md:w-10 md:h-10 rounded-full">
            </a>
            <p class="text-[16px] md:text-[18px]">{{ $recipe->user->name }}</p>
        </h4>

        <!-- recipe info -->
        <div class="mt-2 flex flex-col gap-1 text-sm sm:text-[15px] lg:text-[16px] lg:flex-row">
            <div class="flex items-center gap-1 relative">
                {{ $recipe->ingredients->count() }} ingredients
                <!-- Open mini ingredients list -->
                <button x-on:click="open = true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
            </div>

            <!-- Servings -->
            <p class="flex items-center gap-1">
                <img class="w-5 h-5" src="{{ asset('storage/objects/plate.svg') }}" alt="plate">
                {{ $recipe->servings }} servings
            </p>

            <!-- Cook time -->
            <p class="flex items-center gap-1" title="{{ sprintf('%02d hour(s) | %02d minute(s)', ...explode(':', $recipe->cook_time)) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                {{ $recipe->cook_time }}
            </p>
        </div>

        <!-- Recipe stats -->
        <div class="absolute bottom-1 sm:bottom-2 right-2 text-sm flex items-center gap-2">
            <!-- Category & Cuisine -->
            <div class="flex-col text-sm text-center">
                <a class="hover:underline text-[#AE763E]" href="{{ route('recipes.index', ['dish_category' => $recipe->dishCategory->id]) }}">
                    {{ $recipe->dishCategory->name }}
                </a>
                <span class="whitespace-nowrap">•
                    <a class="hover:underline text-[#AE763E]" href="{{ route('recipes.index', ['cuisine' => $recipe->cuisine->id]) }}">
                        {{ $recipe->cuisine->name }}
                    </a>
                </span>
            </div>
            <!-- Saved -->
            <div class="flex items-center gap-1">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-5 sm:size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
                    </svg>
                </button>
                {{ $recipe->saved_count }}
            </div>
            <!-- Likes & Dislikes -->
            <livewire:like-dislike :recipe="$recipe" :key="$recipe->id"/>
        </div>

        <!-- Bookmark button -->
        <button class="absolute top-1 left-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="darkred" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="darkred"
                 class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z"/>
            </svg>
        </button>

        <!-- Actions Dropdown -->
        <!-- Show this block only if the user is the author of the recipe and if he is on the profile page -->
        @if(auth()->check() && auth()->user()->id == $recipe->user->id && request()->routeIs('profiles.show'))
            <x-recipe-actions-dropdown :recipeId="$recipe->id"/>
            <x-recipe-delete-modal :recipeId="$recipe->id" :recipeName="$recipe->name"/>
        @endif
    </div>

    <!-- mini ingredients list -->
    <div x-cloak x-show="open" x-on:click.away="open = false" class="bg-white w-[290px] left-1.5 xs:w-[320px] xs:left-2 min-w-[250px] text-gray-700 rounded-lg shadow-lg border border-black absolute mt-24 lg:mt-[105px] z-50">
        @foreach($recipe->ingredients as $ingredient)
            <div class="flex items-center px-2 text-[15px] md:text-[17px]">
                <span class="mr-auto">{{ $ingredient->name }}</span>
                <div class="flex-grow border-b border-black mx-2"></div>
                <span class="ml-auto">{{ $ingredient->pivot->quantity . ' '. $ingredient->pivot->unit->name }}</span>
            </div>
        @endforeach
    </div>
</div>
