{{-- Tools title --}}
<div class="title-container">
    <span class="border-line"></span>
    <small class="section-title">
        TOOLS
    </small>
    <span class="border-line"></span>
</div>

{{-- Tools section --}}
<div class="w-full max-w-[1280px] mx-auto px-3">
    <div class="relative block overflow-hidden group rounded-lg mx-auto max-w-4xl">
        <a href="{{ route('tools') }}" class="block">
            <div class="aspect-[16/9] w-full overflow-hidden rounded-lg">
                <img
                    class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105"
                    src="{{ asset('storage/basics/main-tools.webp') }}"
                    alt="Cooking tools"
                >
            </div>

            <div class="absolute inset-0 flex items-end justify-center pb-4 sm:pb-8 transition-all duration-300">
                {{-- Shadow --}}
                <div class="absolute bottom-0 w-full h-[45%] sm:h-1/3 bg-gradient-to-t from-black/90 via-black/60 to-transparent"></div>

                {{-- Text --}}
                <span class="relative text-white font-bold px-4 text-base sm:text-lg text-center group-hover:text-amber-400 transition-colors duration-300 leading-tight sm:leading-normal drop-shadow-lg">
                    Having the right tools can make cooking and food preparation much more enjoyable
                </span>
            </div>
        </a>
    </div>
</div>

<div class="see-more-container text-center mt-4">
    <a href="{{ route('tools') }}" class="see-more-btn cursor-pointer inline-block px-6 py-2 border border-black rounded-md hover:bg-black hover:text-white transition">
        See more
    </a>
</div>
