@section('title', 'Profile settings')
<x-layout>

    {{-- Profile settings --}}
    <div class="title-container text-center uppercase">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            PROFILE SETTINGS
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{-- Session message --}}
    @if(session()->has('profile_updated'))
        <x-session.message :message="session('profile_updated')" type="info" />
    @endif

    <div class="bg-gray-100 font-inclusive">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-1 px-2">
                {{-- Profile info section --}}
                <div class="col-span-1 sm:col-span-5">
                    {{-- Profile card --}}
                    <div class="bg-white shadow rounded-lg p-6">
                        <form action="{{ route('profiles.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- Users info --}}
                            <div class="flex flex-col items-center relative">
                                <div class="text-center">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Current photo:</label>
                                    {{-- Current Photo --}}
                                    <img src="{{ asset('./storage/'. $user->photo) }}" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0" alt="User photo">
                                </div>

                                {{-- Choose new photo --}}
                                <div class="mt-1 mb-4 max-w-[201px]" x-data="{ files: null }">
                                    <label for="photo" class="border border-gray-300 p-3 w-full block rounded-lg cursor-pointer my-2 overflow-x-auto whitespace-nowrap">
                                        <input name="photo" type="file" class="sr-only" id="photo" x-on:change="files = Object.values($event.target.files)">
                                        <span x-text="files ? files.map(file => file.name).join(', ') : 'New photo...'"></span>
                                    </label>

                                    {{-- Mini photo --}}
                                    <template x-if="files && files.length > 0">
                                        <div class="mt-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">New photo:</label>
                                            <img :src="URL.createObjectURL(files[0])" alt="Thumbnail" class="w-32 h-32 object-cover rounded-md" />
                                        </div>
                                    </template>

                                    {{-- Reset button --}}
                                    <button type="reset" @click="files = null" class="bg-gourmania text-white text-sm px-3 py-1 rounded-lg mt-2">Reset</button>
                                </div>
                            </div>
                            <hr class="my-6 border-t border-gray-300">
                            {{-- Info --}}
                            <div class="flex flex-col">
                                <div class="mb-2 text-center flex items-center w-full">
                                    <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                    <span class="text-black text-lg font-bold mx-2">Info</span>
                                    <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                </div>
                                <ul class="list-disc pl-5 marker:text-[#AE763E]">
                                    {{-- Gender Select --}}
                                    <li class="mb-2">Gender:
                                        <div class="relative flex w-full max-w-xs flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                                            <select id="gender" name="gender" class="w-full appearance-none rounded-radius border border-gray-300 bg-surface-alt px-4 py-2 text-sm gourmania-focus disabled:cursor-not-allowed disabled:opacity-75 rounded-lg">
                                                <option value="{{ null }}">Please Select</option>
                                                <option value="male" {{ old('gender', $user->profile->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender', $user->profile->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                    </li>
                                    {{-- Date Picker --}}
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
                            {{-- Bio --}}
                            <div class="w-full my-5">
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

                            {{-- Credentials --}}
                            <div class="w-full my-5">
                                <div class="mb-2 text-center flex items-center">
                                    <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                    <span class="text-black text-lg font-bold mx-2">Credentials</span>
                                    <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                </div>

                                {{-- Name --}}
                                <div class="p-1 mb-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Current name:</label>
                                    <input
                                        name="name"
                                        type="text"
                                        class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                                        placeholder="Gordon"
                                        value="{{ $user->name }}"
                                    />

                                    @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="p-1 mb-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Current email:</label>
                                    <input
                                        name="email"
                                        type="email"
                                        class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                                        placeholder="your@email.com"
                                        value="{{ $user->email }}"
                                    />

                                    @error('email')
                                    <p class="text-red-500 w-48 break-words">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div x-data="{ showPassword: false, showConfirmPassword: false }">
                                    {{-- Password --}}
                                    <div class="mt-1 p-1 mb-1">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                        <div class="relative w-full md:w-1/2">
                                            <input
                                                name="password"
                                                :type="showPassword ? 'text' : 'password'"
                                                class="@error('password') border-red-500 @enderror w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus pr-10"
                                                placeholder="••••••••"
                                            />
                                            <button
                                                type="button"
                                                @click="showPassword = !showPassword"
                                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700"
                                                title="Toggle visibility"
                                            >
                                                <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                </svg>
                                                <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                        @error('password')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Password Confirmation --}}
                                    <div class="mt-1 p-1 mb-1">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                                        <div class="relative w-full md:w-1/2">
                                            <input
                                                name="password_confirmation"
                                                :type="showConfirmPassword ? 'text' : 'password'"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus pr-10"
                                                placeholder="••••••••"
                                            />
                                            <button
                                                type="button"
                                                @click="showConfirmPassword = !showConfirmPassword"
                                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700"
                                                title="Toggle visibility"
                                            >
                                                <svg x-show="!showConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                </svg>
                                                <svg x-show="showConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M极.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 极 3 3 0 016 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Update button --}}
                            <button type="submit" class="bg-gourmania hover:gourmania-hover transition-colors duration-200 rounded-lg text-white font-inclusive w-32 mt-5 p-2">
                                Update
                            </button>
                        </form>
                        {{-- Delete My Account --}}
                        <div class="w-full mb-5 mt-10">
                            <div class="mb-2 text-center flex items-center">
                                <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                                <span class="text-black text-lg font-bold mx-2">Delete My Account</span>
                                <span class="flex-1 border-s border-4 border-[#AE763E]"></span>
                            </div>

                            <div class="w-full md:w-1/2 bg-[#C58F5C] bg-opacity-85 p-4 rounded-lg">
                                <div class="mb-6">
                                    {{-- Important note --}}
                                    <p class="text-white text-[15px] mb-4 text-start">
                                        If you wish to erase your entire Gourmania presence, click the button below.
                                        Please note that this is a destructive action that will delete your Gourmania account
                                        and all activity associated with it.
                                    </p>
                                </div>

                                {{-- Delete My Account button --}}
                                <button id="deleteButton"
                                        data-modal-target="confirmationModal-{{'delete-profile'}}"
                                        data-modal-toggle="confirmationModal-{{'delete-profile'}}"
                                        class="bg-[#592D00] rounded-lg hover:bg-red-700 transition-colors duration-300 text-white font-bold w-50 py-2 px-4"
                                >
                                    Delete My Account
                                </button>



                                {{-- Delete My Account modal --}}
                                @can('delete', $user->profile)
                                    <x-modals.confirmation
                                        title="Are You Sure?"
                                        description="This is a destructive action. You can't undo this account deletion."
                                        :route="route('profiles.destroy', $user)"
                                        :modal-id="'delete-profile'"
                                        form-method="POST"
                                        http-method="DELETE"
                                    />
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
