@section('title', 'Profile')
<x-layout>
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
                            @auth
                                @if(auth()->user()->id == $user->id )
                                    <a href="{{ route('profiles.edit', $user) }}" class="absolute end-0">
                                        <button class="rounded-lg p-1 bg-gourmania hover:gourmania-hover transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" class="size-5">
                                                <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                                <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                            </svg>
                                        </button>
                                    </a>
                                @endif
                            @endauth

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
                                <li class="mb-2">Joined: {{ date_format($user->created_at, 'Y M') }}</li>
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
                        <span class="text-black text-lg font-bold mx-2">Recipes</span>
                        <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                    </div>
                    <div class="flex flex-wrap gap-3  w-full lg:flex justify-center">
                        @forelse($userRecipes as $recipe)
                            <x-recipe-card :recipe="$recipe"/>
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
