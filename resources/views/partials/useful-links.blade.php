{{-- Useful links title --}}
<div class="title-container text-center">
    <small class="font-inknut text-xl md:text-xl lg:text-2xl xl:text-3xl text-black px-4">
        USEFUL LINKS
    </small>
</div>

{{-- Useful links section --}}
<div class="w-[320px] sm:w-[400px] md:w-[500px] lg:md:w-[550px] xl:md:w-[600px] mx-auto px-5">
    <div class="flex flex-row">
        {{-- TOOLS --}}
        <div>
            <button class="relative block overflow-hidden group w-full">
                <a href="{{ route('tools') }}" class="block">
                    <img
                        class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105"
                        src="{{ asset('storage/basics/useful-link-tools.webp') }}"
                        alt="Basics"
                    >
                </a>
            </button>
            <span class="flex justify-center pt-1 font-inclusive text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]">TOOLS</span>
        </div>
        {{-- TECHNIQUES --}}
        <div>
            <button class="relative block overflow-hidden group w-full">
                <a href="{{ route('techniques') }}" class="block">
                    <img
                        class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105"
                        src="{{ asset('storage/basics/useful-link-techniques.webp') }}"
                        alt="Techniques"
                    >
                </a>
            </button>
            <span class="flex justify-center pt-1 font-inclusive text-[14px] sm:text-[16px] md:text-[18px] lg:text-[20px]">TECHNIQUES</span>
        </div>
    </div>
</div>
