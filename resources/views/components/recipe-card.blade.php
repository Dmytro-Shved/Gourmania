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

            <p class="flex items-center gap-1">
                <img class="w-5 h-5" src="{{ asset('storage/objects/plate.svg') }}" alt="plate">
                {{ $recipe->servings }} servings
            </p>
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
        <div class="absolute bottom-1 sm:bottom-2 right-1 text-sm flex items-center gap-2">
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
            <!-- Likes -->
            <p class="flex items-center gap-1">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-5 sm:size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z"/>
                    </svg>
                </button>
                {{ $recipe->likes }}
            </p>
            <!-- Dislikes -->
            <p class="flex items-center gap-1">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-5 sm:size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54"/>
                    </svg>
                </button>
                {{ $recipe->dislikes }}
            </p>
            <!-- Cuisine flag -->
            <img class="w-12 h-6 sm:w-13 border border-black rounded-sm"
                 src="{{ asset('storage/flags/japan-flag.svg') }}"
                 alt="flag">
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
        @if(auth()->user()->id == $recipe->user->id && request()->routeIs('profiles.show'))
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
