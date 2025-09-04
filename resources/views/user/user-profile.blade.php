@section('title', 'Profile')
<x-layout>
    {{-- Session messages --}}
    @if(session()->has('recipe_destroyed'))
        <div x-data="{ show : true }" class="absolute text-white self-end end-1 z-30">
            <div x-show="show" x-transition
                 class="bg-red-500 border text-white px-4 py-3 rounded relative font-inclusive w-[250px]" role="alert">
                <p>Deleted</p>
                <span class="block sm:inline">{{ session('recipe_destroyed') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg  @click="show = false" class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
    @endif

    <div class="bg-gray-100 font-inclusive">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 px-2">
                {{-- Profile info section --}}
                <div class="col-span-1 sm:col-span-5">
                    <!-- Profile card -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <!-- Users info -->
                        <div class="flex flex-col items-center relative">
                            <!-- Edit profile button -->
                            @can('edit', $user->profile)
                                <a href="{{ route('profiles.edit', $user) }}" class="absolute end-0">
                                    <button class="rounded-lg p-1 bg-gourmania hover:gourmania-hover transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="white" class="size-5">
                                            <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </a>
                            @endif

                            <div>
                                <!-- image -->
                                <img src="{{ asset('./storage/' . $user->photo) }}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0" alt="User photo">
                            </div>
                            <!-- name -->
                            <div class="w-full overflow-x-auto flex items-center gap-1 justify-center">
                                <h1 class="text-xl font-bold overflow-x-auto">{{ $user->name }}</h1>
                            </div>
                            <!-- under name text -->
                            <div class="w-full overflow-x-auto flex items-center gap-1 justify-center">
                                <p class="text-gray-700 text-center">{{ $user->email }}</p>
                            </div>
                        </div>
                        <!-- line -->
                        <hr class="my-6 border-t border-gray-300">
                        <!-- Info -->
                        <div class="flex flex-col">
                            <div class="mb-2 text-center flex items-center w-full">
                                <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                <span class="text-black text-lg font-bold mx-2">Info</span>
                                <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                            </div>
                            <ul class="list-disc pl-5 marker:text-[#AE763E]">
                                <li class="mb-2" title="{{ date_format($user->created_at, 'Y M d') }}">Joined: {{ date_format($user->created_at, 'Y M') }}</li>
                                <li class="mb-2">Gender: {{ $user->profile->gender ?? '-' }}</li>
                                <li class="mb-2">Birth: {{ $user->profile->birth_date ?? '-'}}</li>
                            </ul>
                        </div>
                        <!-- Bio -->
                        <div class="w-full">
                            <div class="mb-2 text-center flex items-center">
                                <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                <span class="text-black text-lg font-bold mx-2">Bio</span>
                                <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                            </div>
                            <p class="text-gray-700 text-sm">
                                {{ $user->profile->description ?? 'No bio yet...' }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Recipes --}}
                <div class="col-span-1 sm:col-span-7 flex flex-col sm:items-start w-full">
                    <div class="mb-2 text-center flex items-center w-full">
                        <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                        {{-- If the user is not the owner of the profile, he will see a heading with the owner's name and his recipes --}}
                        @if(auth()->check() && auth()->user()->id != $user->id)
                            <span class="text-black text-lg font-bold mx-2 capitalize">{{ $user->name }}'s Recipes</span>
                        @else
                            <span class="text-black text-lg font-bold mx-2">Your recipes</span>
                        @endif
                        <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                    </div>
                    <div class="flex flex-wrap gap-3  w-full lg:flex justify-center">
                        @forelse($userRecipes as $recipe)
                            <x-recipes.recipe-card :recipe="$recipe"/>
                        @empty
                            <div class="pt-3 sm:pt-10  text-lg flex flex-col items-center justify-center text-center">
                                <p class="w-72 break-words">
                                    Haven't added your recipe yet?
                                    <br>
                                    <span class="block">Now's the time!</span>
                                </p>
                                <a href="{{ route('recipes.create') }}" class="mt-5 tracking-wider text-white transition-colors duration-300 transform p-1.5 focus:outline-none bg-gourmania rounded-lg hover:gourmania-hover">Add Recipe</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
