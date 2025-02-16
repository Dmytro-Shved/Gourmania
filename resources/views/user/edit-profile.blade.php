<x-layout>

    @if(session()->has('profile_updated'))
        <!-- User Profile Updated -->
        <div x-data="{ show : true }" class="absolute self-end end-1 z-30">
            <div x-show="show" x-transition
                 class="bg-green-500 border text-white px-4 py-3 rounded relative font-inclusive w-[250px]" role="alert">
                <p>Updated!</p>
                <span class="block sm:inline">{{ session('profile_updated') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg  @click="show = false" class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        </div>
    @endif

    <div class="bg-gray-100 font-inclusive">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-1 px-2">
                {{-- Profile info section --}}
                <div class="col-span-1 sm:col-span-5">
                    <!-- Profile card -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <form action="{{ route('profiles.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Users info -->
                            <div class="flex flex-col items-center relative">
                                <div class="text-center">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Current photo:</label>
                                    <!-- Current Photo -->
                                    <img src="{{ asset('./storage/'. $user->photo) }}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0" alt="User photo">
                                </div>

                                <!-- Choose new photo -->
                                <div class="mt-1 mb-4 max-w-[201px]" x-data="{ files: null }">
                                    <label for="photo" class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">
                                        <input name="photo" type="file" class="sr-only" id="photo" x-on:change="files = Object.values($event.target.files)">
                                        <span x-text="files ? files.map(file => file.name).join(', ') : 'New photo...'"></span>
                                    </label>
                                    <button type="reset" @click="files = null" class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg">Reset</button>

                                    @error('photo')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- under name text -->
                                <div class="w-full overflow-x-auto flex items-center gap-1 justify-center">
                                    <!-- Current Name -->
                                    <div class="p-1">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Current name:</label>
                                        <input
                                            name="name"
                                            type="text"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                                            placeholder="Gordon"
                                            value="{{ $user->name }}"
                                        />

                                        @error('name')
                                        <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Current Email -->
                                <div class="p-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Current email:</label>
                                    <input
                                        name="email"
                                        type="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                                        placeholder="your@email.com"
                                        value="{{ $user->email }}"
                                    />

                                    @error('email')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
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
                                    <!-- Gender Select -->
                                    <li class="mb-2">Gender:
                                        <div class="relative flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                                            <select id="gender" name="gender" class="w-full appearance-none rounded-radius border border-gray-300 bg-surface-alt px-4 py-2 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 rounded-lg">
                                                <option value="{{ null }}">Please Select</option>
                                                <option value="male" {{ old('gender', $user->profile->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender', $user->profile->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </li>
                                    <!-- Date Picker -->
                                    <li class="mb-2">Birth:
                                        <div class="relative max-w-sm">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input datepicker value="{{ $user->profile->birth_date }}" name="birth_date" id="default-datepicker" datepicker-format="yyyy-mm-dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg gourmania-focus block w-full ps-10 p-2.5 font-inclusive" placeholder="Select date">

                                            @error('birth_date')
                                            <p class="text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Description -->
                            <div class="w-full">
                                <div class="mb-2 text-center flex items-center">
                                    <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                    <span class="text-black text-lg font-bold mx-2">Bio</span>
                                    <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                </div>
                                <p class="text-gray-700 text-sm">
                                    <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                                        <textarea id="textArea" name="description" class="w-full rounded-radius font-inclusive border border-gray-300 bg-surface-alt px-2.5 py-2 text-sm ocus:outline-none focus:ring-none focus:border-transparent focus:ring-2 focus:ring-[#AE763E] rounded-lg disabled:cursor-not-allowed disabled:opacity-75" rows="3" placeholder="Say something about yourself">{{ $user->profile->description }}</textarea>

                                        @error('description')
                                        <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </p>
                            </div>
                            <button type="submit" class="bg-gourmania hover:gourmania-hover transition-colors duration-200 rounded-lg text-white font-inclusive w-full  mt-5 p-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
