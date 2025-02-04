<x-layout>
    <div class="bg-gray-100 font-inclusive">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 px-2">
                {{-- Profile info section --}}
                <div class="col-span-1 sm:col-span-5">
                    <!-- Profile card -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <!-- Users info -->
                        <div class="flex flex-col items-center">
                            <div class="relative">
                                <!-- change image -->
                                <form action="{{ route('edit-profile') }}" class="absolute end-1">
                                    @csrf
                                    <button class="bg-white rounded-full p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                                        </svg>
                                    </button>
                                </form>
                                <!-- image -->
                                <img src="{{ asset($user->photo) }}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0" alt="User photo">
                            </div>
                            <!-- name -->
                            <h1 class="text-xl font-bold">{{ $user->name }}</h1>
                            <!-- under name text -->
                            <p class="text-gray-700">Role: {{ $user->role_id }}</p>
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

                                @if($user->email_verified_at)
                                    <!-- Verified Email -->
                                    <li class="mb-2">
                                        <div class="flex items-center gap-1">
                                            <p>Email Verified:</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="green" class="size-4">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm3.844-8.791a.75.75 0 0 0-1.188-.918l-3.7 4.79-1.649-1.833a.75.75 0 1 0-1.114 1.004l2.25 2.5a.75.75 0 0 0 1.15-.043l4.25-5.5Z" clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-gray-700 px-1 py-0.5 bg-gray-300 rounded-lg">{{ date_format($user->email_verified_at, 'Y M D') }}</p>
                                        </div>
                                    </li>
                                @else
                                    <!-- Not Verified Email -->
                                    <li class="mb-2">
                                        <div class="flex items-center gap-1">
                                            <p>Email Verified:</p>
                                            <!-- Verify Email -->
                                            <button class="text-white px-1 py-0.5 text-sm transition-colors duration-300 focus:outline-none bg-[#592D00] rounded-lg hover:bg-[#C58F5C]">Verify Email</button>
                                        </div>
                                    </li>
                                @endif
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
                        <x-recipe-card/>
                        <x-recipe-card/>
                        <x-recipe-card/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
