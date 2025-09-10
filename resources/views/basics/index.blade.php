<x-layout>
    @section('title',  'Basics')

    <livewire:filter/>

    {{-- Basics --}}
    <div class="title-container">
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
        <small class="font-inknut text-lg md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
            BASICS
        </small>
        <span class="flex-grow border-s border-8 border-[#AE763E] md:border-[10px] lg:border-[12px]"></span>
    </div>

    {{-- Basics Card --}}
    <div class="relative w-full bg-white px-6 pt-1 pb-1 mt-1 mb-16 shadow-lg ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10 font-inclusive text-lg">
        <div class="mx-auto px-0">
            {{-- Tools --}}
            <a href="{{ route('tools') }}">
                <div class="my-6 overflow-hidden rounded-md relative">
                    <img
                        src="{{ asset('storage/basics/main-tools.webp') }}"
                        alt="Best kitchen tools"
                        class="w-full h-auto object-cover rounded-md"
                    />

                    <div class="absolute inset-0 bg-black/30 rounded-md"></div>

                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div
                            class="pointer-events-auto text-center text-white absolute left-1/2 top-[78%] sm:top-[70%] transform -translate-x-1/2 -translate-y-1/2"
                        >
                            <p class="text-sm xs:text-lg sm:text-xl md:text-2xl font-semibold">Best Kitchen Tools</p>
                            <a
                                href="{{ route('tools') }}"
                                class="mt-3 inline-block text-white text-xs sm:text-sm md:text-lg border border-white py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300"
                            >
                                Go to page
                            </a>
                        </div>
                    </div>
                </div>
            </a>

            {{-- Techniques --}}
            <a href="{{ route('techniques') }}">
                <div class="my-6 overflow-hidden rounded-md relative">
                    <img
                        src="{{ asset('storage/basics/main-techniques.webp') }}"
                        alt="Best kitchen tools"
                        class="w-full h-auto object-cover rounded-md"
                    />

                    <div class="absolute inset-0 bg-black/35 rounded-md"></div>

                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div
                            class="pointer-events-auto text-center text-white absolute left-1/2 top-[78%] sm:top-[70%] transform -translate-x-1/2 -translate-y-1/2"
                        >
                            <p class="text-sm xs:text-lg sm:text-xl md:text-2xl font-semibold">Core Techniques</p>
                            <a
                                href="{{ route('techniques') }}"
                                class="mt-3 inline-block text-white text-xs sm:text-sm md:text-lg border border-white py-2 px-4 rounded-lg hover:bg-gourmania hover:text-neutral-200 transition-colors duration-300"
                            >
                                Go to page
                            </a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</x-layout>
