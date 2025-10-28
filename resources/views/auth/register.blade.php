@section('title',  'Register')

<x-guest-layout :with-recaptcha="true">
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4 font-inclusive">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-10 text-center">Sign Up</h2>
            {{-- Register Form --}}
            <form action="{{ route('register') }}" id="registerForm" method="POST" class="space-y-4">
                @csrf

                <x-honeypot />

                <input type="hidden" class="g-recaptcha" name="recaptcha_token" id="recaptcha_token">

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input
                        name="name"
                        type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                        placeholder="Gordon"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input
                        name="email"
                        type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg gourmania-focus"
                        placeholder="your@email.com"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div x-data="{ showPassword: false, showConfirmPassword: false }">
                    {{-- Password --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
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
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <div class="relative">
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
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Legal --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-start">
                        <span class="ml-2 text-[13px] md:text-[14px] text-gray-600">Registration signifies that you have read and agree to the <a href="{{ route('privacy') }}" class="text-[#AE763E] underline">Privacy Policy</a> and <a href="{{ route('terms') }}" class="text-[#AE763E] underline">Terms of Use</a>.</span>
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full bg-gourmania hover:gourmania-hover text-white font-medium py-2.5 rounded-lg transition-colors">
                    Continue
                </button>
            </form>

            {{-- Already have an account? --}}
            <div class="mt-6 text-center text-sm text-gray-600 sm:flex sm:justify-center sm:gap-2">
                <p>Already have an account?</p>
                <a href="{{ route('login-page') }}" class="text-[#AE763E] hover:underline">Log In here</a>
            </div>

            <div class="flex justify-center mt-5">
                <img class="size-14" src="{{ asset('storage/objects/unopened-dish.svg') }}" alt="Unopened Dish">
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            grecaptcha.ready(function () {
                document.getElementById('registerForm').addEventListener("submit", function (event) {
                    event.preventDefault();
                    grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'register' })
                        .then(function (token) {
                            document.getElementById("recaptcha_token").value = token;
                            document.getElementById('registerForm').submit();
                        });
                });
            });
        </script>
    @endpush
</x-guest-layout>
